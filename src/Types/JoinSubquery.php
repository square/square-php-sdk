<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class JoinSubquery extends JsonSerializableType
{
    /**
     * @var string $sql
     */
    #[JsonProperty('sql')]
    private string $sql;

    /**
     * @var string $on
     */
    #[JsonProperty('on')]
    private string $on;

    /**
     * @var string $joinType
     */
    #[JsonProperty('joinType')]
    private string $joinType;

    /**
     * @var string $alias
     */
    #[JsonProperty('alias')]
    private string $alias;

    /**
     * @param array{
     *   sql: string,
     *   on: string,
     *   joinType: string,
     *   alias: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sql = $values['sql'];
        $this->on = $values['on'];
        $this->joinType = $values['joinType'];
        $this->alias = $values['alias'];
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return $this->sql;
    }

    /**
     * @param string $value
     */
    public function setSql(string $value): self
    {
        $this->sql = $value;
        $this->_setField('sql');
        return $this;
    }

    /**
     * @return string
     */
    public function getOn(): string
    {
        return $this->on;
    }

    /**
     * @param string $value
     */
    public function setOn(string $value): self
    {
        $this->on = $value;
        $this->_setField('on');
        return $this;
    }

    /**
     * @return string
     */
    public function getJoinType(): string
    {
        return $this->joinType;
    }

    /**
     * @param string $value
     */
    public function setJoinType(string $value): self
    {
        $this->joinType = $value;
        $this->_setField('joinType');
        return $this;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $value
     */
    public function setAlias(string $value): self
    {
        $this->alias = $value;
        $this->_setField('alias');
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
