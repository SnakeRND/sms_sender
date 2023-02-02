<?php

declare(strict_types=1);

namespace App\Packages\ApiClients\IntellinSms;

use App\Packages\ApiClients\IntellinSms\Responses\SendSmsResponseData;
use App\Packages\Exceptions\SmsSendException;
use Illuminate\Support\Facades\Http;

class SmsSender
{
    /**
     * @param string $phone
     * @param string $message
     * @return SendSmsResponseData
     * @throws SmsSendException
     */
    public function sendSms(string $phone, string $message): SendSmsResponseData
    {
        $data = [
            'http_username' => env('SMS_SERVICE_USER'),
            'http_password' => env('SMS_SERVICE_PASS'),
            'phone_list' => $phone,
            'message' => urlencode($message),
            'format' => 'json',
        ];

        try {
            $response = Http::smssender()->timeout(10)->get(env('SMS_SERVICE_URL'), $data);
        } catch (\Exception) {
            throw new SmsSendException();
        }

        return SendSmsResponseData::from($response->json());
    }
}
