<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function fullName()
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }
}
