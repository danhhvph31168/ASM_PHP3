<?php

namespace App\Http\Controllers;

use App\Models\loaiTin;
use App\Models\tin;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TinController extends Controller
{
    public function danhSach()
    {
        $loaiTin = loaiTin::query()->get();

        $keyword = \request()->keyword;
        $idLoaiTin = \request()->id_loai_tin;

        $data = tin::query()->with('loaiTin')
            ->when(!empty($keyword), function (Builder $query) use ($keyword) {
                $query->whereAny(['id', 'tieuDe'], 'like', "%$keyword%");
            })
            ->when(!empty($idLoaiTin), function (Builder $query) use ($idLoaiTin) {
                $query->where('loai_tin_id', 'like', "%$idLoaiTin%");
            })
            ->limit(4)->get();
        return view('welcome', compact('data','loaiTin'));
    }
    public function chiTiet($id)
    {
        $data = tin::query()->where('id', $id)->first();
        return view('chi-tiet', compact('data'));
    }
}
