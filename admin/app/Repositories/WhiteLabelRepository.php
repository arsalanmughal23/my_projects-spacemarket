<?php

namespace App\Repositories;

use App\Models\WhiteLabel;
use App\Repositories\BaseRepository;

/**
 * Class WhiteLabelRepository
 * @package App\Repositories
 * @version June 6, 2024, 10:18 pm UTC
*/

class WhiteLabelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description'
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
        return WhiteLabel::class;
    }
}
