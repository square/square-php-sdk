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

class OAuthApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * `RenewToken` is deprecated. For information about refreshing OAuth access tokens, see
     * [Migrate from Renew to Refresh OAuth Tokens](https://developer.squareup.com/docs/oauth-api/migrate-
     * to-refresh-tokens).
     *
     *
     * Renews an OAuth access token before it expires.
     *
     * OAuth access tokens besides your application's personal access token expire after __30 days__.
     * You can also renew expired tokens within __15 days__ of their expiration.
     * You cannot renew an access token that has been expired for more than 15 days.
     * Instead, the associated user must re-complete the OAuth flow from the beginning.
     *
     * __Important:__ The `Authorization` header for this endpoint must have the
     * following format:
     *
     * ```
     * Authorization: Client APPLICATION_SECRET
     * ```
     *
     * Replace `APPLICATION_SECRET` with the application secret on the Credentials
     * page in the [developer dashboard](https://developer.squareup.com/apps).
     *
     * @deprecated
     *
     * @param string $clientId Your application ID, available from the [developer
     *        dashboard](https://developer.squareup.com/apps).
     * @param \Square\Models\RenewTokenRequest $body An object containing the fields to POST for the
     *        request.
     *
     *        See the corresponding object definition for field details.
     * @param string $authorization Client APPLICATION_SECRET
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function renewToken(
        string $clientId,
        \Square\Models\RenewTokenRequest $body,
        string $authorization
    ): ApiResponse {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/oauth2/clients/{client_id}/access-token/renew';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'client_id'     => $clientId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization'   => $authorization
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\RenewTokenResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Revokes an access token generated with the OAuth flow.
     *
     * If an account has more than one OAuth access token for your application, this
     * endpoint revokes all of them, regardless of which token you specify. When an
     * OAuth access token is revoked, all of the active subscriptions associated
     * with that OAuth token are canceled immediately.
     *
     * __Important:__ The `Authorization` header for this endpoint must have the
     * following format:
     *
     * ```
     * Authorization: Client APPLICATION_SECRET
     * ```
     *
     * Replace `APPLICATION_SECRET` with the application secret on the OAuth
     * page in the [developer dashboard](https://developer.squareup.com/apps).
     *
     * @param \Square\Models\RevokeTokenRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     * @param string $authorization Client APPLICATION_SECRET
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function revokeToken(\Square\Models\RevokeTokenRequest $body, string $authorization): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/oauth2/revoke';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization'   => $authorization
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\RevokeTokenResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Returns an OAuth access token.
     *
     * The endpoint supports distinct methods of obtaining OAuth access tokens.
     * Applications specify a method by adding the `grant_type` parameter
     * in the request and also provide relevant information.
     *
     * __Note:__ Regardless of the method application specified,
     * the endpoint always returns two items; an OAuth access token and
     * a refresh token in the response.
     *
     * __OAuth tokens should only live on secure servers. Application clients
     * should never interact directly with OAuth tokens__.
     *
     * @param \Square\Models\ObtainTokenRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function obtainToken(\Square\Models\ObtainTokenRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/oauth2/token';

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\ObtainTokenResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
