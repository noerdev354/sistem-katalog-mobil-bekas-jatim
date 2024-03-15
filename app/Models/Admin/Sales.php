<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    // protected $connection = 'pgsql';
    protected $connection = 'mysql';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "sales";
    protected $primaryKey = 'id_sales';
    protected $guarded = [];
}
