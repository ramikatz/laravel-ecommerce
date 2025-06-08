<?php

namespace App\Models;

use App\User;
use App\Models\Ticketreply;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /* public function ticketcomments()
    {
        return $this->hasMany(Ticketcomment::class);
    } */
    public function ticketreply()
    {
        return $this->hasMany(Ticketreply::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
}
