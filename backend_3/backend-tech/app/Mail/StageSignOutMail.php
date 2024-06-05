<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StageSignOutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $signOutUrl;

    public function __construct($signOutUrl)
    {
        $this->signOutUrl = $signOutUrl;
    }

    public function build()
    {
        return $this->view('emails.stage_signout')
            ->with(['signOutUrl' => $this->signOutUrl]);
    }
}
