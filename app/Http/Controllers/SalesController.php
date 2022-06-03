<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Sales,Customer,StatusSales,Kategori};

class SalesController extends Controller
{

    public function index()
    {
       $data = Sales::join('status_sales','status_sales.id','sales.satuan_id')
                    ->join('customers','customers.id','sales.customer_id')
                    ->join('kategoris','kategoris.id','sales.kategori_id')
                    ->get(['sales.*','status_sales.satuan','customers.nama','customers.alamat','kategoris.name as kategori']);
       return view('pages.sales.index',compact('data'));
    }


    public function create()
    {
        $customers = Customer::all();
        $satuan = StatusSales::all();
        $categories = Kategori::all();
       return view('pages.sales.create',compact('customers','satuan','categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id'          => 'required',
            'satuan_id'            => 'required',
            'kategori_id'          => 'required',
            'barang'               => 'required|string',
            'price'                => 'nullable',
            'total'                => 'required',
            'tanggal_masuk'        => 'required|date',
        ]);

        $data       = $request->all();

        $sales      = Sales::create([
            'customer_id'          => $data['customer_id'],
            'satuan_id'            => $data['satuan_id'],
            'kategori_id'          => $data['kategori_id'],
            'barang'               => $data['barang'],
            'price'                => (int)str_replace(',','',$data['price']),
            'total'                => $data['total'],
            'tanggal_masuk'        => $data['tanggal_masuk'],
        ]);

        return redirect()->route('sales.index')->with('success','Input Data pemesanan Berhasil');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $data = Sales::findOrFail($id);
        $customers = Customer::all();
        $satuans = StatusSales::all();
        $categories = Kategori::all();

       return view('pages.sales.edit',compact('data','customers','satuans','categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id'          => 'required',
            'satuan_id'            => 'required',
            'kategori_id'          => 'required',
            'barang'               => 'required|string',
            'price'                => 'nullable',
            'total'                => 'required',
            'tanggal_masuk'        => 'required|date',
        ]);

        $product = Product::findOrFail($id);
        $products = $request->all();
        $products   = Sales::update([
            'customer_id'          => $data['customer_id'],
            'satuan_id'            => $data['satuan_id'],
            'kategori_id'          => $data['kategori_id'],
            'barang'               => $data['barang'],
            'price'                => (int)str_replace(',','',$data['price']),
            'total'                => $data['total'],
            'tanggal_masuk'        => $data['tanggal_masuk'],
        ]);

        return redirect()->route('sales.index')->with('success','Update Data pemesanan Berhasil');
    }


    public function destroy($id)
    {
        $data = Sales::findOrFail($id)->delete();
        return redirect()->route('sales.index')->with('delete','Delete Data pemesanan Berhasil');
    }
}
