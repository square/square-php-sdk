<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;
use Square\Core\Types\Union;

class Measure extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $shortTitle
     */
    #[JsonProperty('shortTitle')]
    private ?string $shortTitle;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?string $aggType
     */
    #[JsonProperty('aggType')]
    private ?string $aggType;

    /**
     * @var ?array<string, mixed> $meta
     */
    #[JsonProperty('meta'), ArrayType(['string' => 'mixed'])]
    private ?array $meta;

    /**
     * @var (
     *    value-of<SimpleFormat>
     *   |LinkFormat
     *   |CustomTimeFormat
     *   |CustomNumericFormat
     * )|null $format
     */
    #[JsonProperty('format'), Union('string', LinkFormat::class, CustomTimeFormat::class, CustomNumericFormat::class, 'null')]
    private string|LinkFormat|CustomTimeFormat|CustomNumericFormat|null $format;

    /**
     * @var ?FormatDescription $formatDescription
     */
    #[JsonProperty('formatDescription')]
    private ?FormatDescription $formatDescription;

    /**
     * @var ?string $currency ISO 4217 currency code in uppercase (3 characters, e.g. USD, EUR)
     */
    #[JsonProperty('currency')]
    private ?string $currency;

    /**
     * @var ?string $aliasMember When measure is defined in View, it keeps the original path: Cube.measure
     */
    #[JsonProperty('aliasMember')]
    private ?string $aliasMember;

    /**
     * @param array{
     *   name: string,
     *   type: string,
     *   title?: ?string,
     *   shortTitle?: ?string,
     *   description?: ?string,
     *   aggType?: ?string,
     *   meta?: ?array<string, mixed>,
     *   format?: (
     *    value-of<SimpleFormat>
     *   |LinkFormat
     *   |CustomTimeFormat
     *   |CustomNumericFormat
     * )|null,
     *   formatDescription?: ?FormatDescription,
     *   currency?: ?string,
     *   aliasMember?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->title = $values['title'] ?? null;
        $this->shortTitle = $values['shortTitle'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->type = $values['type'];
        $this->aggType = $values['aggType'] ?? null;
        $this->meta = $values['meta'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->formatDescription = $values['formatDescription'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->aliasMember = $values['aliasMember'] ?? null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        $this->_setField('name');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        $this->_setField('title');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getShortTitle(): ?string
    {
        return $this->shortTitle;
    }

    /**
     * @param ?string $value
     */
    public function setShortTitle(?string $value = null): self
    {
        $this->shortTitle = $value;
        $this->_setField('shortTitle');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        $this->_setField('description');
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        $this->_setField('type');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAggType(): ?string
    {
        return $this->aggType;
    }

    /**
     * @param ?string $value
     */
    public function setAggType(?string $value = null): self
    {
        $this->aggType = $value;
        $this->_setField('aggType');
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getMeta(): ?array
    {
        return $this->meta;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setMeta(?array $value = null): self
    {
        $this->meta = $value;
        $this->_setField('meta');
        return $this;
    }

    /**
     * @return (
     *    value-of<SimpleFormat>
     *   |LinkFormat
     *   |CustomTimeFormat
     *   |CustomNumericFormat
     * )|null
     */
    public function getFormat(): string|LinkFormat|CustomTimeFormat|CustomNumericFormat|null
    {
        return $this->format;
    }

    /**
     * @param (
     *    value-of<SimpleFormat>
     *   |LinkFormat
     *   |CustomTimeFormat
     *   |CustomNumericFormat
     * )|null $value
     */
    public function setFormat(string|LinkFormat|CustomTimeFormat|CustomNumericFormat|null $value = null): self
    {
        $this->format = $value;
        $this->_setField('format');
        return $this;
    }

    /**
     * @return ?FormatDescription
     */
    public function getFormatDescription(): ?FormatDescription
    {
        return $this->formatDescription;
    }

    /**
     * @param ?FormatDescription $value
     */
    public function setFormatDescription(?FormatDescription $value = null): self
    {
        $this->formatDescription = $value;
        $this->_setField('formatDescription');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param ?string $value
     */
    public function setCurrency(?string $value = null): self
    {
        $this->currency = $value;
        $this->_setField('currency');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAliasMember(): ?string
    {
        return $this->aliasMember;
    }

    /**
     * @param ?string $value
     */
    public function setAliasMember(?string $value = null): self
    {
        $this->aliasMember = $value;
        $this->_setField('aliasMember');
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
