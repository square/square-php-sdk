<?php

namespace Square\Tests\Integration;

use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Disputes\Requests\CreateDisputeEvidenceTextRequest;
use Square\Disputes\Requests\AcceptDisputesRequest;
use Square\Disputes\Requests\CreateEvidenceFileDisputesRequest;
use Square\Disputes\Requests\GetDisputesRequest;
use Square\Disputes\Requests\ListDisputesRequest;
use Square\Disputes\Requests\SubmitEvidenceDisputesRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Types\CreateDisputeEvidenceFileRequest;
use Square\Types\Money;
use Square\Payments\Requests\CreatePaymentRequest;
use Square\Disputes\Evidence\Requests\DeleteEvidenceRequest;
use Square\Disputes\Evidence\Requests\GetEvidenceRequest;
use Square\Disputes\Evidence\Requests\ListEvidenceRequest;

class DisputesTest extends TestCase
{
    private static SquareClient $client;
    private static string $disputeId;
    private static string $textEvidenceId;

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();

        // Create a payment that will generate a dispute
        self::$client->payments->create(new CreatePaymentRequest([
            'sourceId' => 'cnon:card-nonce-ok',
            'idempotencyKey' => uniqid(),
            'amountMoney' => new Money([
                'amount' => 8803,
                'currency' => 'USD',
            ])
        ]));

        // Poll for dispute to be created
        for ($i = 0; $i < 100; $i++) {
            $disputeResponse = self::$client->disputes->list(new ListDisputesRequest(['states' => 'EVIDENCE_REQUIRED']));
            $page = $disputeResponse->getPages()->current();
            $disputes = $page->getItems();
            if ($disputes !== null && count($disputes) > 0) {
                $disputeId = $disputes[0]->getId();
                if($disputeId === null) {
                    throw new RuntimeException('Dispute ID is null.');
                }
                self::$disputeId = $disputeId;
                break;
            }
            // Wait for 2 seconds before polling again
            sleep(2);
        }

        if (!self::$disputeId) {
            throw new RuntimeException("Dispute was not created within the expected time frame.");
        }

        // Create evidence text for testing
        $evidenceResponse = self::$client->disputes->createEvidenceText(new CreateDisputeEvidenceTextRequest([
            'disputeId' => self::$disputeId,
            'idempotencyKey' => uniqid(),
            'evidenceType' => 'GENERIC_EVIDENCE',
            'evidenceText' => 'This is not a duplicate'
        ]));
        $evidence = $evidenceResponse->getEvidence();
        if($evidence === null) {
            throw new RuntimeException("Evidence was not created within the expected time frame.");
        }
        $textEvidenceId = $evidence->getId();
        if($textEvidenceId === null) {
            throw new RuntimeException('Evidence ID is null.');
        }
        self::$textEvidenceId = $textEvidenceId;
    }

    public static function tearDownAfterClass(): void
    {
        // Clean up evidence if it exists
        try {
            self::$client->disputes->evidence->delete(new DeleteEvidenceRequest([
                'disputeId' => self::$disputeId,
                'evidenceId' => self::$textEvidenceId
            ]));
        } catch (Exception) {
            // Evidence might already be deleted by test
        }
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testListDisputes(): void
    {
        $response = self::$client->disputes->list(new ListDisputesRequest(['states' => 'EVIDENCE_REQUIRED']));
        $page = $response->getPages()->current();
        $disputes = $page->getItems();
        $this->assertNotNull($disputes);
        $this->assertGreaterThan(0, count($disputes));
        $this->assertEquals('DUPLICATE', $disputes[0]->getReason());
        $this->assertEquals('EVIDENCE_REQUIRED', $disputes[0]->getState());
        $this->assertEquals('VISA', $disputes[0]->getCardBrand());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testRetrieveDispute(): void
    {
        $response = self::$client->disputes->get(new GetDisputesRequest(['disputeId' => self::$disputeId]));
        $this->assertNotNull($response->getDispute());
        $this->assertEquals(self::$disputeId, $response->getDispute()->getId());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testCreateDisputeEvidenceText(): void
    {
        $response = self::$client->disputes->createEvidenceText(new CreateDisputeEvidenceTextRequest([
            'disputeId' => self::$disputeId,
            'idempotencyKey' => uniqid(),
            'evidenceType' => 'GENERIC_EVIDENCE',
            'evidenceText' => 'This is not a duplicate'
        ]));
        $this->assertNotNull($response->getEvidence());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testRetrieveDisputeEvidence(): void
    {
        $response = self::$client->disputes->evidence->get(new GetEvidenceRequest([
            'disputeId' => self::$disputeId,
            'evidenceId' => self::$textEvidenceId
        ]));
        $this->assertNotNull($response->getEvidence());
        $this->assertEquals(self::$textEvidenceId, $response->getEvidence()->getId());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testListDisputeEvidence(): void
    {
        $response = self::$client->disputes->evidence->list(new ListEvidenceRequest(['disputeId' => self::$disputeId]));
        $page = $response->getPages()->current();
        $evidence = $page->getItems();
        $this->assertNotNull($evidence);
        $this->assertGreaterThan(0, count($evidence));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testDeleteDisputeEvidence(): void
    {
        $response = self::$client->disputes->evidence->delete(new DeleteEvidenceRequest([
            'disputeId' => self::$disputeId,
            'evidenceId' => self::$textEvidenceId
        ]));
        $this->assertNotNull($response);
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     * @throws Exception
     */
    public function testCreateDisputeEvidenceFile(): void
    {
        $imageFile = Helpers::getTestFile();

        $response = self::$client->disputes->createEvidenceFile(new CreateEvidenceFileDisputesRequest([
            'disputeId' => self::$disputeId,
            'request' => new CreateDisputeEvidenceFileRequest([
                'idempotencyKey' => uniqid(),
                'contentType' => 'image/jpeg',
                'evidenceType' => 'GENERIC_EVIDENCE',
            ]),
            'imageFile' => $imageFile,
        ]));

        $this->assertNotNull($response->getEvidence());
        $this->assertEquals(self::$disputeId, $response->getEvidence()->getDisputeId());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testSubmitEvidence(): void
    {
        $response = self::$client->disputes->submitEvidence(new SubmitEvidenceDisputesRequest(['disputeId' => self::$disputeId]));
        $this->assertNotNull($response);
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testAcceptDispute(): void
    {
        $response = self::$client->disputes->accept(new AcceptDisputesRequest(['disputeId' => self::$disputeId]));
        $this->assertNotNull($response);
    }
}
