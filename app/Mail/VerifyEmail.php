<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->id = $user->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = 'http://banquet/verify/'.$this->id;
        return $this->markdown('emails.verifyemail')->with('url',$url);
    }
}
