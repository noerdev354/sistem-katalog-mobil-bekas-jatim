<?php

namespace App\Models\Admin\MasterData;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    // protected $connection = 'pgsql';
    protected $connection = 'mysql';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "ms_tipe";
    protected $primaryKey = 'id_tipe';
    protected $guarded = [];
}
