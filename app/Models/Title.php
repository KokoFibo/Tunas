<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $table = "title";
    protected $guarded = [];
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
