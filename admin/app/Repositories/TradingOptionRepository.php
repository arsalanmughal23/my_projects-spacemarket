<?php

namespace App\Repositories;

use App\Models\TradingOption;
use App\Repositories\BaseRepository;

/**
 * Class TradingOptionRepository
 * @package App\Repositories
 * @version June 5, 2024, 3:02 pm UTC
*/

class TradingOptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'link'
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
        return TradingOption::class;
    }
}
