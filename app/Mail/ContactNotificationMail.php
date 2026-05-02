<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotificationMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public ContactMessage $contactMessage
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Portfolio Contact: ' . $this->contactMessage->subject,
            replyTo: [[
                'address' => $this->contactMessage->email,
                'name' => $this->contactMessage->name,
            ]],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-notification',
        );
    }
}
