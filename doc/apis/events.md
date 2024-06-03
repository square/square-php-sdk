# Events

```php
$eventsApi = $client->getEventsApi();
```

## Class Name

`EventsApi`

## Methods

* [Search Events](../../doc/apis/events.md#search-events)
* [Disable Events](../../doc/apis/events.md#disable-events)
* [Enable Events](../../doc/apis/events.md#enable-events)
* [List Event Types](../../doc/apis/events.md#list-event-types)


# Search Events

Search for Square API events that occur within a 28-day timeframe.

```php
function searchEvents(SearchEventsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchEventsRequest`](../../doc/models/search-events-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchEventsResponse`](../../doc/models/search-events-response.md).

## Example Usage

```php
$body = SearchEventsRequestBuilder::init()->build();

$apiResponse = $eventsApi->searchEvents($body);

if ($apiResponse->isSuccess()) {
    $searchEventsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Disable Events

Disables events to prevent them from being searchable.
All events are disabled by default. You must enable events to make them searchable.
Disabling events for a specific time period prevents them from being searchable, even if you re-enable them later.

```php
function disableEvents(): ApiResponse
```

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DisableEventsResponse`](../../doc/models/disable-events-response.md).

## Example Usage

```php
$apiResponse = $eventsApi->disableEvents();

if ($apiResponse->isSuccess()) {
    $disableEventsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Enable Events

Enables events to make them searchable. Only events that occur while in the enabled state are searchable.

```php
function enableEvents(): ApiResponse
```

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`EnableEventsResponse`](../../doc/models/enable-events-response.md).

## Example Usage

```php
$apiResponse = $eventsApi->enableEvents();

if ($apiResponse->isSuccess()) {
    $enableEventsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# List Event Types

Lists all event types that you can subscribe to as webhooks or query using the Events API.

```php
function listEventTypes(?string $apiVersion = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `apiVersion` | `?string` | Query, Optional | The API version for which to list event types. Setting this field overrides the default version used by the application. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListEventTypesResponse`](../../doc/models/list-event-types-response.md).

## Example Usage

```php
$apiResponse = $eventsApi->listEventTypes();

if ($apiResponse->isSuccess()) {
    $listEventTypesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

