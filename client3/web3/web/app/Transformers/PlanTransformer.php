<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Plan;

/**
 * Class PlanTransformer.
 *
 * @package namespace App\Transformers;
 */
class PlanTransformer extends TransformerAbstract
{
    /**
     * Transform the Plan entity.
     *
     * @param \App\Entities\Plan $model
     *
     * @return array
     */
    public function transform(Plan $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
