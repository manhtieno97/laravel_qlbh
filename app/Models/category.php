<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class category extends Model
{
	use SoftDeletes;
    protected $table='category';
    protected $fillable=['name','status','sulg_cat'];
    protected $dates=['deleted_at'];
}
