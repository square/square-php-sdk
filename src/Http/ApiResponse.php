<?php

declare(strict_types=1);

namespace Square\Http;

/**
 * Holds the result of an API call.
 */
class ApiResponse
{
    /**
     * @var HttpRequest
     */
    private $request;

    /**
     * @var int|null
     */
    private $statusCode = null;

    /**
     * @var string|null
     */
    private $reasonPhrase = null;

    /**
     * @var array|null
     */
    private $headers = null;

    /**
     * @var mixed
     */
    private $result = null;

    /**
     * @var mixed
     */
    private $body = null;

    /**
     * @var \Square\Models\Error[]
     */
    private $errors = null;

    /**
     * @var mixed
     */
    private $cursor = null;

    /**
     * Create a new instance of this class with the given context and result.
     *
     * @param mixed $result Deserialized result from the response
     * @param HttpContext $context Http context
     */
    public static function createFromContext($decodedBody, $result, HttpContext $context): self
    {
        $request = $context->getRequest();
        $statusCode = $context->getResponse()->getStatusCode();
        $reasonPhrase = null; // TODO
        $headers = $context->getResponse()->getHeaders();
        $body = $context->getResponse()->getRawBody();

        if (!\is_array($decodedBody)) {
            $decodedBody = (array) $decodedBody;
        }

        $cursor = $decodedBody['cursor'] ?? null;
        $errors = [];

        if ($statusCode >= 400 && $statusCode < 600) {
            if (isset($decodedBody['errors'])) {
                $mapper = new \apimatic\jsonmapper\JsonMapper();
                $errors = $mapper->mapClassArray($decodedBody['errors'], '\\Square\\Models\\Error');
            } else {
                $error = new \Square\Models\Error('V1_ERROR', $decodedBody['type'] ?? 'Unknown');
                $error->setDetail($decodedBody['message'] ?? null);
                $error->setField($decodedBody['field'] ?? null);
                $errors = [$error];
            }
        }

        return new self($request, $statusCode, $reasonPhrase, $headers, $result, $body, $errors, $cursor);
    }

    /**
     * @param HttpRequest $request
     * @param int|null $statusCode
     * @param string|null $reasonPhrase
     * @param array|null $headers
     * @param mixed $result
     * @param mixed $body
     * @param \Square\Models\Error[] $errors
     * @param mixed $cursor
     */
    public function __construct(
        HttpRequest $request,
        ?int $statusCode,
        ?string $reasonPhrase,
        ?array $headers,
        $result,
        $body,
        array $errors,
        $cursor
    ) {
        $this->request = $request;
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        $this->headers = $headers;
        $this->result = $result;
        $this->body = $body;
        $this->errors = $errors;
        $this->cursor = $cursor;
    }

    /**
     * Returns the original request that resulted in this response.
     */
    public function getRequest(): HttpRequest
    {
        return $this->request;
    }

    /**
     * Returns the response status code.
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * Returns the HTTP reason phrase from the response.
     */
    public function getReasonPhrase(): ?string
    {
        return $this->reasonPhrase;
    }

    /**
     * Returns the response headers.
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * Returns the response data.
     *
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Returns the original body from the response.
     *
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Returns the errors if any.
     *
     * @return \Square\Models\Error[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Returns the pagination cursor.
     *
     * @return mixed
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Is response OK?
     */
    public function isSuccess(): bool
    {
        return isset($this->statusCode) && $this->statusCode >= 200 && $this->statusCode < 300;
    }

    /**
     * Is response missing or not OK?
     */
    public function isError(): bool
    {
        return !$this->isSuccess();
    }
}
