
# V1 Fee

V1Fee

## Structure

`V1Fee`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The fee's unique ID. | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The fee's name. | getName(): ?string | setName(?string name): void |
| `rate` | `?string` | Optional | The rate of the fee, as a string representation of a decimal number. A value of 0.07 corresponds to a rate of 7%. | getRate(): ?string | setRate(?string rate): void |
| `calculationPhase` | [`?string (V1FeeCalculationPhase)`](/doc/models/v1-fee-calculation-phase.md) | Optional | - | getCalculationPhase(): ?string | setCalculationPhase(?string calculationPhase): void |
| `adjustmentType` | [`?string (V1FeeAdjustmentType)`](/doc/models/v1-fee-adjustment-type.md) | Optional | - | getAdjustmentType(): ?string | setAdjustmentType(?string adjustmentType): void |
| `appliesToCustomAmounts` | `?bool` | Optional | If true, the fee applies to custom amounts entered into Square Point of Sale that are not associated with a particular item. | getAppliesToCustomAmounts(): ?bool | setAppliesToCustomAmounts(?bool appliesToCustomAmounts): void |
| `enabled` | `?bool` | Optional | If true, the fee is applied to all appropriate items. If false, the fee is not applied at all. | getEnabled(): ?bool | setEnabled(?bool enabled): void |
| `inclusionType` | [`?string (V1FeeInclusionType)`](/doc/models/v1-fee-inclusion-type.md) | Optional | - | getInclusionType(): ?string | setInclusionType(?string inclusionType): void |
| `type` | [`?string (V1FeeType)`](/doc/models/v1-fee-type.md) | Optional | - | getType(): ?string | setType(?string type): void |
| `v2Id` | `?string` | Optional | The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations share the same v2 ID. | getV2Id(): ?string | setV2Id(?string v2Id): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "rate": "rate0",
  "calculation_phase": "FEE_TOTAL_PHASE",
  "adjustment_type": "TAX"
}
```

