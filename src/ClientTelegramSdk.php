<?php

namespace YusamHub\TelegramSdk;

class ClientTelegramSdk extends BaseClientSdk
{
    /**
     * @return array|null
     */
    public function getMe(): ?array
    {
        return $this->doAppRequest(
            $this->api::METHOD_POST,
            '/getMe',
            get_defined_vars()
        );
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param int $timeout
     * @return array|null
     */
    public function getUpdates(int $offset = 0, int $limit = 100, int $timeout = 0): ?array
    {
        return $this->doAppRequest(
            $this->api::METHOD_POST,
            '/getUpdates',
            get_defined_vars()
        );
    }

    /**
     * @param int $chat_id
     * @param string $text
     * @param string|null $reply_markup
     * @return array|null
     */
    public function sendMessage(int $chat_id, string $text, ?string $reply_markup = null): ?array
    {
        return $this->doAppRequest(
            $this->api::METHOD_POST,
            '/sendMessage',
            array_filter(get_defined_vars())
        );
    }

}