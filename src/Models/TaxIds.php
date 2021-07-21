<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The tax IDs that a Location is operating under.
 */
class TaxIds implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $euVat;

    /**
     * @var string|null
     */
    private $frSiret;

    /**
     * @var string|null
     */
    private $frNaf;

    /**
     * Returns Eu Vat.
     *
     * The EU VAT number for this location. For example, "IE3426675K".
     * If the EU VAT number is present, it is well-formed and has been
     * validated with VIES, the VAT Information Exchange System.
     */
    public function getEuVat(): ?string
    {
        return $this->euVat;
    }

    /**
     * Sets Eu Vat.
     *
     * The EU VAT number for this location. For example, "IE3426675K".
     * If the EU VAT number is present, it is well-formed and has been
     * validated with VIES, the VAT Information Exchange System.
     *
     * @maps eu_vat
     */
    public function setEuVat(?string $euVat): void
    {
        $this->euVat = $euVat;
    }

    /**
     * Returns Fr Siret.
     *
     * The SIRET (Système d'Identification du Répertoire des Entreprises et de leurs Etablissements)
     * number is a 14 digits code issued by the French INSEE. For example, "39922799000021".
     */
    public function getFrSiret(): ?string
    {
        return $this->frSiret;
    }

    /**
     * Sets Fr Siret.
     *
     * The SIRET (Système d'Identification du Répertoire des Entreprises et de leurs Etablissements)
     * number is a 14 digits code issued by the French INSEE. For example, "39922799000021".
     *
     * @maps fr_siret
     */
    public function setFrSiret(?string $frSiret): void
    {
        $this->frSiret = $frSiret;
    }

    /**
     * Returns Fr Naf.
     *
     * The French government uses the NAF (Nomenclature des Activités Françaises) to display and
     * track economic statistical data. This is also called the APE (Activite Principale de l’Entreprise)
     * code.
     * For example, 6910Z.
     */
    public function getFrNaf(): ?string
    {
        return $this->frNaf;
    }

    /**
     * Sets Fr Naf.
     *
     * The French government uses the NAF (Nomenclature des Activités Françaises) to display and
     * track economic statistical data. This is also called the APE (Activite Principale de l’Entreprise)
     * code.
     * For example, 6910Z.
     *
     * @maps fr_naf
     */
    public function setFrNaf(?string $frNaf): void
    {
        $this->frNaf = $frNaf;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->euVat)) {
            $json['eu_vat']   = $this->euVat;
        }
        if (isset($this->frSiret)) {
            $json['fr_siret'] = $this->frSiret;
        }
        if (isset($this->frNaf)) {
            $json['fr_naf']   = $this->frNaf;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
