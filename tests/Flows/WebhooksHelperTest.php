<?php
namespace Square\Tests;

use Square\Utils\WebhooksHelper;
use PHPUnit\Framework\TestCase;

class WebhooksHelperTest extends TestCase
{
    private $requestBody = '{"merchant_id":"MLEFBHHSJGVHD","type":"webhooks.test_notification","event_id":"ac3ac95b-f97d-458c-a6e6-18981597e05f","created_at":"2022-07-13T20:30:59.037339943Z","data":{"type":"webhooks","id":"bc368e64-01aa-407e-b46e-3231809b1129"}}';
    private $signatureHeader = 'GF4YkrJgGBDZ9NIYbNXBnMzqb2HoL4RW/S6vkZ9/2N4=';
    private $signatureKey = 'Ibxx_5AKakO-3qeNVR61Dw';
    private $notificationUrl = 'https://webhook.site/679a4f3a-dcfa-49ee-bac5-9d0edad886b9';

    public function testSignatureValidationPass(): void
    {
        $isValid = WebhooksHelper::isValidWebhookEventSignature(
            $this->requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            $this->notificationUrl
        );
        $this->assertTrue($isValid);
    }

    public function testEscapedCharactersPass(): void 
    {
        $specialRequestBody = '{"data":{"type":"webhooks","id":">id<"}}';
        $escapedSignatureHeader = 'Cxt7+aTi4rKgcA0bC4g9EHdVtLSDWdqccmL5MvihU4U=';
        $defaultSignatureKey = 'signature-key';
        $defaultNotificationUrl = 'https://webhook.site/webhooks';

        $isValid = WebhooksHelper::isValidWebhookEventSignature(
            $specialRequestBody,
            $escapedSignatureHeader,
            $defaultSignatureKey,
            $defaultNotificationUrl
        );
        $this->assertTrue($isValid);
    }

    public function testSignatureValidationFailsOnNotificationUrlMismatch(): void
    {
        $isValid = WebhooksHelper::isValidWebhookEventSignature(
            $this->requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            'https://webhook.site/79a4f3a-dcfa-49ee-bac5-9d0edad886b9'
        );
        $this->assertFalse($isValid);
    }

    public function testSignatureValidationFailsOnInvalidSignatureKey(): void
    {
        $isValid = WebhooksHelper::isValidWebhookEventSignature(
            $this->requestBody,
            $this->signatureHeader,
            'MCmhFRxGX82xMwg5FsaoQA',
            $this->notificationUrl
        );
        $this->assertFalse($isValid);
    }

    public function testSignatureValidationFailsOnInvalidSignatureHeader(): void
    {
        $isValid = WebhooksHelper::isValidWebhookEventSignature(
            $this->requestBody,
            '1z2n3DEJJiUPKcPzQo1ftvbxGdw=',
            $this->signatureKey,
            $this->notificationUrl
        );
        $this->assertFalse($isValid);
    }

    public function testSignatureValidationFailsOnRequestBodyMismatch(): void
    {
        $requestBody = '{"merchant_id":"MLEFBHHSJGVHD","type":"webhooks.test_notification","event_id":"ac3ac95b-f97d-458c-a6e6-18981597e05f","created_at":"2022-06-13T20:30:59.037339943Z","data":{"type":"webhooks","id":"bc368e64-01aa-407e-b46e-3231809b1129"}}';
        $isValid = WebhooksHelper::isValidWebhookEventSignature(
            $requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            $this->notificationUrl
        );
        $this->assertFalse($isValid);
    }

    public function testSignatureValidationFailsOnRequestBodyFormatted(): void
    {
        $requestBody = '{
            "merchant_id": "MLEFBHHSJGVHD",
            "type": "webhooks.test_notification",
            "event_id": "ac3ac95b-f97d-458c-a6e6-18981597e05f",
            "created_at": "2022-07-13T20:30:59.037339943Z",
            "data": {
                "type": "webhooks",
                "id": "bc368e64-01aa-407e-b46e-3231809b1129"
            }
        }';
        $isValid = WebhooksHelper::isValidWebhookEventSignature(
            $requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            $this->notificationUrl
        );
        $this->assertFalse($isValid);
    }

    public function testThrowsErrorOnEmptySignatureKey(): void
    {
        $this->expectExceptionMessage('signatureKey is null or empty');
        WebhooksHelper::isValidWebhookEventSignature(
            $this->requestBody,
            $this->signatureHeader,
            '',
            $this->notificationUrl
        );
    }

    public function testThrowsErrorOnSignatureKeyNotConfigured(): void
    {
        $this->expectException(\TypeError::class);

        WebhooksHelper::isValidWebhookEventSignature(
            $this->requestBody,
            $this->signatureHeader,
            null,
            $this->notificationUrl
        );
    }

    public function testThrowsErrorOnEmptyNotificationUrl(): void
    {
        $this->expectExceptionMessage('notificationUrl is null or empty');
        WebhooksHelper::isValidWebhookEventSignature(
            $this->requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            ''
        );
    }

    public function testThrowsErrorOnNotificationUrlNotConfigured(): void
    {
        $this->expectException(\TypeError::class);

        WebhooksHelper::isValidWebhookEventSignature(
            $this->requestBody, 
            $this->signatureHeader, 
            $this->signatureKey, 
            null
        );
    }
}
