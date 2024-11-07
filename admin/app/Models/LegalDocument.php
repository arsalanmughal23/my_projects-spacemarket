<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LegalDocument
 * @package App\Models
 * @version June 5, 2024, 3:52 pm UTC
 *
 * @property string $name
 * @property string $link
 */
class LegalDocument extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'legal_documents';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $appends = ['file_link'];

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'pdf_file' => 'required|file|mimetypes:application/pdf',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public static $update_rules = [
        'name' => 'required|string|max:255',
        'pdf_file' => 'file|mimetypes:application/pdf',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    
    public function getFileLinkAttribute() 
    {
        return $this->link ? asset('public/storage/'.$this->link) : null;
        // return config('filesystems.disks.public.url').'/'.$this->link;
    }
}
