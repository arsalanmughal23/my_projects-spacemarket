<?php

namespace App\Repositories;

use App\Models\DataList;
use App\Repositories\BaseRepository;

/**
 * Class DataListRepository
 * @package App\Repositories
 * @version June 5, 2024, 2:28 pm UTC
*/

class DataListRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'detail'
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
        return DataList::class;
    }
}
