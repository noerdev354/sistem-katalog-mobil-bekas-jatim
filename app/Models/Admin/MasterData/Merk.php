<?php

namespace App\Models\Admin\MasterData;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    // protected $connection = 'pgsql';
    protected $connection = 'mysql';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "ms_merk";
    protected $primaryKey = 'id_merk';
    protected $guarded = [];
}
