<?php

namespace YusamHub\TelegramSdk;

class TelegramAuth
{
    /**
     * @param string $telegramLogin
     * @param string $returnUrl
     * @return string
     */
    public static function getHtmlScriptAuthTelegramWidget(string $telegramLogin, string $returnUrl): string
    {
        $script = strtr('<script async src="https://telegram.org/js/telegram-widget.js?22" data-telegram-login=":telegramLogin" data-size="large" data-userpic="false" data-auth-url=":returnUrl" data-request-access="write"></script>',[
            ':telegramLogin' => $telegramLogin,
            ':returnUrl' => $returnUrl,
        ]);

        return strtr('<html><head><title>Authorize</title><head><body>:script</body></html>',[
            ':script' => $script,
        ]);
    }

    /**
     * @param string $token
     * @param array $authData
     * @return array
     * @throws \Exception
     */
    public static function getIncomingTelegramAuthDataOrFail(string $token, array $authData): array
    {
        $check_hash = $authData['hash'];
        unset($authData['hash']);
        $data_check_arr = [];
        foreach ($authData as $key => $value) {
            $data_check_arr[] = $key . '=' . $value;
        }
        sort($data_check_arr);
        $data_check_string = implode("\n", $data_check_arr);
        $secret_key = hash('sha256', $token, true);
        $hash = hash_hmac('sha256', $data_check_string, $secret_key);
        if (strcmp($hash, $check_hash) !== 0) {
            throw new \Exception('Data is NOT from Telegram');
        }
        if ((time() - $authData['auth_date']) > 86400) {
            throw new \Exception('Data is outdated');
        }
        return $authData;
    }
}