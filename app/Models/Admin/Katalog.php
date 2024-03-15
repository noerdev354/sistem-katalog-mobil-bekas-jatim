<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    // protected $connection = 'pgsql';
    protected $connection = 'mysql';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "katalog";
    protected $primaryKey = 'id_katalog';
    protected $guarded = [];

    public function getTipe()
    {
        return $this->hasOne('App\Models\Admin\MasterData\Tipe', 'id_tipe', 'id_tipe');
    }

    public function getMerk()
    {
        return $this->hasOne('App\Models\Admin\MasterData\Merk', 'id_merk', 'id_merk');
    }
}
