<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Setting
 * @package App\Models
 * @version May 22, 2024, 4:49 pm UTC
 *
 * @property string $logo
 * @property string $login_link
 * @property string $register_link
 */
class Setting extends Model
{
    use HasFactory;

    public $table = 'settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const MODULE_ACCOUNT_TYPES = 'account_type';
    const MODULE_LEARNING_VIDEOS = 'learning_video';
    const MODULE_TRADING_OPTIONS = 'trading_option';
    const MODULE_TESTIMONIALS = 'testimonial';
    const MODULE_LEGAL_DOCUMENTS = 'legal_document';
    const MODULE_FAQS = 'faqs';
    const MODULE_PAYMENT_METHOD = 'payment_method';
    const MODULE_WHITE_LABEL = 'white_label';

    const MODULE_NAMES = [self::MODULE_ACCOUNT_TYPES, self::MODULE_LEARNING_VIDEOS, self::MODULE_TRADING_OPTIONS, self::MODULE_TESTIMONIALS];


    public $fillable = [
        'logo',
        'login_link',
        'register_link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'logo' => 'string',
        'login_link' => 'string',
        'register_link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'logo' => 'required|string',
        'login_link' => 'required|string',
        'register_link' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
