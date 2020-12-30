<?php

namespace App\Mail;

use App\Models\MailModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $mail_dat;


    public function __construct(MailModel $mail_dat)
    {
        $this->mail_dat = $mail_dat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.send_mail')
                    ->with([
                        'sender' => $this->mail_dat->sender,
                        'recipient' => $this->mail_dat->recipient,
                        'subject' => $this->mail_dat->subject,
                        'content' => $this->mail_dat->content
                    ])
                    ->attach($this->mail_dat->attach_url);
    }
}
