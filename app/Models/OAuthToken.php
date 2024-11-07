<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OAuthToken extends Model
{
    use HasFactory;

    public $table = 'oauth_tokens';

    protected $fillable = [
        'access_token', 'refresh_token', 'expires_in'
    ];

    protected $casts = [
        'expires_in' => 'integer',
    ];
}
