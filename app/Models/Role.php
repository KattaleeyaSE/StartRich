<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;

class Role extends OriginalRole
{
    use CrudTrait;

    protected $fillable = ['name', 'updated_at', 'created_at'];
}
