<?php

namespace Square\Channels\Requests;

use Square\Core\Json\JsonSerializableType;

class GetChannelsRequest extends JsonSerializableType
{
    /**
     * @var string $channelId A channel id
     */
    private string $channelId;

    /**
     * @param array{
     *   channelId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->channelId = $values['channelId'];
    }

    /**
     * @return string
     */
    public function getChannelId(): string
    {
        return $this->channelId;
    }

    /**
     * @param string $value
     */
    public function setChannelId(string $value): self
    {
        $this->channelId = $value;
        return $this;
    }
}
