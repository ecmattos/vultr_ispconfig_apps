<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

/**
 * Class Client.
 *
 * @package namespace App\Entities;
 */
class Client extends Model implements Transformable
{
    use TransformableTrait, Notifiable, Billable;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'verified',
        'code',
        'cpfcnpj',
        'name',
        'email',
        'domain',
        'database',
        'hostname',
        'username',
        'password',
        'code_verification',
        'stripe_id',
        'card_brand',
        'card_last_four',
        'trial_ends_at'
    ];

    public function users()
    {
        return $this->hasMany('App\Entities\User');   
    }
}