<?php

namespace App\Mail;

use GuzzleHttp\Client;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;

class EmailAuth extends Mailable
{
    protected $userName;
    private $tenantId;
    private $clientId;
    private $clientSecret;
    private $userEmail;
    private $userPassword;
    private $outlookScope;

    public function __construct() {
        $this->tenantId = env('AZURE_TENANT_ID');
        $this->clientId = env('AZURE_CLIENT_ID');
        $this->clientSecret = env('AZURE_CLIENT_SECRET_CODE');
        $this->userPassword = env('MAIL_PASSWORD');
        $this->userEmail = env('MAIL_FROM_ADDRESS');
        $this->userName = env('MAIL_USERNAME');
        $this->outlookScope = 'https://outlook.office365.com/SMTP.Send https://outlook.office365.com/offline_access';
    }

    public function getAccessToken()
    {
        $client = new Client();
        
        try {
            $response = $client->post('https://login.microsoftonline.com/' . $this->tenantId . '/oauth2/v2.0/token', [
                'form_params' => [
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'grant_type' => 'password',
                    'username' => $this->userEmail,
                    'password' => $this->userPassword,
                    'scope' => $this->outlookScope
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            return $data['access_token'] ?? null;
        } catch (\Exception $e) {
            Log::error('Error getting access token: ' . $e->getMessage());
            return null;
        }
    }
}