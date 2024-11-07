<?php

namespace App\Repositories;

use App\Models\Permissions;
use App\Repositories\BaseRepository;

/**
 * Class PermissionsRepository
 * @package App\Repositories
 * @version January 10, 2023, 9:09 am UTC
*/

class PermissionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name'
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
        return Permissions::class;
    }
}
