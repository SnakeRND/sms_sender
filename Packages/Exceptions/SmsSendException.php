<?php

declare(strict_types=1);

namespace App\Packages\Exceptions;

class SmsSendException extends DomainException
{
    protected $code = 'checkout-back_intellin_sms_send__exception';
    protected $message = 'Intellin sms send error';
    protected $description = 'Ошибка отправки смс сообщения';
}
