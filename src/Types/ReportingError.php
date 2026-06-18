<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Error envelope returned by the Reporting API. Note: a 200 response whose body is `{ "error": "Continue wait" }` is not a failure — it signals that a long-running query is still processing and the request should be retried.
 */
class ReportingError extends JsonSerializableType
{
    /**
     * @var string $error
     */
    #[JsonProperty('error')]
    private string $error;

    /**
     * @param array{
     *   error: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param string $value
     */
    public function setError(string $value): self
    {
        $this->error = $value;
        $this->_setField('error');
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
