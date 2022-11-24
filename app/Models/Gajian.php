<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gajian extends Model
{
    use HasFactory;
    protected $table = 'gajian';
    protected $guarded = [];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
