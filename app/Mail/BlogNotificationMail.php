<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BlogNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;
    public $posts;
    public $unsubscription_link;
    /**
     * Create a new message instance.
     */
    public function __construct($subscriber, $posts, $unsubscription_link)
    {
        $this->posts = $posts;
        $this->subscriber = $subscriber;
        $this->unsubscription_link = $unsubscription_link;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'MTMKay IT Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.blog-notification-mail',
            with: [
                'subscriber' => $this->subscriber,
                'posts'      => $this->posts,
                'unsubscription_link' => $this->unsubscription_link
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
