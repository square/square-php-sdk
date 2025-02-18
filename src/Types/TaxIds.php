<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Identifiers for the location used by various governments for tax purposes.
 */
class TaxIds extends JsonSerializableType
{
    /**
     * The EU VAT number for this location. For example, `IE3426675K`.
     * If the EU VAT number is present, it is well-formed and has been
     * validated with VIES, the VAT Information Exchange System.
     *
     * @var ?string $euVat
     */
    #[JsonProperty('eu_vat')]
    private ?string $euVat;

    /**
     * The SIRET (Système d'Identification du Répertoire des Entreprises et de leurs Etablissements)
     * number is a 14-digit code issued by the French INSEE. For example, `39922799000021`.
     *
     * @var ?string $frSiret
     */
    #[JsonProperty('fr_siret')]
    private ?string $frSiret;

    /**
     * The French government uses the NAF (Nomenclature des Activités Françaises) to display and
     * track economic statistical data. This is also called the APE (Activite Principale de l’Entreprise) code.
     * For example, `6910Z`.
     *
     * @var ?string $frNaf
     */
    #[JsonProperty('fr_naf')]
    private ?string $frNaf;

    /**
     * The NIF (Numero de Identificacion Fiscal) number is a nine-character tax identifier used in Spain.
     * If it is present, it has been validated. For example, `73628495A`.
     *
     * @var ?string $esNif
     */
    #[JsonProperty('es_nif')]
    private ?string $esNif;

    /**
     * The QII (Qualified Invoice Issuer) number is a 14-character tax identifier used in Japan.
     * For example, `T1234567890123`.
     *
     * @var ?string $jpQii
     */
    #[JsonProperty('jp_qii')]
    private ?string $jpQii;

    /**
     * @param array{
     *   euVat?: ?string,
     *   frSiret?: ?string,
     *   frNaf?: ?string,
     *   esNif?: ?string,
     *   jpQii?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->euVat = $values['euVat'] ?? null;
        $this->frSiret = $values['frSiret'] ?? null;
        $this->frNaf = $values['frNaf'] ?? null;
        $this->esNif = $values['esNif'] ?? null;
        $this->jpQii = $values['jpQii'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getEuVat(): ?string
    {
        return $this->euVat;
    }

    /**
     * @param ?string $value
     */
    public function setEuVat(?string $value = null): self
    {
        $this->euVat = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFrSiret(): ?string
    {
        return $this->frSiret;
    }

    /**
     * @param ?string $value
     */
    public function setFrSiret(?string $value = null): self
    {
        $this->frSiret = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFrNaf(): ?string
    {
        return $this->frNaf;
    }

    /**
     * @param ?string $value
     */
    public function setFrNaf(?string $value = null): self
    {
        $this->frNaf = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEsNif(): ?string
    {
        return $this->esNif;
    }

    /**
     * @param ?string $value
     */
    public function setEsNif(?string $value = null): self
    {
        $this->esNif = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getJpQii(): ?string
    {
        return $this->jpQii;
    }

    /**
     * @param ?string $value
     */
    public function setJpQii(?string $value = null): self
    {
        $this->jpQii = $value;
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
