<?php

namespace App\Notifier;

use App\Entity\Account;
use Symfony\Component\Notifier\Message\EmailMessage;
use Symfony\Component\Notifier\Notification\EmailNotificationInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\EmailRecipientInterface;

class AccountAssignNotification extends Notification implements EmailNotificationInterface
{
    public function __construct(
        private Account $account,
    ) {
        parent::__construct('You have been assigned to a new account!');
    }

    public function asEmailMessage(EmailRecipientInterface $recipient, string $transport = null): ?EmailMessage
    {
        $message = EmailMessage::fromNotification($this, $recipient, $transport);
        $message->getMessage()
            ->htmlTemplate('emails/new_assignment.html.twig')
            ->context(['entity' => $this->account, 'module_name' => 'account'])
        ;

        return $message;
    }
}