<?php

namespace Square\Tests\Core\Json;

use PHPUnit\Framework\TestCase;
use Square\Core\Json\JsonEncoder;
use Square\Core\Json\JsonProperty;
use Square\Core\Json\JsonSerializableType;
use Square\Core\Types\ArrayType;
use Square\Core\Types\Union;

class NullableArray extends JsonSerializableType
{
    /**
     * @var array<string|null> $nullableStringArray
     */
    #[ArrayType([new Union('string', 'null')])]
    #[JsonProperty('nullable_string_array')]
    public array $nullableStringArray;

    /**
     * @param array{
     *   nullableStringArray: array<string|null>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->nullableStringArray = $values['nullableStringArray'];
    }
}

class NullableArrayTest extends TestCase
{
    public function testNullableArray(): void
    {
        $expectedJson = JsonEncoder::encode(
            [
                'nullable_string_array' => ['one', null, 'three']
            ],
        );

        $object = NullableArray::fromJson($expectedJson);
        $this->assertEquals(['one', null, 'three'], $object->nullableStringArray, 'nullable_string_array should match the original data.');

        $actualJson = $object->toJson();
        $this->assertJsonStringEqualsJsonString($expectedJson, $actualJson, 'Serialized JSON does not match original JSON for nullable_string_array.');
    }
}
