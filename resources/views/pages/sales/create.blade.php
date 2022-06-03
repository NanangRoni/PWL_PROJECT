@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Create Pesanan</h1>
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
        <form action="{{route('sales.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Customer</label>
                        <select class="form-control lg" name="customer_id">
                            @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control lg" name="satuan_id">
                            @foreach ($satuan as $satuans)
                            <option value="{{$satuans->id}}">{{$satuans->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control lg" name="kategori_id">
                            @foreach ($categories as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Barang</label>
                        <input type="text" class="form-control" name="barang"  value={{ old('barang') }}>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk" value={{ old('tanggal_masuk') }}>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control input-element" name="price" value={{ old('price') }}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" name="total" value={{ old('total') }}>
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