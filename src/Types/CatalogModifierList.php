<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * For a text-based modifier, this encapsulates the modifier's text when its `modifier_type` is `TEXT`.
 * For example, to sell T-shirts with custom prints, a text-based modifier can be used to capture the buyer-supplied
 * text string to be selected for the T-shirt at the time of sale.
 *
 * For non text-based modifiers, this encapsulates a non-empty list of modifiers applicable to items
 * at the time of sale. Each element of the modifier list is a `CatalogObject` instance of the `MODIFIER` type.
 * For example, a "Condiments" modifier list applicable to a "Hot Dog" item
 * may contain "Ketchup", "Mustard", and "Relish" modifiers.
 *
 * A non text-based modifier can be applied to the modified item once or multiple times, if the `selection_type` field
 * is set to `SINGLE` or `MULTIPLE`, respectively. On the other hand, a text-based modifier can be applied to the item
 * only once and the `selection_type` field is always set to `SINGLE`.
 */
class CatalogModifierList extends JsonSerializableType
{
    /**
     * The name of the `CatalogModifierList` instance. This is a searchable attribute for use in applicable query filters, and its value length is of
     * Unicode code points.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?int $ordinal The position of this `CatalogModifierList` within a list of `CatalogModifierList` instances.
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * Indicates whether a single (`SINGLE`) or multiple (`MULTIPLE`) modifiers from the list
     * can be applied to a single `CatalogItem`.
     *
     * For text-based modifiers, the `selection_type` attribute is always `SINGLE`. The other value is ignored.
     * See [CatalogModifierListSelectionType](#type-catalogmodifierlistselectiontype) for possible values
     *
     * @var ?value-of<CatalogModifierListSelectionType> $selectionType
     */
    #[JsonProperty('selection_type')]
    private ?string $selectionType;

    /**
     * A non-empty list of `CatalogModifier` objects to be included in the `CatalogModifierList`,
     * for non text-based modifiers when the `modifier_type` attribute is `LIST`. Each element of this list
     * is a `CatalogObject` instance of the `MODIFIER` type, containing the following attributes:
     * ```
     * {
     * "id": "{{catalog_modifier_id}}",
     * "type": "MODIFIER",
     * "modifier_data": {{a CatalogModifier instance>}}
     * }
     * ```
     *
     * @var ?array<CatalogObject> $modifiers
     */
    #[JsonProperty('modifiers'), ArrayType([CatalogObject::class])]
    private ?array $modifiers;

    /**
     * The IDs of images associated with this `CatalogModifierList` instance.
     * Currently these images are not displayed on Square products, but may be displayed in 3rd-party applications.
     *
     * @var ?array<string> $imageIds
     */
    #[JsonProperty('image_ids'), ArrayType(['string'])]
    private ?array $imageIds;

    /**
     * The type of the modifier.
     *
     * When this `modifier_type` value is `TEXT`,  the `CatalogModifierList` represents a text-based modifier.
     * When this `modifier_type` value is `LIST`, the `CatalogModifierList` contains a list of `CatalogModifier` objects.
     * See [CatalogModifierListModifierType](#type-catalogmodifierlistmodifiertype) for possible values
     *
     * @var ?value-of<CatalogModifierListModifierType> $modifierType
     */
    #[JsonProperty('modifier_type')]
    private ?string $modifierType;

    /**
     * The maximum length, in Unicode points, of the text string of the text-based modifier as represented by
     * this `CatalogModifierList` object with the `modifier_type` set to `TEXT`.
     *
     * @var ?int $maxLength
     */
    #[JsonProperty('max_length')]
    private ?int $maxLength;

    /**
     * Whether the text string must be a non-empty string (`true`) or not (`false`) for a text-based modifier
     * as represented by this `CatalogModifierList` object with the `modifier_type` set to `TEXT`.
     *
     * @var ?bool $textRequired
     */
    #[JsonProperty('text_required')]
    private ?bool $textRequired;

    /**
     * A note for internal use by the business.
     *
     * For example, for a text-based modifier applied to a T-shirt item, if the buyer-supplied text of "Hello, Kitty!"
     * is to be printed on the T-shirt, this `internal_name` attribute can be "Use italic face" as
     * an instruction for the business to follow.
     *
     * For non text-based modifiers, this `internal_name` attribute can be
     * used to include SKUs, internal codes, or supplemental descriptions for internal use.
     *
     * @var ?string $internalName
     */
    #[JsonProperty('internal_name')]
    private ?string $internalName;

    /**
     * @param array{
     *   name?: ?string,
     *   ordinal?: ?int,
     *   selectionType?: ?value-of<CatalogModifierListSelectionType>,
     *   modifiers?: ?array<CatalogObject>,
     *   imageIds?: ?array<string>,
     *   modifierType?: ?value-of<CatalogModifierListModifierType>,
     *   maxLength?: ?int,
     *   textRequired?: ?bool,
     *   internalName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
        $this->selectionType = $values['selectionType'] ?? null;
        $this->modifiers = $values['modifiers'] ?? null;
        $this->imageIds = $values['imageIds'] ?? null;
        $this->modifierType = $values['modifierType'] ?? null;
        $this->maxLength = $values['maxLength'] ?? null;
        $this->textRequired = $values['textRequired'] ?? null;
        $this->internalName = $values['internalName'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param ?int $value
     */
    public function setOrdinal(?int $value = null): self
    {
        $this->ordinal = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogModifierListSelectionType>
     */
    public function getSelectionType(): ?string
    {
        return $this->selectionType;
    }

    /**
     * @param ?value-of<CatalogModifierListSelectionType> $value
     */
    public function setSelectionType(?string $value = null): self
    {
        $this->selectionType = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getModifiers(): ?array
    {
        return $this->modifiers;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setModifiers(?array $value = null): self
    {
        $this->modifiers = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getImageIds(): ?array
    {
        return $this->imageIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setImageIds(?array $value = null): self
    {
        $this->imageIds = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogModifierListModifierType>
     */
    public function getModifierType(): ?string
    {
        return $this->modifierType;
    }

    /**
     * @param ?value-of<CatalogModifierListModifierType> $value
     */
    public function setModifierType(?string $value = null): self
    {
        $this->modifierType = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMaxLength(): ?int
    {
        return $this->maxLength;
    }

    /**
     * @param ?int $value
     */
    public function setMaxLength(?int $value = null): self
    {
        $this->maxLength = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getTextRequired(): ?bool
    {
        return $this->textRequired;
    }

    /**
     * @param ?bool $value
     */
    public function setTextRequired(?bool $value = null): self
    {
        $this->textRequired = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getInternalName(): ?string
    {
        return $this->internalName;
    }

    /**
     * @param ?string $value
     */
    public function setInternalName(?string $value = null): self
    {
        $this->internalName = $value;
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
