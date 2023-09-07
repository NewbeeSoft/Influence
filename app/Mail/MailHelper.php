<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Http\Datas\MailData;

class MailHelper extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MailData $mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch($this->mailData->mailType)
        {
            case 'resetLink':
                return $this->view('mail.reset')
                ->subject('Twhive')
                ->with([
                    'resetLink' => $this->mailData->content
                ]);
                break;
            case 'welcome':
                switch($this->mailData->content)
                {
                    case 'brand':
                        return $this->view('mail.welcomebrand')
                        ->subject('Twhive');
                        break;
                    case 'influencer':
                        return $this->view('mail.welcomeinfluencer')
                        ->subject('Twhive');
                        break;
                }
                break;
            case 'b':
                break;
            default:
                return $this->view('mail.verify')
                ->subject('Twhive')
                ->with([
                    'verifyLink' => $this->mailData->content
                ]);
                break;
        }

    }
}
