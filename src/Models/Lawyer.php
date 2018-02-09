<?php

namespace Sebbaum\Legal\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Lawyer extends Authenticatable
{
    use Notifiable;

    protected $casts = [
        'force_reset_password' => 'boolean'
    ];

    public function getTable()
    {
        return config('legal.lawyers_table');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'firstname',
        'surname',
        'email',
        'password',
    ];

    /**
     * Check if the Lawyer is forced to reset the password.
     *
     * @return bool
     */
    public function isForcedToResetPassword()
    {
        return $this->force_reset_password === true;
    }
}