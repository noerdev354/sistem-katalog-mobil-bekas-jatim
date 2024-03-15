<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    // protected $connection = 'pgsql';
    protected $connection = 'mysql';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "pesan";
    protected $primaryKey = 'id_pesan';
    protected $guarded = [];
}
