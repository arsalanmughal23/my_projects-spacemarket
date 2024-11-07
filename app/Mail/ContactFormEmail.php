<?php

namespace App\Mail;

use App\Models\UserRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactFormEmail extends EmailAuth
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        private $departmentName,
        private $departmentEmail,
        private UserRequest $userRequest,
        private $emailSubject = 'Contact Us Form Query',
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
            'department' => $departmentName,
            'fullname' => $userRequest?->full_name,
            'email' => $userRequest?->email,
            'contact' => $userRequest?->contact_number,
            'description' => $userRequest?->description,
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
                    ->to($this->departmentEmail)
                    ->subject($this->emailSubject)
                    ->text('emails.test_email_plain', ['data' => $this->data])
                    ->view('emails.test_email_html', ['data' => $this->data]);
    }
}
