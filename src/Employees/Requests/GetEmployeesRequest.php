<?php

namespace Square\Employees\Requests;

use Square\Core\Json\JsonSerializableType;

class GetEmployeesRequest extends JsonSerializableType
{
    /**
     * @var string $id UUID for the employee that was requested.
     */
    private string $id;

    /**
     * @param array{
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }
}
