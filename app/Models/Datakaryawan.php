<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakaryawan extends Model
{
    use HasFactory;

    protected $table = 'datakaryawan'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'nik',
        'name',
        'rank',
        'division',
        'dealer',
        'position',
        'divisionho',
        'password',
    ];
}
