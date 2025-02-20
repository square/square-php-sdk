<?php

namespace Square\Exceptions;

use Square\Types\Error;
use Square\Types\ErrorCategory;
use Square\Types\ErrorCode;
use Throwable;

/**
 * This exception type will be thrown for any non-2XX API responses.
 */
class SquareApiException extends SquareException
{
    /**
     * @var int
     */
    private int $statusCode;

    /**
     * @var mixed $body
     */
    private mixed $body;

    /**
     * @var Error[]
     */
    private array $errors;

    /**
     * @param string $message
     * @param int $statusCode
     * @param mixed $body
     * @param ?Throwable $previous
     */
    public function __construct(
        string     $message,
        int        $statusCode,
        mixed      $body,
        ?Throwable $previous = null,)
    {
        parent::__construct(
            $this->buildMessage(
                $message,
                $statusCode,
                $body
            ),
            $statusCode,
            $previous
        );
        $this->statusCode = $statusCode;
        $this->body = $body;
        $this->errors = $this->parseErrors($body);
    }

    private function buildMessage(string $message, int $statusCode, mixed $body): string
    {
        $message = "$message\nStatus code: $statusCode";

        if($body == null || $body == '') {
            return $message;
        }

        if(is_string($body)) {
            return "$message\nBody: $body";
        }

        return "$message\nBody: " . json_encode($body, JSON_PRETTY_PRINT);
    }

    /**
     * @param mixed $body
     * @return Error[]
     */
    private function parseErrors(mixed $body): array
    {
        /** @var array{
         *   category: value-of<ErrorCategory>,
         *   code: value-of<ErrorCode>,
         * } $fallbackError
         */
        $fallbackError = [
            'category' => 'API_ERROR',
            'code' => 'Unknown',
        ];

        if($body === null) {
            return [new Error($fallbackError)];
        }
        if (is_string($body)) {
            $body = json_decode($body, true);
        }
        if(is_object($body)) {
            $jsonOrFalse = json_encode($body);
            if($jsonOrFalse === false) {
                return [new Error($fallbackError)];
            }
            $body = json_decode($jsonOrFalse, true);
        }
        if (is_array($body)){
            if(array_key_exists('errors', $body)) {
                $errors = $body['errors'];
                if(!is_array($errors)) {
                    return [new Error($fallbackError)];
                }
                return array_map(fn($error) => new Error($error), $errors);
            }
            else{
                return [new Error([
                    'category' => 'API_ERROR',
                    'code' => $body["type"] ?? 'Unknown',
                    'detail' => $body["message"] ?? null,
                    'field' => $body["field"] ?? null,
                ])];
            }
        }

        return [new Error($fallbackError)];
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return mixed
     */
    public function getBody(): mixed
    {
        return $this->body;
    }

    /**
     * @return Error[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}