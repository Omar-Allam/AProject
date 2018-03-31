<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdentitiyForm extends Model
{
    protected $table = 'identity_forms';
    protected $fillable = ['created_by'];
}
