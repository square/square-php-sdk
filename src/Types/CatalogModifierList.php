<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A container for a list of modifiers, or a text-based modifier.
 * For text-based modifiers, this represents text configuration for an item. (For example, custom text to print on a t-shirt).
 * For non text-based modifiers, this represents a list of modifiers that can be applied to items at the time of sale.
 * (For example, a list of condiments for a hot dog, or a list of ice cream flavors).
 * Each element of the modifier list is a `CatalogObject` instance of the `MODIFIER` type.
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
     * __Deprecated__: Indicates whether a single (`SINGLE`) modifier or multiple (`MULTIPLE`) modifiers can be selected. Use
     * `min_selected_modifiers` and `max_selected_modifiers` instead.
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
     * @var ?bool $allowQuantities When `true`, allows multiple quantities of the same modifier to be selected.
     */
    #[JsonProperty('allow_quantities')]
    private ?bool $allowQuantities;

    /**
     * @var ?bool $isConversational True if modifiers belonging to this list can be used conversationally.
     */
    #[JsonProperty('is_conversational')]
    private ?bool $isConversational;

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
     * The minimum number of modifiers that must be selected from this list. The value can be overridden with `CatalogItemModifierListInfo`.
     *
     * Values:
     *
     * - 0: No selection is required.
     * - -1: Default value, the attribute was not set by the client. Treated as no selection required.
     * - &gt;0: The required minimum modifier selections. This can be larger than the total `CatalogModifiers` when `allow_quantities` is enabled.
     * - &lt; -1: Invalid. Treated as no selection required.
     *
     * @var ?int $minSelectedModifiers
     */
    #[JsonProperty('min_selected_modifiers')]
    private ?int $minSelectedModifiers;

    /**
     * The maximum number of modifiers that must be selected from this list. The value can be overridden with `CatalogItemModifierListInfo`.
     *
     * Values:
     *
     * - 0: No maximum limit.
     * - -1: Default value, the attribute was not set by the client. Treated as no maximum limit.
     * - &gt;0: The maximum total modifier selections. This can be larger than the total `CatalogModifiers` when `allow_quantities` is enabled.
     * - &lt; -1: Invalid. Treated as no maximum limit.
     *
     * @var ?int $maxSelectedModifiers
     */
    #[JsonProperty('max_selected_modifiers')]
    private ?int $maxSelectedModifiers;

    /**
     * If `true`, modifiers from this list are hidden from customer receipts. The default value is `false`.
     * This setting can be overridden with `CatalogItemModifierListInfo.hidden_from_customer_override`.
     *
     * @var ?bool $hiddenFromCustomer
     */
    #[JsonProperty('hidden_from_customer')]
    private ?bool $hiddenFromCustomer;

    /**
     * @param array{
     *   name?: ?string,
     *   ordinal?: ?int,
     *   selectionType?: ?value-of<CatalogModifierListSelectionType>,
     *   modifiers?: ?array<CatalogObject>,
     *   imageIds?: ?array<string>,
     *   allowQuantities?: ?bool,
     *   isConversational?: ?bool,
     *   modifierType?: ?value-of<CatalogModifierListModifierType>,
     *   maxLength?: ?int,
     *   textRequired?: ?bool,
     *   internalName?: ?string,
     *   minSelectedModifiers?: ?int,
     *   maxSelectedModifiers?: ?int,
     *   hiddenFromCustomer?: ?bool,
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
        $this->allowQuantities = $values['allowQuantities'] ?? null;
        $this->isConversational = $values['isConversational'] ?? null;
        $this->modifierType = $values['modifierType'] ?? null;
        $this->maxLength = $values['maxLength'] ?? null;
        $this->textRequired = $values['textRequired'] ?? null;
        $this->internalName = $values['internalName'] ?? null;
        $this->minSelectedModifiers = $values['minSelectedModifiers'] ?? null;
        $this->maxSelectedModifiers = $values['maxSelectedModifiers'] ?? null;
        $this->hiddenFromCustomer = $values['hiddenFromCustomer'] ?? null;
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
     * @return ?bool
     */
    public function getAllowQuantities(): ?bool
    {
        return $this->allowQuantities;
    }

    /**
     * @param ?bool $value
     */
    public function setAllowQuantities(?bool $value = null): self
    {
        $this->allowQuantities = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsConversational(): ?bool
    {
        return $this->isConversational;
    }

    /**
     * @param ?bool $value
     */
    public function setIsConversational(?bool $value = null): self
    {
        $this->isConversational = $value;
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
     * @return ?int
     */
    public function getMinSelectedModifiers(): ?int
    {
        return $this->minSelectedModifiers;
    }

    /**
     * @param ?int $value
     */
    public function setMinSelectedModifiers(?int $value = null): self
    {
        $this->minSelectedModifiers = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMaxSelectedModifiers(): ?int
    {
        return $this->maxSelectedModifiers;
    }

    /**
     * @param ?int $value
     */
    public function setMaxSelectedModifiers(?int $value = null): self
    {
        $this->maxSelectedModifiers = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getHiddenFromCustomer(): ?bool
    {
        return $this->hiddenFromCustomer;
    }

    /**
     * @param ?bool $value
     */
    public function setHiddenFromCustomer(?bool $value = null): self
    {
        $this->hiddenFromCustomer = $value;
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
