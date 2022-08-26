<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailNew extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $status;
    public $massage;
    public $user;
    public function __construct($status,$massage,$user)
    {
        $this->status=$status;
        $this->user=$user;
        $this->massage=$massage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail',['status'=>$this->status,'massage'=>$this->massage,'user'=>$this->user]);
    }
}
