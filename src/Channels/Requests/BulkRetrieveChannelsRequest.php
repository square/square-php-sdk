<?php

namespace Square\Channels\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkRetrieveChannelsRequest extends JsonSerializableType
{
    /**
     * @var array<string> $channelIds
     */
    #[JsonProperty('channel_ids'), ArrayType(['string'])]
    private array $channelIds;

    /**
     * @param array{
     *   channelIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->channelIds = $values['channelIds'];
    }

    /**
     * @return array<string>
     */
    public function getChannelIds(): array
    {
        return $this->channelIds;
    }

    /**
     * @param array<string> $value
     */
    public function setChannelIds(array $value): self
    {
        $this->channelIds = $value;
        return $this;
    }
}
