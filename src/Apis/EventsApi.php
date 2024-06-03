<?php

declare(strict_types=1);

namespace Square\Apis;

use Core\Request\Parameters\BodyParam;
use Core\Request\Parameters\HeaderParam;
use Core\Request\Parameters\QueryParam;
use CoreInterfaces\Core\Request\RequestMethod;
use Square\Http\ApiResponse;
use Square\Models\DisableEventsResponse;
use Square\Models\EnableEventsResponse;
use Square\Models\ListEventTypesResponse;
use Square\Models\SearchEventsRequest;
use Square\Models\SearchEventsResponse;

class EventsApi extends BaseApi
{
    /**
     * Search for Square API events that occur within a 28-day timeframe.
     *
     * @param SearchEventsRequest $body An object containing the fields to POST for the request. See
     *        the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     */
    public function searchEvents(SearchEventsRequest $body): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/v2/events')
            ->auth('global')
            ->parameters(HeaderParam::init('Content-Type', 'application/json'), BodyParam::init($body));

        $_resHandler = $this->responseHandler()->type(SearchEventsResponse::class)->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Disables events to prevent them from being searchable.
     * All events are disabled by default. You must enable events to make them searchable.
     * Disabling events for a specific time period prevents them from being searchable, even if you re-
     * enable them later.
     *
     * @return ApiResponse Response from the API call
     */
    public function disableEvents(): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::PUT, '/v2/events/disable')->auth('global');

        $_resHandler = $this->responseHandler()->type(DisableEventsResponse::class)->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Enables events to make them searchable. Only events that occur while in the enabled state are
     * searchable.
     *
     * @return ApiResponse Response from the API call
     */
    public function enableEvents(): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::PUT, '/v2/events/enable')->auth('global');

        $_resHandler = $this->responseHandler()->type(EnableEventsResponse::class)->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Lists all event types that you can subscribe to as webhooks or query using the Events API.
     *
     * @param string|null $apiVersion The API version for which to list event types. Setting this
     *        field overrides the default version used by the application.
     *
     * @return ApiResponse Response from the API call
     */
    public function listEventTypes(?string $apiVersion = null): ApiResponse
    {
        $_reqBuilder = $this->requestBuilder(RequestMethod::GET, '/v2/events/types')
            ->auth('global')
            ->parameters(QueryParam::init('api_version', $apiVersion));

        $_resHandler = $this->responseHandler()->type(ListEventTypesResponse::class)->returnApiResponse();

        return $this->execute($_reqBuilder, $_resHandler);
    }
}
