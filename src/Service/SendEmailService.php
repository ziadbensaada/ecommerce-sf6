<?php
namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class SendEmailService{
    private $mailer;
    public function __construct(MailerInterface $mailer){
        $this->mailer=$mailer;
    }
    public function send(
        string $from,
        string $to,
        string $subject,
        string $template,
        array $context
    ):void
    {
        //create email
        $email=(new TemplatedEmail())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->htmlTemplate("emails/$template.html.twig")
            ->context($context);
        //send email
        $this->mailer->send($email);
    }
} 