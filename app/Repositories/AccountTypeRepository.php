<?php

namespace App\Repositories;

use App\Models\AccountType;
use App\Repositories\BaseRepository;

/**
 * Class AccountTypeRepository
 * @package App\Repositories
 * @version June 5, 2024, 2:46 pm UTC
*/

class AccountTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account_name',
        'minimum',
        'spread',
        'commission',
        'bonus',
        'platform',
        'leverage'
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
        return AccountType::class;
    }
}
