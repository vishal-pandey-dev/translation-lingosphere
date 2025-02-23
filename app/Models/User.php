<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'country',
        'city',
        'postal_code',
        'phone',
        'avatar_original',
        'verification_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function deductBalance($amount)
    {
        return DB::table('users')
            ->where('id', $this->id)
            ->update(['balance' => DB::raw("balance - $amount")]);
    }
}
