<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = false;
}
