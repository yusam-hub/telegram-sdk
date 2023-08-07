<?php

namespace YusamHub\TelegramSdk\Helpers;

class ReplyMarkupHelper
{
    public static function keyboardButtonRequestContact(string $buttonText): string
    {
        return json_encode([
            'keyboard' => [
                [
                    [
                        'text' => $buttonText,
                        'request_contact' => true,
                    ]
                ]
            ]
        ]);
    }
    public static function keyboardRemove(): string
    {
        return json_encode([
            'remove_keyboard' => true
        ]);
    }

}