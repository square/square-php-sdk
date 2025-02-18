<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class DismissTerminalActionResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?TerminalAction $action Current state of the action to be dismissed.
     */
    #[JsonProperty('action')]
    private ?TerminalAction $action;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   action?: ?TerminalAction,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->action = $values['action'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?TerminalAction
     */
    public function getAction(): ?TerminalAction
    {
        return $this->action;
    }

    /**
     * @param ?TerminalAction $value
     */
    public function setAction(?TerminalAction $value = null): self
    {
        $this->action = $value;
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
