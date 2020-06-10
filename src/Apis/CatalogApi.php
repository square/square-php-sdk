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

class CatalogApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, ?HttpCallBack $httpCallBack = null)
    {
        parent::__construct($config, $httpCallBack);
    }

    /**
     * Deletes a set of [CatalogItem](#type-catalogitem)s based on the
     * provided list of target IDs and returns a set of successfully deleted IDs in
     * the response. Deletion is a cascading event such that all children of the
     * targeted object are also deleted. For example, deleting a CatalogItem will
     * also delete all of its [CatalogItemVariation](#type-catalogitemvariation)
     * children.
     *
     * `BatchDeleteCatalogObjects` succeeds even if only a portion of the targeted
     * IDs can be deleted. The response will only include IDs that were
     * actually deleted.
     *
     * @param \Square\Models\BatchDeleteCatalogObjectsRequest $body An object containing the
     *                                                              fields to POST for the request.
     *
     *                                                              See the corresponding object
     *                                                              definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function batchDeleteCatalogObjects(\Square\Models\BatchDeleteCatalogObjectsRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/batch-delete';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\BatchDeleteCatalogObjectsResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Returns a set of objects based on the provided ID.
     * Each [CatalogItem](#type-catalogitem) returned in the set includes all of its
     * child information including: all of its
     * [CatalogItemVariation](#type-catalogitemvariation) objects, references to
     * its [CatalogModifierList](#type-catalogmodifierlist) objects, and the ids of
     * any [CatalogTax](#type-catalogtax) objects that apply to it.
     *
     * @param \Square\Models\BatchRetrieveCatalogObjectsRequest $body An object containing the
     *                                                                fields to POST for the
     *                                                                request.
     *
     *                                                                See the corresponding object
     *                                                                definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function batchRetrieveCatalogObjects(\Square\Models\BatchRetrieveCatalogObjectsRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/batch-retrieve';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
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
            'Square\\Models\\BatchRetrieveCatalogObjectsResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates or updates up to 10,000 target objects based on the provided
     * list of objects. The target objects are grouped into batches and each batch is
     * inserted/updated in an all-or-nothing manner. If an object within a batch is
     * malformed in some way, or violates a database constraint, the entire batch
     * containing that item will be disregarded. However, other batches in the same
     * request may still succeed. Each batch may contain up to 1,000 objects, and
     * batches will be processed in order as long as the total object count for the
     * request (items, variations, modifier lists, discounts, and taxes) is no more
     * than 10,000.
     *
     * @param \Square\Models\BatchUpsertCatalogObjectsRequest $body An object containing the
     *                                                              fields to POST for the request.
     *
     *                                                              See the corresponding object
     *                                                              definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function batchUpsertCatalogObjects(\Square\Models\BatchUpsertCatalogObjectsRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/batch-upsert';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\BatchUpsertCatalogObjectsResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Upload an image file to create a new [CatalogImage](#type-catalogimage) for an existing
     * [CatalogObject](#type-catalogobject). Images can be uploaded and linked in this request or created
     * independently
     * (without an object assignment) and linked to a [CatalogObject](#type-catalogobject) at a later time.
     *
     * CreateCatalogImage accepts HTTP multipart/form-data requests with a JSON part and an image file part
     * in
     * JPEG, PJPEG, PNG, or GIF format. The maximum file size is 15MB. The following is an example of such
     * an HTTP request:
     *
     * ```
     * POST /v2/catalog/images
     * Accept: application/json
     * Content-Type: multipart/form-data;boundary="boundary"
     * Square-Version: XXXX-XX-XX
     * Authorization: Bearer {ACCESS_TOKEN}
     *
     * --boundary
     * Content-Disposition: form-data; name="request"
     * Content-Type: application/json
     *
     * {
     * "idempotency_key":"528dea59-7bfb-43c1-bd48-4a6bba7dd61f86",
     * "object_id": "ND6EA5AAJEO5WL3JNNIAQA32",
     * "image":{
     * "id":"#TEMP_ID",
     * "type":"IMAGE",
     * "image_data":{
     * "caption":"A picture of a cup of coffee"
     * }
     * }
     * }
     * --boundary
     * Content-Disposition: form-data; name="image"; filename="Coffee.jpg"
     * Content-Type: image/jpeg
     *
     * {ACTUAL_IMAGE_BYTES}
     * --boundary
     * ```
     *
     * Additional information and an example cURL request can be found in the [Create a Catalog Image
     * recipe](https://developer.squareup.com/docs/more-apis/catalog/cookbook/create-catalog-images).
     *
     * @param \Square\Models\CreateCatalogImageRequest|null $request
     * @param \Square\Utils\FileWrapper|null $imageFile
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createCatalogImage(
        ?\Square\Models\CreateCatalogImageRequest $request = null,
        ?\Square\Utils\FileWrapper $imageFile = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/images';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //prepare parameters
        $_parameters = [
            'request'  => json_encode($request),
            'image_file' => $imageFile === null ? null : $imageFile->createCurlFileInstance()
        ];

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl, $_parameters);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, Request::buildHTTPCurlQuery($_parameters));
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CreateCatalogImageResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Returns information about the Square Catalog API, such as batch size
     * limits for `BatchUpsertCatalogObjects`.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function catalogInfo(): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/info';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CatalogInfoResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Returns a list of [CatalogObject](#type-catalogobject)s that includes
     * all objects of a set of desired types (for example, all [CatalogItem](#type-catalogitem)
     * and [CatalogTax](#type-catalogtax) objects) in the catalog. The `types` parameter
     * is specified as a comma-separated list of valid [CatalogObject](#type-catalogobject) types:
     * `ITEM`, `ITEM_VARIATION`, `MODIFIER`, `MODIFIER_LIST`, `CATEGORY`, `DISCOUNT`, `TAX`, `IMAGE`.
     *
     * __Important:__ ListCatalog does not return deleted catalog items. To retrieve
     * deleted catalog items, use SearchCatalogObjects and set `include_deleted_objects`
     * to `true`.
     *
     * @param string|null $cursor The pagination cursor returned in the previous response. Leave
     *                            unset for an initial request.
     *                            See [Pagination](https://developer.squareup.
     *                            com/docs/basics/api101/pagination) for more information.
     * @param string|null $types An optional case-insensitive, comma-separated list of object
     *                           types to retrieve, for example
     *                           `ITEM,ITEM_VARIATION,CATEGORY,IMAGE`.
     *
     *                           The legal values are taken from the CatalogObjectType enum:
     *                           `ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,
     *                           `MODIFIER`, `MODIFIER_LIST`, or `IMAGE`.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listCatalog(?string $cursor = null, ?string $types = null): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/list';

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'cursor' => $cursor,
            'types'  => $types,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\ListCatalogResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates or updates the target [CatalogObject](#type-catalogobject).
     *
     * @param \Square\Models\UpsertCatalogObjectRequest $body An object containing the fields to
     *                                                        POST for the request.
     *
     *                                                        See the corresponding object
     *                                                        definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function upsertCatalogObject(\Square\Models\UpsertCatalogObjectRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/object';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\UpsertCatalogObjectResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Deletes a single [CatalogObject](#type-catalogobject) based on the
     * provided ID and returns the set of successfully deleted IDs in the response.
     * Deletion is a cascading event such that all children of the targeted object
     * are also deleted. For example, deleting a [CatalogItem](#type-catalogitem)
     * will also delete all of its
     * [CatalogItemVariation](#type-catalogitemvariation) children.
     *
     * @param string $objectId The ID of the catalog object to be deleted. When an object is
     *                         deleted, other
     *                         objects in the graph that depend on that object will be deleted as
     *                         well (for example, deleting a
     *                         catalog item will delete its catalog item variations).
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function deleteCatalogObject(string $objectId): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/object/{object_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'object_id' => $objectId,
            ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::delete($_queryUrl, $_headers);
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\DeleteCatalogObjectResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Returns a single [CatalogItem](#type-catalogitem) as a
     * [CatalogObject](#type-catalogobject) based on the provided ID. The returned
     * object includes all of the relevant [CatalogItem](#type-catalogitem)
     * information including: [CatalogItemVariation](#type-catalogitemvariation)
     * children, references to its
     * [CatalogModifierList](#type-catalogmodifierlist) objects, and the ids of
     * any [CatalogTax](#type-catalogtax) objects that apply to it.
     *
     * @param string $objectId The object ID of any type of catalog objects to be retrieved.
     * @param bool|null $includeRelatedObjects If `true`, the response will include additional
     *                                         objects that are related to the
     *                                         requested object, as follows:
     *
     *                                         If the `object` field of the response contains a
     *                                         CatalogItem,
     *                                         its associated CatalogCategory, CatalogTax objects,
     *                                         CatalogImages and CatalogModifierLists
     *                                         will be returned in the `related_objects` field of
     *                                         the response. If the `object`
     *                                         field of the response contains a
     *                                         CatalogItemVariation,
     *                                         its parent CatalogItem will be returned in the
     *                                         `related_objects` field of
     *                                         the response.
     *
     *                                         Default value: `false`
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrieveCatalogObject(string $objectId, ?bool $includeRelatedObjects = null): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/object/{object_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'object_id'               => $objectId,
            ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'include_related_objects' => var_export($includeRelatedObjects, true),
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'            => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'                => 'application/json',
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\RetrieveCatalogObjectResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Queries the targeted catalog using a variety of query types:
     * [CatalogQuerySortedAttribute](#type-catalogquerysortedattribute),
     * [CatalogQueryExact](#type-catalogqueryexact),
     * [CatalogQueryRange](#type-catalogqueryrange),
     * [CatalogQueryText](#type-catalogquerytext),
     * [CatalogQueryItemsForTax](#type-catalogqueryitemsfortax), and
     * [CatalogQueryItemsForModifierList](#type-catalogqueryitemsformodifierlist).
     * --
     * --
     * Future end of the above comment:
     * [CatalogQueryItemsForTax](#type-catalogqueryitemsfortax),
     * [CatalogQueryItemsForModifierList](#type-catalogqueryitemsformodifierlist),
     * [CatalogQueryItemsForItemOptions](#type-catalogqueryitemsforitemoptions), and
     * [CatalogQueryItemVariationsForItemOptionValues](#type-catalogqueryitemvariationsforitemoptionvalues).
     *
     * @param \Square\Models\SearchCatalogObjectsRequest $body An object containing the fields to
     *                                                         POST for the request.
     *
     *                                                         See the corresponding object
     *                                                         definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function searchCatalogObjects(\Square\Models\SearchCatalogObjectsRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/search';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\SearchCatalogObjectsResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Updates the [CatalogModifierList](#type-catalogmodifierlist) objects
     * that apply to the targeted [CatalogItem](#type-catalogitem) without having
     * to perform an upsert on the entire item.
     *
     * @param \Square\Models\UpdateItemModifierListsRequest $body An object containing the fields
     *                                                            to POST for the request.
     *
     *                                                            See the corresponding object
     *                                                            definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateItemModifierLists(\Square\Models\UpdateItemModifierListsRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/update-item-modifier-lists';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\UpdateItemModifierListsResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Updates the [CatalogTax](#type-catalogtax) objects that apply to the
     * targeted [CatalogItem](#type-catalogitem) without having to perform an
     * upsert on the entire item.
     *
     * @param \Square\Models\UpdateItemTaxesRequest $body An object containing the fields to POST
     *                                                    for the request.
     *
     *                                                    See the corresponding object definition
     *                                                    for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateItemTaxes(\Square\Models\UpdateItemTaxesRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/catalog/update-item-taxes';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Square-Version' => $this->config->getSquareVersion(),
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\UpdateItemTaxesResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
