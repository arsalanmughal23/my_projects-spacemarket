<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserRequest
 * @package App\Models
 * @version June 5, 2024, 8:16 am UTC
 *
 * @property string $full_name
 * @property string $email
 * @property string $contact_number
 * @property string $ticket_number
 * @property string $trade_number
 * @property string $description
 * @property boolean $status
 */
class UserRequest extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_requests';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const CONST_TYPE_DEPOSIT = 'deposit';
    const CONST_TYPE_WITHDRAWAL = 'withdrawal';
    const CONST_TYPE_SUBSCRIBE = 'subscribe_newsletter';
    const CONST_TYPE_CONTACT_US = 'contact_us';
    const TYPES = [self::CONST_TYPE_DEPOSIT, self::CONST_TYPE_WITHDRAWAL, self::CONST_TYPE_SUBSCRIBE, self::CONST_TYPE_CONTACT_US];

    protected $dates = ['deleted_at'];

    public $appends = ['status_text'];

    public $fillable = [
        'type',
        'department_id',
        'full_name',
        'email',
        'contact_number',
        'ticket_number',
        'trade_number',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'email' => 'string',
        'contact_number' => 'string',
        'ticket_number' => 'string',
        'trade_number' => 'string',
        'description' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required|in:'.self::CONST_TYPE_DEPOSIT.','.self::CONST_TYPE_WITHDRAWAL.','.self::CONST_TYPE_SUBSCRIBE.','.self::CONST_TYPE_CONTACT_US,
        'department_id' => 'required_if:type,'.self::CONST_TYPE_CONTACT_US,
        'full_name' => 'required|string|max:50',
        'email' => 'required|string|max:255',
        'contact_number' => 'required|string|max:20',
        'ticket_number' => 'required_if:type,'.self::CONST_TYPE_DEPOSIT.','.self::CONST_TYPE_WITHDRAWAL.'|string|max:255',
        'trade_number' => 'required_if:type,'.self::CONST_TYPE_DEPOSIT.','.self::CONST_TYPE_WITHDRAWAL.'|string|max:255',
        'description' => 'required|string|max:500',
        // 'status' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public static $web_rules = [
        'type' => 'required|in:'.self::CONST_TYPE_DEPOSIT.','.self::CONST_TYPE_WITHDRAWAL.','.self::CONST_TYPE_SUBSCRIBE.','.self::CONST_TYPE_CONTACT_US,
        'department_id' => 'required_if:type,'.self::CONST_TYPE_CONTACT_US,
        'full_name' => 'required|string|max:50',
        'email' => 'required|string|max:255',
        'contact_number' => 'required|string|max:20',
        'ticket_number' => 'required_if:type,'.self::CONST_TYPE_DEPOSIT.','.self::CONST_TYPE_WITHDRAWAL.'|string|max:255',
        'trade_number' => 'required_if:type,'.self::CONST_TYPE_DEPOSIT.','.self::CONST_TYPE_WITHDRAWAL.'|string|max:255',
        'description' => 'required|string|max:500',
    ];
    
    public static $messages = [
        'type.required' => 'Type is required',
        'type.in' => '',
        'department_id.required_if' => 'Department is required',
        'full_name.required' => 'Full Name is required',
        'full_name.string' => 'Full Name is must be in a text format',
        'full_name.max' => 'Full Name must be less than 50 characters',
        'email.required' => 'Email is required',
        'email.string' => 'Email is must be in a text format',
        'email.max' => 'Email must be less than 250 characters',
        'contact_number.required' => 'Contact Number is required',
        'contact_number.string' => 'Contact Number is must be in a text format',
        'contact_number.max' => 'Contact Number must be less than 20 characters',
        'ticket_number.required_if' => 'Ticket Number is required',
        'ticket_number.string' => 'Ticket Number is must be in a text format',
        'ticket_number.max' => 'Ticket Number must be less than 250 characters',
        'trade_number.required_if' => 'Trade Number is required',
        'trade_number.string' => 'Trade Number is must be in a text format',
        'trade_number.max' => 'Trade Number must be less than 250 characters',
        'description.required' => 'Description is required',
        'description.string' => 'Description is must be in a text format',
        'description.max' => 'Description must be less than 500 characters',
        'status.required' => 'Status is required',
    ];

    public function getStatusTextAttribute() {
        return $this->status ? 'Done' : 'Pending';
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
