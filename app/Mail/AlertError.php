<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AlertError extends Mailable
{
    use Queueable, SerializesModels;

    protected $text;
    protected $context;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text, $context)
    {
        $this->text = $text;
        $this->context = $context;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.alert', [
            'text' => $this->text,
            'context' => $this->context
        ]);
    }
}
