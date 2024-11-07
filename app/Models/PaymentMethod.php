<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PaymentMethod
 * @package App\Models
 * @version June 5, 2024, 4:03 pm UTC
 *
 * @property string $name
 * @property string $image
 * @property boolean $is_deposit
 * @property boolean $is_withdrawal
 */
class PaymentMethod extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'payment_methods';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $appends = ['image_link'];

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'image',
        'is_deposit',
        'is_withdrawal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image' => 'string',
        'is_deposit' => 'boolean',
        'is_withdrawal' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'image' => 'required|file|mimetypes:image/jpeg,image/jpg,image/png',
        'is_deposit' => 'required|boolean',
        'is_withdrawal' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


    public function getImageLinkAttribute() 
    {
        return $this->image ? asset('public/storage/'.$this->image) : null;
        // return config('filesystems.disks.public.url').'/'.$this->link;
    }
}
