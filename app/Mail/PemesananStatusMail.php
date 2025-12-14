<?php

namespace App\Mail;

use App\Models\Pemesanan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PemesananStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;
    public $statusText;

    public function __construct(Pemesanan $pemesanan, $statusText)
    {
        $this->pemesanan = $pemesanan;
        $this->statusText = $statusText;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Pemesanan Kunjungan')
            ->view('emails.pemesanan-status');
    }
}