<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class briefMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $filename;
    public $customId;
    /**
     * Create a new message instance.
     */
    public function __construct($data, $filename, $customId)
    {
        $this->data = $data;
        $this->filename = $filename;
        $this->customId = $customId;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Brief Form Submission',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.brief_form',
            with: [$this->data, $this->filename, $this->customId]
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
