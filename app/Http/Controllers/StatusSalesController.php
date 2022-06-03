<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusSales;

class StatusSalesController extends Controller
{

    public function index()
    {
       $data = StatusSales::all();

       return view('pages.status-sales.index',compact('data'));
    }


    public function create()
    {
       return view('pages.status-sales.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:status_sales,name',
            'satuan'    => 'required|unique:status_sales',
        ]);

        $data           = $request->all();
        $status_sales   = StatusSales::create($data);

        return redirect()->route('satuan.index')->with('success','Input Data Satuan Berhasil');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
       $data = StatusSales::findOrFail($id);
       return view('pages.status-sales.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|unique:status_sales,name,'.$id,
            'satuan'     => 'required|string|unique:status_sales,satuan,'.$id,
        ]);

        $customer = StatusSales::findOrFail($id);
        $data     = $request->all();

        $customer->update($data);

        return redirect()->route('satuan.index')->with('success','Update Data Satuan Berhasil');
    }


    public function destroy($id)
    {
        $status_sales = StatusSales::findOrFail($id)->delete();

        return redirect()->route('satuan.index')->with('delete','Delete Data Satuan Berhasil');
    }
}
