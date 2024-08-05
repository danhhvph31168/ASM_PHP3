<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tin extends Model
{
    use HasFactory;
    protected $fillable = [
        'loai_tin_id',
        'tieuDe',
        'anh',
        'noiDung',
        'luotXem',
    ];
    public function loaiTin()
    {
        return $this->belongsTo(loaiTin::class);
    }
}
