<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;

class Permission
{
    use CrudTrait;

    protected $fillable = ['name', 'updated_at', 'created_at'];
}
