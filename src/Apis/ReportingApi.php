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

class ReportingApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, ?HttpCallBack $httpCallBack = null)
    {
        parent::__construct($config, $httpCallBack);
    }

    /**
     * Returns a list of refunded transactions (across all possible originating locations) relating to
     * monies
     * credited to the provided location ID by another Square account using the `additional_recipients`
     * field in a transaction.
     *
     * Max results per [page](#paginatingresults): 50
     *
     * @deprecated
     *
     * @param string $locationId The ID of the location to list
     *                           AdditionalRecipientReceivableRefunds for.
     * @param string|null $beginTime The beginning of the requested reporting period, in RFC 3339
     *                               format.
     *
     *                               See [Date ranges](#dateranges) for details on date
     *                               inclusivity/exclusivity.
     *
     *                               Default value: The current time minus one year.
     * @param string|null $endTime The end of the requested reporting period, in RFC 3339 format.
     *
     *                             See [Date ranges](#dateranges) for details on date
     *                             inclusivity/exclusivity.
     *
     *                             Default value: The current time.
     * @param string|null $sortOrder The order in which results are listed in the response (`ASC`
     *                               for
     *                               oldest first, `DESC` for newest first).
     *
     *                               Default value: `DESC`
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *                            Provide this to retrieve the next set of results for your
     *                            original query.
     *
     *                            See [Paginating results](#paginatingresults) for more
     *                            information.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listAdditionalRecipientReceivableRefunds(
        string $locationId,
        ?string $beginTime = null,
        ?string $endTime = null,
        ?string $sortOrder = null,
        ?string $cursor = null
    ): ApiResponse {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v2/locations/{location_id}/additional-recipient-receivable-refunds';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id' => $locationId,
            ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'begin_time'  => $beginTime,
            'end_time'    => $endTime,
            'sort_order'  => $sortOrder,
            'cursor'      => $cursor,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_queryUrl, $_headers);
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
        $deserializedResponse = $mapper->mapClass(
            $response->body,
            'Square\\Models\\ListAdditionalRecipientReceivableRefundsResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Returns a list of receivables (across all possible sending locations) representing monies credited
     * to the provided location ID by another Square account using the `additional_recipients` field in a
     * transaction.
     *
     * Max results per [page](#paginatingresults): 50
     *
     * @deprecated
     *
     * @param string $locationId The ID of the location to list AdditionalRecipientReceivables for.
     * @param string|null $beginTime The beginning of the requested reporting period, in RFC 3339
     *                               format.
     *
     *                               See [Date ranges](#dateranges) for details on date
     *                               inclusivity/exclusivity.
     *
     *                               Default value: The current time minus one year.
     * @param string|null $endTime The end of the requested reporting period, in RFC 3339 format.
     *
     *                             See [Date ranges](#dateranges) for details on date
     *                             inclusivity/exclusivity.
     *
     *                             Default value: The current time.
     * @param string|null $sortOrder The order in which results are listed in the response (`ASC`
     *                               for
     *                               oldest first, `DESC` for newest first).
     *
     *                               Default value: `DESC`
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *                            Provide this to retrieve the next set of results for your
     *                            original query.
     *
     *                            See [Paginating results](#paginatingresults) for more
     *                            information.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listAdditionalRecipientReceivables(
        string $locationId,
        ?string $beginTime = null,
        ?string $endTime = null,
        ?string $sortOrder = null,
        ?string $cursor = null
    ): ApiResponse {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v2/locations/{location_id}/additional-recipient-receivables';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id' => $locationId,
            ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'begin_time'  => $beginTime,
            'end_time'    => $endTime,
            'sort_order'  => $sortOrder,
            'cursor'      => $cursor,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_queryUrl, $_headers);
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
        $deserializedResponse = $mapper->mapClass(
            $response->body,
            'Square\\Models\\ListAdditionalRecipientReceivablesResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
