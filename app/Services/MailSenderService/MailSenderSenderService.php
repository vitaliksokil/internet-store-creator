<?php


namespace App\Services\MailSenderService;


use App\Exceptions\Email\MailSendingException;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class MailSenderSenderService implements MailSenderServiceInterface
{

    public function send(string $toEmail, Mailable $mail)
    {
        try {
            Mail::to($toEmail)->send($mail);
        }catch (\Exception $exception){
            info($exception->getMessage());
            throw new MailSendingException();
        }
    }

    public function sendMultiple(array $toMails, Mailable $mail)
    {
        try {
            Mail::to($toMails)->send($mail);
        }catch (\Exception $exception){
            info($exception->getMessage());
            throw new MailSendingException();
        }
    }
}
