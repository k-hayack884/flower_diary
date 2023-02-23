<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
use HasFactory;

public const ID_USER=1;
public const ID_ADMIN=2;
public const CODE_USER='user';
public const CODE_ADMIN='admin';

protected $primaryKey='user_type_Id';
}
