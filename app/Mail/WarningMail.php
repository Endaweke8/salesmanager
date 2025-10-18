<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WarningMail extends Mailable
{
    use Queueable, SerializesModels;

    public $employee, $sales, $goal, $todaySales;

    public function __construct($employee, $sales, $goal, $todaySales)
    {
        $this->employee = $employee;
        $this->sales = $sales;
        $this->goal = $goal;
        $this->todaySales = $todaySales;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Performance Alert - Let’s Get Back on Track 💪',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.employees.warning',
            with: [
                'employee' => $this->employee,
                'sales' => $this->sales,
                'goal' => $this->goal,
                'todaySales' => $this->todaySales,
            ],
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
