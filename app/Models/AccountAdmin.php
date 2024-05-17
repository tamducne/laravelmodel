<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountAdmin extends Authenticatable
{
    use HasFactory;

    protected $table = 'account_admins';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        ];
}
