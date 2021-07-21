<?php

declare(strict_types=1);

namespace Square;

use Square\Http\HttpRequest;

/**
 * Utility class for authorization and token management.
 */
class AccessTokenManager implements AuthManagerInterface, AccessTokenCredentials
{
    private $accessToken;

    /**
     * Returns an instance of this class.
     *
     * @param string|null $accessToken The OAuth 2.0 Access Token to use for API requests.
     */
    public function __construct(?string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * String value for accessToken.
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string|null $accessToken The OAuth 2.0 Access Token to use for API requests.
     */
    public function equals(?string $accessToken): bool
    {
        return $accessToken == $this->getAccessToken();
    }

    /**
     * Adds authentication to the given HttpRequest.
     */
    public function apply(HttpRequest $httpRequest)
    {
        $httpRequest->addHeader('Authorization', 'Bearer ' . $this->accessToken);
    }
}
