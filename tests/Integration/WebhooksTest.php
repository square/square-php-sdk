<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Square\Utils\WebhooksHelper;
use Exception;

class WebhooksTest extends TestCase
{
    private string $requestBody = '{"merchant_id":"MLEFBHHSJGVHD","type":"webhooks.test_notification","event_id":"ac3ac95b-f97d-458c-a6e6-18981597e05f","created_at":"2022-07-13T20:30:59.037339943Z","data":{"type":"webhooks","id":"bc368e64-01aa-407e-b46e-3231809b1129"}}';
    private string $signatureHeader = 'GF4YkrJgGBDZ9NIYbNXBnMzqb2HoL4RW/S6vkZ9/2N4=';
    private string $signatureKey = 'Ibxx_5AKakO-3qeNVR61Dw';
    private string $notificationUrl = 'https://webhook.site/679a4f3a-dcfa-49ee-bac5-9d0edad886b9';

    /**
     * @throws Exception
     */
    public function testSignatureValidationPass(): void
    {
        $isValid = WebhooksHelper::verifySignature(
            $this->requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            $this->notificationUrl
        );
        $this->assertTrue($isValid);
    }

    /**
     * @throws Exception
     */
    public function testSignatureUnescapedCharsValidationPass(): void
    {
        $url = 'https://webhook.site/webhooks';
        $sigKey = 'signature-key';
        $specialCharacterBody = '{"data":{"type":"webhooks","id":"fake_id"}}';
        $expectedSignatureHeader = 'W3FlCNk5IA3ZQ2LHTWoajvzfaDu/OwY2tNHIHC3IUOA=';

        $isValid = WebhooksHelper::verifySignature(
            $specialCharacterBody,
            $expectedSignatureHeader,
            $sigKey,
            $url
        );
        $this->assertTrue($isValid);
    }

    /**
     * @throws Exception
     */
    public function testSignatureWithEscapedCharacters(): void
    {
        $url = 'https://webhook.site/webhooks';
        $sigKey = 'signature-key';
        $specialCharacterBody = '{"data":{"type":"webhooks","id":">id<"}}';
        $expectedSignatureHeader = 'Cxt7+aTi4rKgcA0bC4g9EHdVtLSDWdqccmL5MvihU4U=';

        $isValid = WebhooksHelper::verifySignature(
            $specialCharacterBody,
            $expectedSignatureHeader,
            $sigKey,
            $url
        );
        $this->assertTrue($isValid);
    }

    /**
     * @throws Exception
     */
    public function testSignatureValidationFailsOnNotificationUrlMismatch(): void
    {
        $isValid = WebhooksHelper::verifySignature(
            $this->requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            'https://webhook.site/79a4f3a-dcfa-49ee-bac5-9d0edad886b9'
        );
        $this->assertFalse($isValid);
    }

    /**
     * @throws Exception
     */
    public function testSignatureValidationFailsOnInvalidSignatureKey(): void
    {
        $isValid = WebhooksHelper::verifySignature(
            $this->requestBody,
            $this->signatureHeader,
            'MCmhFRxGX82xMwg5FsaoQA',
            $this->notificationUrl
        );
        $this->assertFalse($isValid);
    }

    /**
     * @throws Exception
     */
    public function testSignatureValidationFailsOnInvalidSignatureHeader(): void
    {
        $isValid = WebhooksHelper::verifySignature(
            $this->requestBody,
            '1z2n3DEJJiUPKcPzQo1ftvbxGdw=',
            $this->signatureKey,
            $this->notificationUrl
        );
        $this->assertFalse($isValid);
    }

    /**
     * @throws Exception
     */
    public function testSignatureValidationFailsOnRequestBodyMismatch(): void
    {
        $isValid = WebhooksHelper::verifySignature(
            '{"merchant_id":"MLEFBHHSJGVHD","type":"webhooks.test_notification","event_id":"ac3ac95b-f97d-458c-a6e6-18981597e05f","created_at":"2022-06-13T20:30:59.037339943Z","data":{"type":"webhooks","id":"bc368e64-01aa-407e-b46e-3231809b1129"}}',
            $this->signatureHeader,
            $this->signatureKey,
            $this->notificationUrl
        );
        $this->assertFalse($isValid);
    }

    /**
     * @throws Exception
     */
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
        $isValid = WebhooksHelper::verifySignature(
            $requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            $this->notificationUrl
        );
        $this->assertFalse($isValid);
    }

    public function testThrowsErrorOnEmptySignatureKey(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('signatureKey is null or empty');

        WebhooksHelper::verifySignature(
            $this->requestBody,
            $this->signatureHeader,
            '',
            $this->notificationUrl
        );
    }

    public function testThrowsErrorOnEmptyNotificationUrl(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('notificationUrl is null or empty');

        WebhooksHelper::verifySignature(
            $this->requestBody,
            $this->signatureHeader,
            $this->signatureKey,
            ''
        );
    }
}
