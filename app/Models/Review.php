<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
