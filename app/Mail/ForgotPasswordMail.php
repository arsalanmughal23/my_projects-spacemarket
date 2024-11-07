<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ForgotPasswordMail extends EmailAuth
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        private $token,
        private $email,
        private $emailSubject = 'Forgot Password',
    )
    {
        parent::__construct();
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            Log::info('Access token is missing.');
            return;
        }

        config(['mail.mailers.smtp.username' => env('MAIL_FROM_ADDRESS')]);
        config(['mail.mailers.smtp.password' => $accessToken]);

        $this->data = [
            'email' => $this->email,
            'token' => $this->token
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->to($this->email)
                    ->subject($this->emailSubject)
                    ->view('auth.emails.password', $this->data);
    }
}
