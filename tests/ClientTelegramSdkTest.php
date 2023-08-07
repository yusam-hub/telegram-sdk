<?php

namespace YusamHub\TelegramSdk\Tests;

use YusamHub\TelegramSdk\ClientTelegramSdk;
use YusamHub\TelegramSdk\Helpers\ReplyMarkupHelper;

class ClientTelegramSdkTest extends \PHPUnit\Framework\TestCase
{
    /*public function test_getMe()
    {
        $clientDemoSdk = new ClientTelegramSdk(Config::getConfig('telegram-test-sdk'));
        $sendMessage = $clientDemoSdk->getMe();
        $this->assertTrue(is_array($sendMessage));
    }*/

    /*public function test_getUpdates()
    {
        $clientDemoSdk = new ClientTelegramSdk(Config::getConfig('telegram-test-sdk'));
        $getUpdates = $clientDemoSdk->getUpdates();
        $this->assertTrue(is_array($getUpdates));
    }*/

    public function test_sendMessage()
    {
        $config = Config::getConfig('telegram-test-sdk');
        $clientDemoSdk = new ClientTelegramSdk();
        $sendMessage = $clientDemoSdk->sendMessage(
            //$config['chatId_1'], //тест
            $config['chatId_2'],//тест рабочий
            __METHOD__,
            //ReplyMarkupHelper::keyboardRemove()
            ReplyMarkupHelper::keyboardButtonRequestContact('Отправить свой номер телефона')
        );
        $this->assertTrue(is_array($sendMessage));
    }
}