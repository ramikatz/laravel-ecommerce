<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
