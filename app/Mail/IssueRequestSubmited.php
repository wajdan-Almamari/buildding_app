<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use app\issueees;
class IssueRequestSubmited extends Mailable
{
    use Queueable, SerializesModels;
public $issueees;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Issueees $issueees)
    {
        //

        $this->issueees=$issueees;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['name']=$this->issueees->name;
        return $this->view('Mail.Issue-Request-Submited',$data);
    }
}
