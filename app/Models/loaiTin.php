<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaiTin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function tins(){
        return $this->hasMany(loaiTin::class);
    }
}
