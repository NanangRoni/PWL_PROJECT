<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){

        $data = Customer::all();
        return view('pages.customers.index',compact('data'));
    }

    public function create(){

        return view('pages.customers.create');
    }

    public function store(Request $request){

        $request->validate([
            'nama'      => 'required|unique:customers,nama',
            'alamat'    => 'required',
            'no_hp'     => 'required|numeric|unique:customers,no_hp'
        ]);

        $data       = $request->all();
        $customer   = Customer::create($data);

        return redirect()->route('customers.index')->with('success','Input Data Customers Berhasil');
    }

    public function edit($id){

        $data = Customer::findOrFail($id);

        return view('pages.customers.edit',compact('data'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'nama'      => 'required|unique:customers,nama,'.$id,
            'no_hp'     => 'required|numeric|unique:customers,no_hp,'.$id,
            'alamat'    => 'required'
        ]);

        $customer = Customer::findOrFail($id);
        $data     = $request->all();

        $customer->update($data);

        return redirect()->route('customers.index')->with('success','Update Data Customers Berhasil');
    }

    public function destroy($id){

        $customer = Customer::findOrFail($id)->delete();

        return redirect()->route('customers.index')->with('delete','Delete Data Customers Berhasil');
    }
}
