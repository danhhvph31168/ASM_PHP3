<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaiTin;
use App\Models\tin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TinController extends Controller
{
    const PATH_VIEW = 'admin.tin.';
    public function index()
    {
        $data = tin::query()->with('loaiTin')->latest('id')->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loaiTin = loaiTin::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('loaiTin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('anh');

        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put('tins', $request->file('anh'));
        }

        tin::query()->create($data);

        return redirect()->route('tin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = tin::query()->find($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $loaiTin = loaiTin::query()->get();
        $model = tin::query()->find($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model', 'loaiTin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = tin::query()->findOrFail($id);

        $data = $request->except('anh');

        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put('tins', $request->file('anh'));
        }

        $anhHienTai = $model->anh;

        $model->update($data);

        if ($request->hasFile('anh') && $anhHienTai && Storage::exists($anhHienTai)) {
            Storage::delete($anhHienTai);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = tin::query()->findOrFail($id);

        $model->delete();

        if ($model->anh && Storage::exists($model->anh)) {
            Storage::delete($model->anh);
        }

        return redirect()->route('tin.index');
    }
}
