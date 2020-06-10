<?php

declare(strict_types=1);

namespace Square\Http;

/**
 * HttpCallBack allows defining callables for pre and post API calls.
 */
class HttpCallBack
{
    /**
     * Callable for on-before event of API calls
     *
     * @var callable
     */
    private $onBeforeRequest = null;

    /**
     * Callable for on-after event of API calls
     *
     * @var callable
     */
    private $onAfterRequest = null;

    /**
     * Create a new HttpCallBack instance
     *
     * @param callable|null $onBeforeRequest Called before an API call
     * @param callable|null $onAfterRequest  Called after an API call
     */
    public function __construct(callable $onBeforeRequest = null, callable $onAfterRequest = null)
    {
        $this->onBeforeRequest = $onBeforeRequest;
        $this->onAfterRequest = $onAfterRequest;
    }

    /**
     * Set on-before event callback
     *
     * @param callable $func On-before event callable
     */
    public function setOnBeforeRequest(callable $func): void
    {
        $this->onBeforeRequest = $func;
    }

    /**
     * Get On-before API call event callable
     *
     * @return callable Callable
     */
    public function getOnBeforeRequest(): callable
    {
        return $this->onBeforeRequest;
    }

    /**
     * Set On-after API call event callable
     *
     * @param callable $func On-after event callable
     */
    public function setOnAfterRequest(callable $func): void
    {
        $this->onAfterRequest = $func;
    }

    /**
     * Get On-After API call event callable
     *
     * @return callable On-after event callable
     */
    public function getOnAfterRequest(): callable
    {
        return $this->onAfterRequest;
    }

    /**
     * Call on-before event callable
     *
     * @param HttpRequest $httpRequest HttpRequest for this call
     */
    public function callOnBeforeRequest(HttpRequest $httpRequest): void
    {
        if ($this->onBeforeRequest != null) {
            call_user_func($this->onBeforeRequest, $httpRequest);
        }
    }

    /**
     * Call on-after event callable
     *
     * @param HttpContext $httpContext HttpRequest for this call
     */
    public function callOnAfterRequest(HttpContext $httpContext): void
    {
        if ($this->onAfterRequest != null) {
            call_user_func($this->onAfterRequest, $httpContext);
        }
    }
}
