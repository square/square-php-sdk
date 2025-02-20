<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class ConfirmationOptions extends JsonSerializableType
{
    /**
     * @var string $title The title text to display in the confirmation screen flow on the Terminal.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var string $body The agreement details to display in the confirmation flow on the Terminal.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var string $agreeButtonText The button text to display indicating the customer agrees to the displayed terms.
     */
    #[JsonProperty('agree_button_text')]
    private string $agreeButtonText;

    /**
     * @var ?string $disagreeButtonText The button text to display indicating the customer does not agree to the displayed terms.
     */
    #[JsonProperty('disagree_button_text')]
    private ?string $disagreeButtonText;

    /**
     * @var ?ConfirmationDecision $decision The result of the buyer’s actions when presented with the confirmation screen.
     */
    #[JsonProperty('decision')]
    private ?ConfirmationDecision $decision;

    /**
     * @param array{
     *   title: string,
     *   body: string,
     *   agreeButtonText: string,
     *   disagreeButtonText?: ?string,
     *   decision?: ?ConfirmationDecision,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->body = $values['body'];
        $this->agreeButtonText = $values['agreeButtonText'];
        $this->disagreeButtonText = $values['disagreeButtonText'] ?? null;
        $this->decision = $values['decision'] ?? null;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $value
     */
    public function setBody(string $value): self
    {
        $this->body = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAgreeButtonText(): string
    {
        return $this->agreeButtonText;
    }

    /**
     * @param string $value
     */
    public function setAgreeButtonText(string $value): self
    {
        $this->agreeButtonText = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDisagreeButtonText(): ?string
    {
        return $this->disagreeButtonText;
    }

    /**
     * @param ?string $value
     */
    public function setDisagreeButtonText(?string $value = null): self
    {
        $this->disagreeButtonText = $value;
        return $this;
    }

    /**
     * @return ?ConfirmationDecision
     */
    public function getDecision(): ?ConfirmationDecision
    {
        return $this->decision;
    }

    /**
     * @param ?ConfirmationDecision $value
     */
    public function setDecision(?ConfirmationDecision $value = null): self
    {
        $this->decision = $value;
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
