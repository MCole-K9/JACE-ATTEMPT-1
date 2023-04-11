<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\LabelAlignment\LabelAlignmentCenter;
use Endroid\QrCode\LabelFont\LabelFontArial;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $organization;
    public $orgCode ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($organization, $orgCode)
    {
        $this->organization = $organization;
        $this->orgCode = $orgCode;
    }


    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Invitation Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.invitation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        // Create a new QR code
        $qrCode = QrCode::create('http://127.0.0.1:8000/register?role=3&org='.$this->orgCode)
            ->setSize(200)
            ->setMargin(10);

        // Create a new PNG writer
        $writer = new PngWriter();

        // Generate the QR code PNG image
        $result = $writer->write($qrCode);

        // Save the PNG image to a temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'png_');
        $result->saveToFile($tempFile);

        // Read the PNG data from the temporary file
        $pngData = file_get_contents($tempFile);



        return [
            Attachment::fromData(fn ()=>  $pngData, 'qr-code.png')
                ->withMime('image/png'),
        ];
    }
}
