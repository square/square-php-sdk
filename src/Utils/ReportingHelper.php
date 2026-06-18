<?php

namespace Square\Utils;

use Square\SquareClient;
use Square\Reporting\Requests\LoadRequest;
use Square\Types\LoadResponse;
use Square\Exceptions\SquareException;
use TypeError;

/**
 * Utility to help with the Square Reporting API.
 * See https://developer.squareup.com/docs/reporting-api/overview for more details.
 *
 * The `/reporting/v1/load` endpoint is asynchronous: a query that is still being
 * computed comes back as an HTTP 200 whose body is `{ "error": "Continue wait" }`
 * rather than the results. Clients are expected to re-send the identical request,
 * with backoff, until real results arrive. {@see ReportingHelper::loadAndWait()}
 * owns that retry loop.
 *
 * Detecting the sentinel: the generated `LoadResponse` fields are all optional, so a
 * "Continue wait" body deserializes successfully — its unmapped `error` key survives
 * as an additional property (and `data` stays `null`). {@see isContinueWait()} treats
 * that preserved `error === "Continue wait"` as the retry signal. Real API / transport
 * failures raise `SquareApiException` / `SquareException` and are left to propagate.
 * (A defensive `TypeError` catch is also kept: should the schema ever reintroduce a
 * non-nullable required field, the sentinel would instead surface as a deserialization
 * `TypeError`, which is likewise swallowed as a retry signal.)
 */
class ReportingHelper
{
    /**
     * Sentinel value returned by the Reporting API on an HTTP 200 while a
     * `/reporting/v1/load` query is still processing. It is NOT an error — the
     * request should be retried.
     */
    private const CONTINUE_WAIT = 'Continue wait';

    /**
     * Runs a reporting query and transparently polls until it resolves, returning
     * the final {@see LoadResponse}. Re-sends the identical request with exponential
     * backoff while the API answers "Continue wait".
     *
     * @param SquareClient $client The configured Square client.
     * @param LoadRequest $request The reporting query (same shape as `reporting->load`).
     * @param ?array{
     *   maxAttempts?: int,
     *   initialDelayMs?: int,
     *   maxDelayMs?: int,
     *   backoffFactor?: float,
     *   shouldCancel?: callable(): bool,
     *   requestOptions?: array{
     *     baseUrl?: string,
     *     maxRetries?: int,
     *     timeout?: float,
     *     headers?: array<string, string>,
     *     queryParameters?: array<string, mixed>,
     *     bodyProperties?: array<string, mixed>,
     *   },
     * } $options Polling/backoff configuration:
     *   - `maxAttempts`    Maximum poll attempts before giving up. Default 20.
     *   - `initialDelayMs` Delay before the first retry, in ms. Default 2000.
     *   - `maxDelayMs`     Upper bound on the backoff delay, in ms. Default 20000.
     *   - `backoffFactor`  Multiplier applied to the delay after each attempt. Default 2.
     *   - `shouldCancel`   Predicate polled before each attempt and during the
     *                      backoff wait; aborts the loop when it returns `true`.
     *   - `requestOptions` Forwarded to each underlying `reporting->load` call.
     * @return LoadResponse The resolved response (never the "Continue wait" sentinel).
     * @throws SquareException If the query does not resolve within `maxAttempts`, or if cancelled.
     */
    public static function loadAndWait(
        SquareClient $client,
        LoadRequest $request = new LoadRequest(),
        ?array $options = null,
    ): LoadResponse {
        $options ??= [];
        $maxAttempts = $options['maxAttempts'] ?? 20;
        $initialDelayMs = $options['initialDelayMs'] ?? 2000;
        $maxDelayMs = $options['maxDelayMs'] ?? 20000;
        $backoffFactor = $options['backoffFactor'] ?? 2;
        $shouldCancel = $options['shouldCancel'] ?? null;
        $requestOptions = $options['requestOptions'] ?? null;

        $delayMs = $initialDelayMs;
        for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
            if ($shouldCancel !== null && $shouldCancel()) {
                throw new SquareException(message: 'Reporting query polling was cancelled.');
            }

            try {
                $response = $client->reporting->load($request, $requestOptions);
                if (!self::isContinueWait($response)) {
                    return $response;
                }
            } catch (TypeError) {
                // Defensive: with the current all-optional LoadResponse schema the
                // "Continue wait" body deserializes cleanly (caught above via
                // isContinueWait), but if a future schema makes a field non-nullable
                // the sentinel would surface as a deserialization TypeError instead.
                // Real API/transport failures raise SquareApiException/SquareException
                // and are intentionally left to propagate.
            }

            if ($attempt === $maxAttempts) {
                break;
            }
            self::sleep($delayMs, $shouldCancel);
            $delayMs = (int) min($delayMs * $backoffFactor, $maxDelayMs);
        }

        throw new SquareException(
            message: sprintf(
                'Reporting query did not complete after %d attempts ("%s").',
                $maxAttempts,
                self::CONTINUE_WAIT,
            ),
        );
    }

    /**
     * Sentinel check: the generated `LoadResponse` has only optional fields, so a
     * "Continue wait" body deserializes successfully with the unmapped `error` field
     * preserved as an additional property (and no `data`). Treat that as a retry
     * signal rather than a result.
     */
    private static function isContinueWait(LoadResponse $response): bool
    {
        return ($response->getAdditionalProperties()['error'] ?? null) === self::CONTINUE_WAIT;
    }

    /**
     * Sleeps for the given number of milliseconds, polling `$shouldCancel` in small
     * slices so cancellation stays responsive during a long backoff wait.
     *
     * @param ?callable(): bool $shouldCancel
     * @throws SquareException If cancelled mid-wait.
     */
    private static function sleep(int $ms, ?callable $shouldCancel): void
    {
        $sliceMs = 100;
        $remaining = $ms;
        while ($remaining > 0) {
            if ($shouldCancel !== null && $shouldCancel()) {
                throw new SquareException(message: 'Reporting query polling was cancelled.');
            }
            $chunk = min($sliceMs, $remaining);
            usleep($chunk * 1000);
            $remaining -= $chunk;
        }
    }
}
