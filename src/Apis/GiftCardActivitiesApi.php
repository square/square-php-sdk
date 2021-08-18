<?php

declare(strict_types=1);

namespace Square\Apis;

use Square\Exceptions\ApiException;
use Square\ApiHelper;
use Square\ConfigurationInterface;
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
     * @param string|null $giftCardId If you provide a gift card ID, the endpoint returns activities
     *        that belong
     *        to the specified gift card. Otherwise, the endpoint returns all gift card activities
     *        for
     *        the seller.
     * @param string|null $type If you provide a type, the endpoint returns gift card activities of
     *        this type.
     *        Otherwise, the endpoint returns all types of gift card activities.
     * @param string|null $locationId If you provide a location ID, the endpoint returns gift card
     *        activities for that location.
     *        Otherwise, the endpoint returns gift card activities for all locations.
     * @param string|null $beginTime The timestamp for the beginning of the reporting period, in RFC
     *        3339 format.
     *        Inclusive. Default: The current time minus one year.
     * @param string|null $endTime The timestamp for the end of the reporting period, in RFC 3339
     *        format.
     *        Inclusive. Default: The current time.
     * @param int|null $limit If you provide a limit value, the endpoint returns the specified
     *        number
     *        of results (or less) per page. A maximum value is 100. The default value is 50.
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *        Provide this cursor to retrieve the next set of results for the original query.
     *        If you do not provide the cursor, the call returns the first page of the results.
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
        $_queryBuilder = '/v2/gift-cards/activities';

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'gift_card_id' => $giftCardId,
            'type'         => $type,
            'location_id'  => $locationId,
            'begin_time'   => $beginTime,
            'end_time'     => $endTime,
            'limit'        => $limit,
            'cursor'       => $cursor,
            'sort_order'   => $sortOrder,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
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

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\ListGiftCardActivitiesResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates a gift card activity. For more information, see
     * [GiftCardActivity](https://developer.squareup.com/docs/gift-cards/using-gift-cards-
     * api#giftcardactivity) and
     * [Using activated gift cards](https://developer.squareup.com/docs/gift-cards/using-gift-cards-
     * api#using-activated-gift-cards).
     *
     * @param \Square\Models\CreateGiftCardActivityRequest $body An object containing the fields to
     *        POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createGiftCardActivity(\Square\Models\CreateGiftCardActivityRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/gift-cards/activities';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CreateGiftCardActivityResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
