<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Allmailsend extends Mailable
{
    use Queueable, SerializesModels;
     public $details;
     public $subject;
     public $viewpage;
     public $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$details,$viewpage,$attachment=null)
    {
        $this->subject = $subject;
       $this->details = $details;
       $this->viewpage = $viewpage;
       $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = $this->details;
        $viewpage = $this->viewpage;
        $attachment = $this->attachment;
         $this->subject($this->subject)->view($viewpage,compact('details'));
                if(!empty($attachment)){
                    if(is_array($attachment)){
                          foreach ($attachment as $file){
            $this->attach($file);
        }
                    }
                    else{
          $this->attach($attachment);
       }

        return $this;
        }
        else{
         return $this->subject($this->subject)->view($viewpage,compact('details'));
                }
    }
}
