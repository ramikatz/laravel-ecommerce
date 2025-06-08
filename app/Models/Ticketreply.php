<?php

namespace App\Models;

use App\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class Ticketreply extends Model
{
    public function ticket()
    {
        return $this->belongsToMany(Ticket::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
