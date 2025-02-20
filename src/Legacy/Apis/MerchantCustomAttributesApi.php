<?php

declare(strict_types=1);

namespace Square\Legacy\Apis;

use Core\Request\Parameters\BodyParam;
use Core\Request\Parameters\HeaderParam;
use Core\Request\Parameters\QueryParam;
use Core\Request\Parameters\TemplateParam;
use CoreInterfaces\Core\Request\RequestMethod;
use Square\Legacy\Http\ApiResponse;
use Square\Legacy\Models\BulkDeleteMerchantCustomAttributesRequest;
use Square\Legacy\Models\BulkDeleteMerchantCustomAttributesResponse;
use Square\Legacy\Models\BulkUpsertMerchantCustomAttributesRequest;
use Square\Legacy\Models\BulkUpsertMerchantCustomAttributesResponse;
use Square\Legacy\Models\CreateMerchantCustomAttributeDefinitionRequest;
use Square\Legacy\Models\CreateMerchantCustomAttributeDefinitionResponse;
use Square\Legacy\Models\DeleteMerchantCustomAttributeDefinitionResponse;
use Square\Legacy\Models\DeleteMerchantCustomAttributeResponse;
use Square\Legacy\Models\ListMerchantCustomAttributeDefinitionsResponse;
use Square\Legacy\Models\ListMerchantCustomAttributesResponse;
use Square\Legacy\Models\RetrieveMerchantCustomAttributeDefinitionResponse;
use Square\Legacy\Models\RetrieveMerchantCustomAttributeResponse;
use Square\Legacy\Models\UpdateMerchantCustomAttributeDefinitionRequest;
use Square\Legacy\Models\UpdateMerchantCustomAttributeDefinitionResponse;
use Square\Legacy\Models\UpsertMerchantCustomAttributeRequest;
use Square\Legacy\Models\UpsertMerchantCustomAttributeResponse;

