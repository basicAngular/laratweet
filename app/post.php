<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['body'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
