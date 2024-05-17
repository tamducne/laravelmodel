<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Account extends Authenticatable
{
    use HasFactory;

    protected $table = 'accounts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        ];

}
