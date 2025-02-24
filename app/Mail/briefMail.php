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
    public $filePaths;
    public $customId;
    /**
     * Create a new message instance.
     */
    public function __construct($data, $filePaths, $customId)
    {
        $this->data = $data;
        $this->filePaths = $filePaths;
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
            with: [$this->data, $this->filePaths, $this->customId]
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
