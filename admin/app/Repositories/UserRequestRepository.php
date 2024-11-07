<?php

namespace App\Repositories;

use App\Models\UserRequest;
use App\Repositories\BaseRepository;

/**
 * Class UserRequestRepository
 * @package App\Repositories
 * @version June 5, 2024, 8:16 am UTC
*/

class UserRequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'email',
        'contact_number',
        'ticket_number',
        'trade_number',
        'description',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserRequest::class;
    }
}
