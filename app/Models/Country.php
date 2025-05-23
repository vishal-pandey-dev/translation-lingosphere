<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['code', 'name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
