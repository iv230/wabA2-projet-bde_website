<?php

namespace App\Mail;

use App\User;
use App\Events;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventHidden extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $event;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Events $event
     */
    public function __construct(User $user, Events $event)
    {
        $this->event = $event;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("BDE CESI Nice - Evènement masqué")
                    ->view('mail.event-censor', array('event' => $this->event, 'user' => $this->user));
    }
}
