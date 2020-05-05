<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\TableModel;

class Base extends Model
{
    use SoftDeletes, TableModel;
}
