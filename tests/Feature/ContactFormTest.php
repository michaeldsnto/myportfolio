<?php

namespace Tests\Feature;

use App\Mail\ContactNotificationMail;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_route_redirects_to_home_contact_section(): void
    {
        $this->get(route('contact.index'))
            ->assertRedirect(route('home') . '#contact');
    }

    public function test_contact_form_stores_message_and_sends_notification(): void
    {
        Mail::fake();

        $response = $this->post(route('contact.store'), [
            'name' => 'Michael',
            'email' => 'michael@example.com',
            'subject' => 'New Portfolio Inquiry',
            'message' => 'I need a Laravel portfolio and admin dashboard for a client project.',
            'website' => '',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'michael@example.com',
            'subject' => 'New Portfolio Inquiry',
        ]);

        Mail::assertSent(ContactNotificationMail::class);
    }

    public function test_contact_form_rejects_honeypot_submission(): void
    {
        Mail::fake();

        $response = $this->from('/#contact')->post(route('contact.store'), [
            'name' => 'Spam Bot',
            'email' => 'bot@example.com',
            'subject' => 'Spam Subject',
            'message' => 'This is definitely more than twenty characters long.',
            'website' => 'https://spam.example.com',
        ]);

        $response->assertSessionHasErrors('website');
        $this->assertDatabaseCount(ContactMessage::class, 0);
        Mail::assertNothingSent();
    }
}
