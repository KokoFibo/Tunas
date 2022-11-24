<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratjalan extends Model
{
    use HasFactory;
    protected $table = 'suratjalan';
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function nota()
    {
        $this->belongsTo(Nota::class);
    }
}
