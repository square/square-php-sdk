<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Customers\Segments\Requests\ListSegmentsRequest;
use Square\Customers\Segments\Requests\GetSegmentsRequest;
use Square\Types\CustomerSegment;
use Square\Core\Pagination\Page;

class CustomerSegmentsTest extends TestCase
{
    private static SquareClient $client;

    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
    }

    public function testListCustomerSegments(): void
    {
        $request = new ListSegmentsRequest();
        $response = self::$client->customers->segments->list($request);
        $this->assertNotNull($response);
        /** @var Page<CustomerSegment> $page */
        $page = $response->getPages()->current();
        $segments = $page->getItems();
        $this->assertNotNull($segments);
        $this->assertGreaterThan(0, count($segments));
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testRetrieveCustomerSegment(): void
    {
        $listRequest = new ListSegmentsRequest();
        $listResponse = self::$client->customers->segments->list($listRequest);
        /** @var CustomerSegment $segment */
        $segment = $listResponse->getIterator()->current();
        $segmentId = $segment->getId();
        if ($segmentId === null) {
            throw new RuntimeException('Segment ID is null.');
        }

        $getRequest = new GetSegmentsRequest(['segmentId' => $segmentId]);
        $response = self::$client->customers->segments->get($getRequest);

        $this->assertNotNull($response->getSegment());
        $this->assertNotNull($response->getSegment()->getName());
    }
}
