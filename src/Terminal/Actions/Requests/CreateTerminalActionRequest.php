<?php

namespace Square\Terminal\Actions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\TerminalAction;

class CreateTerminalActionRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this `CreateAction` request. Keys can be any valid string
     * but must be unique for every `CreateAction` request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) for more
     * information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var TerminalAction $action The Action to create.
     */
    #[JsonProperty('action')]
    private TerminalAction $action;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   action: TerminalAction,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->action = $values['action'];
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return TerminalAction
     */
    public function getAction(): TerminalAction
    {
        return $this->action;
    }

    /**
     * @param TerminalAction $value
     */
    public function setAction(TerminalAction $value): self
    {
        $this->action = $value;
        return $this;
    }
}
