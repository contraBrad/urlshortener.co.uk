<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $shortenedUrl;
    protected $originalUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(string $originalUrl, string $shortenedUrl)
    {
        $this->originalUrl = $originalUrl;
        $this->shortenedUrl = $shortenedUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Successfully Shortened a url',

        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('emails.send-mail')
            ->with([
                'originalUrl' => $this->originalUrl,
                'shortenedUrl' => $this->shortenedUrl,
            ]);
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
