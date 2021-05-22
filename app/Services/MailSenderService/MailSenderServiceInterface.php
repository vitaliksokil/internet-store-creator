<?php


namespace App\Services\MailSenderService;


use Illuminate\Mail\Mailable;

interface MailSenderServiceInterface
{
    public function send(string $toEmail, Mailable $mail);
    public function sendMultiple(array $toMails, Mailable $mail);
}
