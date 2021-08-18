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

class V1EmployeesApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * Provides summary information for all of a business's employees.
     *
     * @param string|null $order The order in which employees are listed in the response, based on
     *        their created_at field.      Default value: ASC
     * @param string|null $beginUpdatedAt If filtering results by their updated_at field, the
     *        beginning of the requested reporting period, in ISO 8601 format
     * @param string|null $endUpdatedAt If filtering results by there updated_at field, the end of
     *        the requested reporting period, in ISO 8601 format.
     * @param string|null $beginCreatedAt If filtering results by their created_at field, the
     *        beginning of the requested reporting period, in ISO 8601 format.
     * @param string|null $endCreatedAt If filtering results by their created_at field, the end of
     *        the requested reporting period, in ISO 8601 format.
     * @param string|null $status If provided, the endpoint returns only employee entities with the
     *        specified status (ACTIVE or INACTIVE).
     * @param string|null $externalId If provided, the endpoint returns only employee entities with
     *        the specified external_id.
     * @param int|null $limit The maximum integer number of employee entities to return in a single
     *        response. Default 100, maximum 200.
     * @param string|null $batchToken A pagination cursor to retrieve the next set of results for
     *        your
     *        original query to the endpoint.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listEmployees(
        ?string $order = null,
        ?string $beginUpdatedAt = null,
        ?string $endUpdatedAt = null,
        ?string $beginCreatedAt = null,
        ?string $endCreatedAt = null,
        ?string $status = null,
        ?string $externalId = null,
        ?int $limit = null,
        ?string $batchToken = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryBuilder = '/v1/me/employees';

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'order'            => $order,
            'begin_updated_at' => $beginUpdatedAt,
            'end_updated_at'   => $endUpdatedAt,
            'begin_created_at' => $beginCreatedAt,
            'end_created_at'   => $endCreatedAt,
            'status'           => $status,
            'external_id'      => $externalId,
            'limit'            => $limit,
            'batch_token'      => $batchToken,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'     => BaseApi::USER_AGENT,
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
        $deserializedResponse = $mapper->mapClassArray($response->body, 'Square\\Models\\V1Employee');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Use the CreateEmployee endpoint to add an employee to a Square
     * account. Employees created with the Connect API have an initial status
     * of `INACTIVE`. Inactive employees cannot sign in to Square Point of Sale
     * until they are activated from the Square Dashboard. Employee status
     * cannot be changed with the Connect API.
     *
     * Employee entities cannot be deleted. To disable employee profiles,
     * set the employee's status to <code>INACTIVE</code>
     *
     * @param \Square\Models\V1Employee $body An object containing the fields to POST for the
     *        request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createEmployee(\Square\Models\V1Employee $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v1/me/employees';

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\V1Employee');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides the details for a single employee.
     *
     * @param string $employeeId The employee's ID.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrieveEmployee(string $employeeId): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v1/me/employees/{employee_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'employee_id' => $employeeId,
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\V1Employee');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * UpdateEmployee
     *
     * @param string $employeeId The ID of the role to modify.
     * @param \Square\Models\V1Employee $body An object containing the fields to POST for the
     *        request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateEmployee(string $employeeId, \Square\Models\V1Employee $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v1/me/employees/{employee_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'employee_id' => $employeeId,
        ]);

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

        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\V1Employee');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides summary information for all of a business's employee roles.
     *
     * @param string|null $order The order in which employees are listed in the response, based on
     *        their created_at field.Default value: ASC
     * @param int|null $limit The maximum integer number of employee entities to return in a single
     *        response. Default 100, maximum 200.
     * @param string|null $batchToken A pagination cursor to retrieve the next set of results for
     *        your
     *        original query to the endpoint.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listEmployeeRoles(
        ?string $order = null,
        ?int $limit = null,
        ?string $batchToken = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryBuilder = '/v1/me/roles';

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'order'       => $order,
            'limit'       => $limit,
            'batch_token' => $batchToken,
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
        $deserializedResponse = $mapper->mapClassArray($response->body, 'Square\\Models\\V1EmployeeRole');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates an employee role you can then assign to employees.
     *
     * Square accounts can include any number of roles that can be assigned to
     * employees. These roles define the actions and permissions granted to an
     * employee with that role. For example, an employee with a "Shift Manager"
     * role might be able to issue refunds in Square Point of Sale, whereas an
     * employee with a "Clerk" role might not.
     *
     * Roles are assigned with the [V1UpdateEmployee]($e/V1Employees/UpdateEmployeeRole)
     * endpoint. An employee can have only one role at a time.
     *
     * If an employee has no role, they have none of the permissions associated
     * with roles. All employees can accept payments with Square Point of Sale.
     *
     * @param \Square\Models\V1EmployeeRole $body An EmployeeRole object with a name and
     *        permissions, and an optional owner flag.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createEmployeeRole(\Square\Models\V1EmployeeRole $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v1/me/roles';

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\V1EmployeeRole');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides the details for a single employee role.
     *
     * @param string $roleId The role's ID.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrieveEmployeeRole(string $roleId): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v1/me/roles/{role_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'role_id' => $roleId,
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\V1EmployeeRole');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Modifies the details of an employee role.
     *
     * @param string $roleId The ID of the role to modify.
     * @param \Square\Models\V1EmployeeRole $body An object containing the fields to POST for the
     *        request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateEmployeeRole(string $roleId, \Square\Models\V1EmployeeRole $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v1/me/roles/{role_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'role_id' => $roleId,
        ]);

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

        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\V1EmployeeRole');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
