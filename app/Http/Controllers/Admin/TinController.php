<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tin;
use Illuminate\Http\Request;

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
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tin = tin::query()->create($request->all());
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
        $model = tin::query()->find($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = tin::query()->find($id);
        $model->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = tin::query()->find($id);
        $model->delete();
        return redirect()->route('tin.index');
    }
}
