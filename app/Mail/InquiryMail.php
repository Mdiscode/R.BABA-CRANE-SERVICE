<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $save;
    /**
     * Create a new message instance.
     */
    public function __construct($save)
    {
        $this->save = $save;
    }


    public function build()
    {
         return $this->markdown('email.inquiry')
        ->subject($this->save['subject']);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Compose Email Mail',
        );
        // return $this->from($this->inquiry['email']) // User's email as sender
        // ->to('israrshekh.code22@gmail.com') // Admin email
        // ->subject('New Inquiry Received')
        // ->view('email.inquiry') // Email template
        // ->with('inquiry', $this->inquiry);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.inquiry',
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
