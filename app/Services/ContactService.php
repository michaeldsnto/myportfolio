<?php

namespace App\Services;

use App\Models\ContactMessage;
use App\Mail\ContactNotificationMail;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function store(array $data): ContactMessage
    {
        $message = ContactMessage::create([
            ...$data,
            'ip_address' => request()->ip(),
        ]);

        $this->sendNotification($message);

        return $message;
    }

    protected function sendNotification(ContactMessage $message): void
    {
        Mail::to(config('mail.from.address'))
            ->queue(new ContactNotificationMail($message));
    }
}