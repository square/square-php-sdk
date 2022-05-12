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

class CustomerCustomAttributesApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * Lists the customer-related custom attribute definitions that belong to a Square seller account.
     *
     * When all response pages are retrieved, the results include all custom attribute definitions
     * that are visible to the requesting application, including those that are created by other
     * applications and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param int|null $limit The maximum number of results to return in a single paged response.
     *        This limit is advisory.
     *        The response might contain more or fewer results. The minimum value is 1 and the
     *        maximum value is 100.
     *        The default value is 20. For more information, see [Pagination](https://developer.
     *        squareup.com/docs/build-basics/common-api-patterns/pagination).
     * @param string|null $cursor The cursor returned in the paged response from the previous call
     *        to this endpoint.
     *        Provide this cursor to retrieve the next page of results for your original request.
     *        For more information, see [Pagination](https://developer.squareup.com/docs/build-
     *        basics/common-api-patterns/pagination).
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listCustomerCustomAttributeDefinitions(?int $limit = null, ?string $cursor = null): ApiResponse
    {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/customers/custom-attribute-definitions';

        //process query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryUrl, [
            'limit'  => $limit,
            'cursor' => $cursor,
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
            'ListCustomerCustomAttributeDefinitionsResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates a customer-related custom attribute definition for a Square seller account. Use this
     * endpoint to define a custom attribute that can be associated with customer profiles.
     *
     * A custom attribute definition specifies the `key`, `visibility`, `schema`, and other properties
     * for a custom attribute. After the definition is created, you can call
     * [UpsertCustomerCustomAttribute]($e/CustomerCustomAttributes/UpsertCustomerCustomAttribute) or
     * [BulkUpsertCustomerCustomAttributes]($e/CustomerCustomAttributes/BulkUpsertCustomerCustomAttributes)
     * to set the custom attribute for customer profiles in the seller's Customer Directory.
     *
     * Sellers can view all custom attributes in exported customer data, including those set to
     * `VISIBILITY_HIDDEN`.
     *
     * @param Models\CreateCustomerCustomAttributeDefinitionRequest $body An object containing the
     *        fields to POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createCustomerCustomAttributeDefinition(
        Models\CreateCustomerCustomAttributeDefinitionRequest $body
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/customers/custom-attribute-definitions';

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
            'CreateCustomerCustomAttributeDefinitionResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Deletes a customer-related custom attribute definition from a Square seller account.
     *
     * Deleting a custom attribute definition also deletes the corresponding custom attribute from
     * all customer profiles in the seller's Customer Directory.
     *
     * Only the definition owner can delete a custom attribute definition.
     *
     * @param string $key The key of the custom attribute definition to delete.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function deleteCustomerCustomAttributeDefinition(string $key): ApiResponse
    {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/customers/custom-attribute-definitions/{key}';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'key' => $key,
        ]);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::delete($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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
            'DeleteCustomerCustomAttributeDefinitionResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves a customer-related custom attribute definition from a Square seller account.
     *
     * To retrieve a custom attribute definition created by another application, the `visibility`
     * setting must be `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $key The key of the custom attribute definition to retrieve. If the requesting
     *        application
     *        is not the definition owner, you must use the qualified key.
     * @param int|null $version The current version of the custom attribute definition, which is
     *        used for strongly consistent
     *        reads to guarantee that you receive the most up-to-date data. When included in the
     *        request,
     *        Square returns the specified version or a higher version if one exists. If the
     *        specified version
     *        is higher than the current version, Square returns a `BAD_REQUEST` error.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrieveCustomerCustomAttributeDefinition(string $key, ?int $version = null): ApiResponse
    {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/customers/custom-attribute-definitions/{key}';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'key'     => $key,
        ]);

        //process query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryUrl, [
            'version' => $version,
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
            'RetrieveCustomerCustomAttributeDefinitionResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Updates a customer-related custom attribute definition for a Square seller account.
     *
     * Use this endpoint to update the following fields: `name`, `description`, `visibility`, or the
     * `schema` for a `Selection` data type.
     *
     * Only the definition owner can update a custom attribute definition. Note that sellers can view
     * all custom attributes in exported customer data, including those set to `VISIBILITY_HIDDEN`.
     *
     * @param string $key The key of the custom attribute definition to update.
     * @param Models\UpdateCustomerCustomAttributeDefinitionRequest $body An object containing the
     *        fields to POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateCustomerCustomAttributeDefinition(
        string $key,
        Models\UpdateCustomerCustomAttributeDefinitionRequest $body
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/customers/custom-attribute-definitions/{key}';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'key'          => $key,
        ]);

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

        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::put($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders(), $_bodyJson);
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
            'UpdateCustomerCustomAttributeDefinitionResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates or updates custom attributes for customer profiles as a bulk operation.
     *
     * Use this endpoint to set the value of one or more custom attributes for one or more customer
     * profiles.
     * A custom attribute is based on a custom attribute definition in a Square seller account, which is
     * created using the
     * [CreateCustomerCustomAttributeDefinition]($e/CustomerCustomAttributes/CreateCustomerCustomAttributeD
     * efinition) endpoint.
     *
     * This `BulkUpsertCustomerCustomAttributes` endpoint accepts a map of 1 to 25 individual upsert
     * requests and returns a map of individual upsert responses. Each upsert request has a unique ID
     * and provides a customer ID and custom attribute. Each upsert response is returned with the ID
     * of the corresponding request.
     *
     * To create or update a custom attribute owned by another application, the `visibility` setting
     * must be `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param Models\BulkUpsertCustomerCustomAttributesRequest $body An object containing the fields
     *        to POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function bulkUpsertCustomerCustomAttributes(
        Models\BulkUpsertCustomerCustomAttributesRequest $body
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/customers/custom-attributes/bulk-upsert';

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
            'BulkUpsertCustomerCustomAttributesResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Lists the custom attributes associated with a customer profile.
     *
     * You can use the `with_definitions` query parameter to also retrieve custom attribute definitions
     * in the same call.
     *
     * When all response pages are retrieved, the results include all custom attributes that are
     * visible to the requesting application, including those that are owned by other applications
     * and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $customerId The ID of the target [customer profile]($m/Customer).
     * @param int|null $limit The maximum number of results to return in a single paged response.
     *        This limit is advisory.
     *        The response might contain more or fewer results. The minimum value is 1 and the
     *        maximum value is 100.
     *        The default value is 20. For more information, see [Pagination](https://developer.
     *        squareup.com/docs/build-basics/common-api-patterns/pagination).
     * @param string|null $cursor The cursor returned in the paged response from the previous call
     *        to this endpoint.
     *        Provide this cursor to retrieve the next page of results for your original request.
     *        For more
     *        information, see [Pagination](https://developer.squareup.com/docs/build-
     *        basics/common-api-patterns/pagination).
     * @param bool|null $withDefinitions Indicates whether to return the [custom attribute
     *        definition]($m/CustomAttributeDefinition) in the `definition` field of each
     *        custom attribute. Set this parameter to `true` to get the name and description of
     *        each custom
     *        attribute, information about the data type, or other definition details. The default
     *        value is `false`.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listCustomerCustomAttributes(
        string $customerId,
        ?int $limit = null,
        ?string $cursor = null,
        ?bool $withDefinitions = false
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() . '/v2/customers/{customer_id}/custom-attributes';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'customer_id'      => $customerId,
        ]);

        //process query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryUrl, [
            'limit'            => $limit,
            'cursor'           => $cursor,
            'with_definitions' => (null != $withDefinitions) ?
                var_export($withDefinitions, true) : false,
        ]);

        //prepare headers
        $_headers = [
            'user-agent'     => $this->internalUserAgent,
            'Accept'         => 'application/json',
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
            'ListCustomerCustomAttributesResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Deletes a custom attribute associated with a customer profile.
     *
     * To delete a custom attribute owned by another application, the `visibility` setting must be
     * `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $customerId The ID of the target [customer profile]($m/Customer).
     * @param string $key The key of the custom attribute to delete. This key must match the `key`
     *        of a custom
     *        attribute definition in the Square seller account. If the requesting application is
     *        not the
     *        definition owner, you must use the qualified key.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function deleteCustomerCustomAttribute(string $customerId, string $key): ApiResponse
    {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() .
            '/v2/customers/{customer_id}/custom-attributes/{key}';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'customer_id' => $customerId,
            'key'         => $key,
        ]);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::delete($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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
            'DeleteCustomerCustomAttributeResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves a custom attribute associated with a customer profile.
     *
     * You can use the `with_definition` query parameter to also retrieve the custom attribute definition
     * in the same call.
     *
     * To retrieve a custom attribute owned by another application, the `visibility` setting must be
     * `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $customerId The ID of the target [customer profile]($m/Customer).
     * @param string $key The key of the custom attribute to retrieve. This key must match the `key`
     *        of a custom
     *        attribute definition in the Square seller account. If the requesting application is
     *        not the
     *        definition owner, you must use the qualified key.
     * @param bool|null $withDefinition Indicates whether to return the [custom attribute
     *        definition]($m/CustomAttributeDefinition) in the `definition` field of
     *        the custom attribute. Set this parameter to `true` to get the name and description
     *        of the custom
     *        attribute, information about the data type, or other definition details. The default
     *        value is `false`.
     * @param int|null $version The current version of the custom attribute, which is used for
     *        strongly consistent reads to
     *        guarantee that you receive the most up-to-date data. When included in the request,
     *        Square
     *        returns the specified version or a higher version if one exists. If the specified
     *        version is
     *        higher than the current version, Square returns a `BAD_REQUEST` error.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrieveCustomerCustomAttribute(
        string $customerId,
        string $key,
        ?bool $withDefinition = false,
        ?int $version = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() .
            '/v2/customers/{customer_id}/custom-attributes/{key}';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'customer_id'     => $customerId,
            'key'             => $key,
        ]);

        //process query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryUrl, [
            'with_definition' => (null != $withDefinition) ?
                var_export($withDefinition, true) : false,
            'version'         => $version,
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
            'RetrieveCustomerCustomAttributeResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates or updates a custom attribute for a customer profile.
     *
     * Use this endpoint to set the value of a custom attribute for a specified customer profile.
     * A custom attribute is based on a custom attribute definition in a Square seller account, which
     * is created using the
     * [CreateCustomerCustomAttributeDefinition]($e/CustomerCustomAttributes/CreateCustomerCustomAttributeD
     * efinition) endpoint.
     *
     * To create or update a custom attribute owned by another application, the `visibility` setting
     * must be `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $customerId The ID of the target [customer profile]($m/Customer).
     * @param string $key The key of the custom attribute to create or update. This key must match
     *        the `key` of a
     *        custom attribute definition in the Square seller account. If the requesting
     *        application is not
     *        the definition owner, you must use the qualified key.
     * @param Models\UpsertCustomerCustomAttributeRequest $body An object containing the fields to
     *        POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function upsertCustomerCustomAttribute(
        string $customerId,
        string $key,
        Models\UpsertCustomerCustomAttributeRequest $body
    ): ApiResponse {
        //prepare query string for API call
        $_queryUrl = $this->config->getBaseUri() .
            '/v2/customers/{customer_id}/custom-attributes/{key}';

        //process template parameters
        $_queryUrl = ApiHelper::appendUrlWithTemplateParameters($_queryUrl, [
            'customer_id'  => $customerId,
            'key'          => $key,
        ]);

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
            'UpsertCustomerCustomAttributeResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
