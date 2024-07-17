<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaiTin;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.loaiTin.';
    public function index()
    {
        $data = loaiTin::query()->latest('id')->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loaiTin = loaiTin::query()->create($request->all());
        return redirect()->route('loaiTin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = loaiTin::query()->find($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = loaiTin::query()->find($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = loaiTin::query()->find($id);
        $model->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = loaiTin::query()->find($id);
        $model->delete();
        return redirect()->route('loaiTin.index');
    }
}
