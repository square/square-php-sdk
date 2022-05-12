<?php

declare(strict_types=1);

namespace Square\Apis;

use Square\Exceptions\ApiException;
use Square\ConfigurationInterface;
use Square\ApiHelper;
use Square\Models;
use Square\Http\ApiResponse;
use Square\Http\HttpRequest;
use Square\Http\HttpResponse;
use Square\Http\HttpMethod;
use Square\Http\HttpContext;
use Square\Http\HttpCallBack;
use Unirest\Request;

class GiftCardActivitiesApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * Lists gift card activities. By default, you get gift card activities for all
     * gift cards in the seller's account. You can optionally specify query parameters to
     * filter the list. For example, you can get a list of gift card activities for a gift card,
     * for all gift cards in a specific region, or for activities within a time window.
     *
     * @param string|null $giftCardId If a gift card ID is provided, the endpoint returns activities
     *        related
     *        to the specified gift card. Otherwise, the endpoint returns all gift card activities
     *        for
     *        the seller.
     * @param string|null $type If a [type]($m/GiftCardActivityType) is provided, the endpoint
     *        returns gift card activities of the specified type.
     *        Otherwise, the endpoint returns all types of gift card activities.
     * @param string|null $locationId If a location ID is provided, the endpoint returns gift card
     *        activities for the specified location.
     *        Otherwise, the endpoint returns gift card activities for all locations.
     * @param string|null $beginTime The timestamp for the beginning of the reporting period, in RFC
     *        3339 format.
     *        This start time is inclusive. The default value is the current time minus one year.
     * @param string|null $endTime The timestamp for the end of the reporting period, in RFC 3339
     *        format.
     *        This end time is inclusive. The default value is the current time.
     * @param int|null $limit If a limit is provided, the endpoint returns the specified number of
     *        results (or fewer) per page. The maximum value is 100. The default value is 50.
     *        For more information, see [Pagination](https://developer.squareup.com/docs/working-
     *        with-apis/pagination).
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *        Provide this cursor to retrieve the next set of results for the original query.
     *        If a cursor is not provided, the endpoint returns the first page of the results.
     *        For more information, see [Pagination](https://developer.squareup.com/docs/working-
     *        with-apis/pagination).
     * @param string|null $sortOrder The order in which the endpoint returns the activities, based
     *        on `created_at`.
     *        - `ASC` - Oldest to newest.
     *        - `DESC` - Newest to oldest (default).
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listGiftCardActivities(
        ?string $giftCardId = null,
        ?string $type = null,
        ?string $locationId = null,
        ?string $beginTime = null,
        ?string $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $sortOrder = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/gift-cards/activities';

        //process query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryUrl, [
            'gift_card_id' => $giftCardId,
            'type'         => $type,
            'location_id'  => $locationId,
            'begin_time'   => $beginTime,
            'end_time'     => $endTime,
            'limit'        => $limit,
            'cursor'       => $cursor,
            'sort_order'   => $sortOrder,
        ]);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $deserializedResponse = ApiHelper::mapClass(
            $_httpRequest,
            $_httpResponse,
            $response->body,
            'ListGiftCardActivitiesResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates a gift card activity to manage the balance or state of a [gift card]($m/GiftCard).
     * For example, you create an `ACTIVATE` activity to activate a gift card with an initial balance
     * before the gift card can be used.
     *
     * @param Models\CreateGiftCardActivityRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createGiftCardActivity(Models\CreateGiftCardActivityRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/gift-cards/activities';

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Content-Type'    => 'application/json'
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = ApiHelper::serialize($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders(), $_bodyJson);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $deserializedResponse = ApiHelper::mapClass(
            $_httpRequest,
            $_httpResponse,
            $response->body,
            'CreateGiftCardActivityResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
