@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Edit Pesanan</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('sales.index') }}">
            <i class="fas fa-arrow-circle-left"> Back</i>
           
        </a>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <div class="card-body">
        <form action="{{route('customers.update',$data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Customer</label>
                        <select class="form-control" name="customer_id" style="width: 100%">
                            @foreach ($customers as $customer)
                            @if($customer->id == $data->customer_id)
                            @php($select = 'selected')
                            @else
                                @php($select = '')
                            @endif
                            <option {{$select}} value="{{$customer->id}}">{{$customer->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control" name="satuan_id" style="width: 100%">
                            @foreach ($satuans as $satuan)
                            @if($satuan->id == $satuan->name)
                            @php($select = 'selected')
                            @else
                                @php($select = '')
                            @endif
                            <option {{$select}} value="{{$satuan->id}}">{{$satuan->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori_id" style="width: 100%">
                            @foreach ($categories as $kategori)
                            @if($kategori->id == $kategori->name)
                            @php($select = 'selected')
                            @else
                                @php($select = '')
                            @endif
                            <option {{$select}} value="{{$kategori->id}}">{{$kategori->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Barang</label>
                        <input type="text" class="form-control" name="barang" value={{ $data->barang }}>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk" value={{ $data->tanggal_masuk }}>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control input-element" name="price" id="price" value={{ $data->price }}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" name="total" value={{ $data->total }}>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
    </div>
</div> 

</div>
<!-- /.container-fluid -->
<script type="application/javascript">
    $(document).ready(function () {
        var cleave = new Cleave('.input-element', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    });
</script>
@endsection