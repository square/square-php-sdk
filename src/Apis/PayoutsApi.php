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

class PayoutsApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * Retrieves a list of all payouts for the default location.
     * You can filter payouts by location ID, status, time range, and order them in ascending or descending
     * order.
     * To call this endpoint, set `PAYOUTS_READ` for the OAuth scope.
     *
     * @param string|null $locationId The ID of the location for which to list the payouts. By
     *        default, payouts are returned for the default (main) location associated with the
     *        seller.
     * @param string|null $status If provided, only payouts with the given status are returned.
     * @param string|null $beginTime The timestamp for the beginning of the payout creation time, in
     *        RFC 3339 format.
     *        Inclusive. Default: The current time minus one year.
     * @param string|null $endTime The timestamp for the end of the payout creation time, in RFC
     *        3339 format.
     *        Default: The current time.
     * @param string|null $sortOrder The order in which payouts are listed.
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *        Provide this cursor to retrieve the next set of results for the original query.
     *        For more information, see [Pagination](https://developer.squareup.
     *        com/docs/basics/api101/pagination).
     *        If request parameters change between requests, subsequent results may contain
     *        duplicates or missing records.
     * @param int|null $limit The maximum number of results to be returned in a single page. It is
     *        possible to receive fewer results than the specified limit on a given page.
     *        The default value of 100 is also the maximum allowed value. If the provided value
     *        is
     *        greater than 100, it is ignored and the default value is used instead.
     *        Default: `100`
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listPayouts(
        ?string $locationId = null,
        ?string $status = null,
        ?string $beginTime = null,
        ?string $endTime = null,
        ?string $sortOrder = null,
        ?string $cursor = null,
        ?int $limit = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/payouts';

        //process query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryUrl, [
            'location_id' => $locationId,
            'status'      => Models\PayoutStatus::checkValue($status),
            'begin_time'  => $beginTime,
            'end_time'    => $endTime,
            'sort_order'  => Models\SortOrder::checkValue($sortOrder),
            'cursor'      => $cursor,
            'limit'       => $limit,
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
            'ListPayoutsResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves details of a specific payout identified by a payout ID.
     * To call this endpoint, set `PAYOUTS_READ` for the OAuth scope.
     *
     * @param string $payoutId The ID of the payout to retrieve the information for.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function getPayout(string $payoutId): ApiResponse
    {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/payouts/{payout_id}';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'payout_id' => $payoutId,
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
            'GetPayoutResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves a list of all payout entries for a specific payout.
     * To call this endpoint, set `PAYOUTS_READ` for the OAuth scope.
     *
     * @param string $payoutId The ID of the payout to retrieve the information for.
     * @param string|null $sortOrder The order in which payout entries are listed.
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *        Provide this cursor to retrieve the next set of results for the original query.
     *        For more information, see [Pagination](https://developer.squareup.
     *        com/docs/basics/api101/pagination).
     *        If request parameters change between requests, subsequent results may contain
     *        duplicates or missing records.
     * @param int|null $limit The maximum number of results to be returned in a single page. It is
     *        possible to receive fewer results than the specified limit on a given page.
     *        The default value of 100 is also the maximum allowed value. If the provided value
     *        is
     *        greater than 100, it is ignored and the default value is used instead.
     *        Default: `100`
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listPayoutEntries(
        string $payoutId,
        ?string $sortOrder = null,
        ?string $cursor = null,
        ?int $limit = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/payouts/{payout_id}/payout-entries';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'payout_id'  => $payoutId,
        ]);

        //process query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryUrl, [
            'sort_order' => Models\SortOrder::checkValue($sortOrder),
            'cursor'     => $cursor,
            'limit'      => $limit,
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
            'ListPayoutEntriesResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
