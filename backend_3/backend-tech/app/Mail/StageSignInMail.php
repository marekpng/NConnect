<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StageSignInMail extends Mailable
{
    use Queueable, SerializesModels;

    public $signInUrl;

    public function __construct($signInUrl)
    {
        $this->signInUrl = $signInUrl;
    }

    public function build()
    {
        return $this->view('emails.stage_signin')
            ->with(['signInUrl' => $this->signInUrl]);
    }
}
