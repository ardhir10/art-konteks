<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KonteksMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $alasanTolak;
    private $type;
    private $username;
    private $password;
    public function __construct($data)
    {
        $this->alasanTolak = $data['alasan_penolakan'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->username = $data['username'] ?? null;
        $this->password = $data['password'] ?? null;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->type == 'penolakan'){
            return $this->from('no-reply@konteks.com')
            ->subject('Permohonan Registrasi Aplikasi Konteks')
            ->view('email-template.permohonan-registrasi-tolak')
            ->with(
                [
                    'alasan_penolakan' => $this->alasanTolak
                ]
            );
        }else{
            return $this->from('no-reply@konteks.com')
            ->subject('Permohonan Registrasi Aplikasi Konteks')
            ->view('email-template.permohonan-registrasi-terima')
            ->with(
                [
                    'username' => $this->username,
                    'password' => $this->password,
                ]
            );
        }

    }
}
