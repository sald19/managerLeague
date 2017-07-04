<?php

namespace App\Mail;

use App\League;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invitation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var League
     */
    public $league;

    /**
     * @var \App\Invitation
     */
    public $invitation;

    /**
     * Create a new message instance.
     *
     * @param League $league
     * @param Invitation $invitation
     */
    public function __construct(League $league, \App\Invitation $invitation)
    {
        //
        $this->league = $league;
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invitation');
    }
}
