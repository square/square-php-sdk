<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalActionUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?TerminalAction $action The updated terminal action.
     */
    #[JsonProperty('action')]
    private ?TerminalAction $action;

    /**
     * @param array{
     *   action?: ?TerminalAction,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
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
