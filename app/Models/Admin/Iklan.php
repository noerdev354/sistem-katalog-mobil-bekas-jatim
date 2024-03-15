<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    // protected $connection = 'pgsql';
    protected $connection = 'mysql';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "iklan";
    protected $primaryKey = 'id_iklan';
    protected $guarded = [];
}