class MerchantCustomAttributesApi extends BaseApi
{
    /**
     * Lists the merchant-related [custom attribute definitions]($m/CustomAttributeDefinition) that belong
     * to a Square seller account.
     * When all response pages are retrieved, the results include all custom attribute definitions
     * that are visible to the requesting application, including those that are created by other
     * applications and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string|null $visibilityFilter Filters the `CustomAttributeDefinition` results by their
     *        `visibility` values.
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
     */
    public function listMerchantCustomAttributeDefinitions(
        ?string $visibilityFilter = null,
        ?int $limit = null,
        ?string $cursor = null
    ): ApiResponse {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/v2/merchants/custom-attribute-definitions')
            ->auth('global')
            ->parameters(
                QueryParam::init('visibility_filter', $visibilityFilter),
                QueryParam::init('limit', $limit),
                QueryParam::init('cursor', $cursor)
            );

        $_resHandler = $this->responseHandler()
            ->type(ListMerchantCustomAttributeDefinitionsResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Creates a merchant-related [custom attribute definition]($m/CustomAttributeDefinition) for a Square
     * seller account.
     * Use this endpoint to define a custom attribute that can be associated with a merchant connecting to
     * your application.
     * A custom attribute definition specifies the `key`, `visibility`, `schema`, and other properties
     * for a custom attribute. After the definition is created, you can call
     * [UpsertMerchantCustomAttribute]($e/MerchantCustomAttributes/UpsertMerchantCustomAttribute) or
     * [BulkUpsertMerchantCustomAttributes]($e/MerchantCustomAttributes/BulkUpsertMerchantCustomAttributes)
     * to set the custom attribute for a merchant.
     *
     * @param CreateMerchantCustomAttributeDefinitionRequest $body An object containing the fields
     *        to POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     */
    public function createMerchantCustomAttributeDefinition(
        CreateMerchantCustomAttributeDefinitionRequest $body
    ): ApiResponse {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/v2/merchants/custom-attribute-definitions')
            ->auth('global')
            ->parameters(HeaderParam::init('Content-Type', 'application/json'), BodyParam::init($body));

        $_resHandler = $this->responseHandler()
            ->type(CreateMerchantCustomAttributeDefinitionResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Deletes a merchant-related [custom attribute definition]($m/CustomAttributeDefinition) from a Square
     * seller account.
     * Deleting a custom attribute definition also deletes the corresponding custom attribute from
     * the merchant.
     * Only the definition owner can delete a custom attribute definition.
     *
     * @param string $key The key of the custom attribute definition to delete.
     *
     * @return ApiResponse Response from the API call
     */
    public function deleteMerchantCustomAttributeDefinition(string $key): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(
            RequestMethod::DELETE,
            '/v2/merchants/custom-attribute-definitions/{key}'
        )->auth('global')->parameters(TemplateParam::init('key', $key));

        $_resHandler = $this->responseHandler()
            ->type(DeleteMerchantCustomAttributeDefinitionResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Retrieves a merchant-related [custom attribute definition]($m/CustomAttributeDefinition) from a
     * Square seller account.
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
     */
    public function retrieveMerchantCustomAttributeDefinition(string $key, ?int $version = null): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(
            RequestMethod::GET,
            '/v2/merchants/custom-attribute-definitions/{key}'
        )->auth('global')->parameters(TemplateParam::init('key', $key), QueryParam::init('version', $version));

        $_resHandler = $this->responseHandler()
            ->type(RetrieveMerchantCustomAttributeDefinitionResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Updates a merchant-related [custom attribute definition]($m/CustomAttributeDefinition) for a Square
     * seller account.
     * Use this endpoint to update the following fields: `name`, `description`, `visibility`, or the
     * `schema` for a `Selection` data type.
     * Only the definition owner can update a custom attribute definition.
     *
     * @param string $key The key of the custom attribute definition to update.
     * @param UpdateMerchantCustomAttributeDefinitionRequest $body An object containing the fields
     *        to POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     */
    public function updateMerchantCustomAttributeDefinition(
        string $key,
        UpdateMerchantCustomAttributeDefinitionRequest $body
    ): ApiResponse {
        $_reqBuilder = $this->requestBuilder(
            RequestMethod::PUT,
            '/v2/merchants/custom-attribute-definitions/{key}'
        )
            ->auth('global')
            ->parameters(
                TemplateParam::init('key', $key),
                HeaderParam::init('Content-Type', 'application/json'),
                BodyParam::init($body)
            );

        $_resHandler = $this->responseHandler()
            ->type(UpdateMerchantCustomAttributeDefinitionResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Deletes [custom attributes]($m/CustomAttribute) for a merchant as a bulk operation.
     * To delete a custom attribute owned by another application, the `visibility` setting must be
     * `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param BulkDeleteMerchantCustomAttributesRequest $body An object containing the fields to
     *        POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     */
    public function bulkDeleteMerchantCustomAttributes(BulkDeleteMerchantCustomAttributesRequest $body): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/v2/merchants/custom-attributes/bulk-delete')
            ->auth('global')
            ->parameters(HeaderParam::init('Content-Type', 'application/json'), BodyParam::init($body));

        $_resHandler = $this->responseHandler()
            ->type(BulkDeleteMerchantCustomAttributesResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Creates or updates [custom attributes]($m/CustomAttribute) for a merchant as a bulk operation.
     * Use this endpoint to set the value of one or more custom attributes for a merchant.
     * A custom attribute is based on a custom attribute definition in a Square seller account, which is
     * created using the
     * [CreateMerchantCustomAttributeDefinition]($e/MerchantCustomAttributes/CreateMerchantCustomAttributeD
     * efinition) endpoint.
     * This `BulkUpsertMerchantCustomAttributes` endpoint accepts a map of 1 to 25 individual upsert
     * requests and returns a map of individual upsert responses. Each upsert request has a unique ID
     * and provides a merchant ID and custom attribute. Each upsert response is returned with the ID
     * of the corresponding request.
     * To create or update a custom attribute owned by another application, the `visibility` setting
     * must be `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param BulkUpsertMerchantCustomAttributesRequest $body An object containing the fields to
     *        POST for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     */
    public function bulkUpsertMerchantCustomAttributes(BulkUpsertMerchantCustomAttributesRequest $body): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/v2/merchants/custom-attributes/bulk-upsert')
            ->auth('global')
            ->parameters(HeaderParam::init('Content-Type', 'application/json'), BodyParam::init($body));

        $_resHandler = $this->responseHandler()
            ->type(BulkUpsertMerchantCustomAttributesResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Lists the [custom attributes]($m/CustomAttribute) associated with a merchant.
     * You can use the `with_definitions` query parameter to also retrieve custom attribute definitions
     * in the same call.
     * When all response pages are retrieved, the results include all custom attributes that are
     * visible to the requesting application, including those that are owned by other applications
     * and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $merchantId The ID of the target [merchant](entity:Merchant).
     * @param string|null $visibilityFilter Filters the `CustomAttributeDefinition` results by their
     *        `visibility` values.
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
     *        definition](entity:CustomAttributeDefinition) in the `definition` field of each
     *        custom attribute. Set this parameter to `true` to get the name and description of
     *        each custom
     *        attribute, information about the data type, or other definition details. The default
     *        value is `false`.
     *
     * @return ApiResponse Response from the API call
     */
    public function listMerchantCustomAttributes(
        string $merchantId,
        ?string $visibilityFilter = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?bool $withDefinitions = false
    ): ApiResponse {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/v2/merchants/{merchant_id}/custom-attributes')
            ->auth('global')
            ->parameters(
                TemplateParam::init('merchant_id', $merchantId),
                QueryParam::init('visibility_filter', $visibilityFilter),
                QueryParam::init('limit', $limit),
                QueryParam::init('cursor', $cursor),
                QueryParam::init('with_definitions', $withDefinitions)
            );

        $_resHandler = $this->responseHandler()
            ->type(ListMerchantCustomAttributesResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Deletes a [custom attribute]($m/CustomAttribute) associated with a merchant.
     * To delete a custom attribute owned by another application, the `visibility` setting must be
     * `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $merchantId The ID of the target [merchant](entity:Merchant).
     * @param string $key The key of the custom attribute to delete. This key must match the `key`
     *        of a custom
     *        attribute definition in the Square seller account. If the requesting application is
     *        not the
     *        definition owner, you must use the qualified key.
     *
     * @return ApiResponse Response from the API call
     */
    public function deleteMerchantCustomAttribute(string $merchantId, string $key): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(
            RequestMethod::DELETE,
            '/v2/merchants/{merchant_id}/custom-attributes/{key}'
        )
            ->auth('global')
            ->parameters(TemplateParam::init('merchant_id', $merchantId), TemplateParam::init('key', $key));

        $_resHandler = $this->responseHandler()
            ->type(DeleteMerchantCustomAttributeResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Retrieves a [custom attribute]($m/CustomAttribute) associated with a merchant.
     * You can use the `with_definition` query parameter to also retrieve the custom attribute definition
     * in the same call.
     * To retrieve a custom attribute owned by another application, the `visibility` setting must be
     * `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $merchantId The ID of the target [merchant](entity:Merchant).
     * @param string $key The key of the custom attribute to retrieve. This key must match the `key`
     *        of a custom
     *        attribute definition in the Square seller account. If the requesting application is
     *        not the
     *        definition owner, you must use the qualified key.
     * @param bool|null $withDefinition Indicates whether to return the [custom attribute
     *        definition](entity:CustomAttributeDefinition) in the `definition` field of
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
     */
    public function retrieveMerchantCustomAttribute(
        string $merchantId,
        string $key,
        ?bool $withDefinition = false,
        ?int $version = null
    ): ApiResponse {
        $_reqBuilder = $this->requestBuilder(
            RequestMethod::GET,
            '/v2/merchants/{merchant_id}/custom-attributes/{key}'
        )
            ->auth('global')
            ->parameters(
                TemplateParam::init('merchant_id', $merchantId),
                TemplateParam::init('key', $key),
                QueryParam::init('with_definition', $withDefinition),
                QueryParam::init('version', $version)
            );

        $_resHandler = $this->responseHandler()
            ->type(RetrieveMerchantCustomAttributeResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Creates or updates a [custom attribute]($m/CustomAttribute) for a merchant.
     * Use this endpoint to set the value of a custom attribute for a specified merchant.
     * A custom attribute is based on a custom attribute definition in a Square seller account, which
     * is created using the
     * [CreateMerchantCustomAttributeDefinition]($e/MerchantCustomAttributes/CreateMerchantCustomAttributeD
     * efinition) endpoint.
     * To create or update a custom attribute owned by another application, the `visibility` setting
     * must be `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param string $merchantId The ID of the target [merchant](entity:Merchant).
     * @param string $key The key of the custom attribute to create or update. This key must match
     *        the `key` of a
     *        custom attribute definition in the Square seller account. If the requesting
     *        application is not
     *        the definition owner, you must use the qualified key.
     * @param UpsertMerchantCustomAttributeRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     */
    public function upsertMerchantCustomAttribute(
        string $merchantId,
        string $key,
        UpsertMerchantCustomAttributeRequest $body
    ): ApiResponse {
        $_reqBuilder = $this->requestBuilder(
            RequestMethod::POST,
            '/v2/merchants/{merchant_id}/custom-attributes/{key}'
        )
            ->auth('global')
            ->parameters(
                TemplateParam::init('merchant_id', $merchantId),
                TemplateParam::init('key', $key),
                HeaderParam::init('Content-Type', 'application/json'),
                BodyParam::init($body)
            );

        $_resHandler = $this->responseHandler()
            ->type(UpsertMerchantCustomAttributeResponse::class)
            ->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }
}
