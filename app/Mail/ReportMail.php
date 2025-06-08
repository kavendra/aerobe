<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $filePath;

    public function __construct($data, $filePath)
    {
        $this->data = $data;
        $this->filePath = $filePath;
    }

    public function build()
    {
        return $this->view('emails.attachment')
                    ->with('data', $this->data)
                    ->subject('Attachment')
                    ->attach($this->filePath, [
                        'as' => $this->data['filename'],
                        'mime' => 'application/pdf',
                    ]);
    }
}
