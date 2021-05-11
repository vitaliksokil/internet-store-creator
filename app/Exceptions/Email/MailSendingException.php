<?php


namespace App\Exceptions\Email;


use Illuminate\Http\Exceptions\HttpResponseException;

class MailSendingException extends HttpResponseException
{
    public function __construct()
    {
        $message = __('exceptions.MailSendingException');
        $status = 500;
        $response = response()->json(['error' => $message],$status);
        parent::__construct($response);
    }
}
