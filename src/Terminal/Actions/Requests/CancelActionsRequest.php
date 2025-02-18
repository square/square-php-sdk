<?php

namespace Square\Terminal\Actions\Requests;

use Square\Core\Json\JsonSerializableType;

class CancelActionsRequest extends JsonSerializableType
{
    /**
     * @var string $actionId Unique ID for the desired `TerminalAction`.
     */
    private string $actionId;

    /**
     * @param array{
     *   actionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->actionId = $values['actionId'];
    }

    /**
     * @return string
     */
    public function getActionId(): string
    {
        return $this->actionId;
    }

    /**
     * @param string $value
     */
    public function setActionId(string $value): self
    {
        $this->actionId = $value;
        return $this;
    }
}
