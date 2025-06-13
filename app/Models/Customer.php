<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{

    use HasApiTokens, Notifiable;

    protected $table = 'customer';

    protected $primaryKey = 'Customer_ID';

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'customer_id', 'Customer_ID');
    }
}
