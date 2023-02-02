<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\ExternalServices\UviMonolithService;
use App\Packages\ApiClients\IntellinSms\SmsSender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private SmsSender $smsSender)
    {
    }

    /**
     * @throws \Exception
     */
    public function sendSms(Request $request)
    {
        $this->smsSender->sendSms($request->phone, $request->message);
    }
}
