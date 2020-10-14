<?php

namespace App\Controllers\Params;

use yii\base\Model;

class GetDeliveryPricesParams extends Model
{
    /** @var string */
    public $search;

    public function rules()
    {
        return [
            ['search', 'required']
        ];
    }

}
