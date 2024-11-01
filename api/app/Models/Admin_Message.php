<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_Message extends Model
{
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
