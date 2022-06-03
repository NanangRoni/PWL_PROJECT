@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Update Product</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('products.index') }}">
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
        <form action="{{route('products.update',$data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleInputEmail1">Deskripsi</label>
              <input type="text" name="description" value="{{$data->description}}" class="form-control" placeholder="Masukkan Deskripsi">
              {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Satuan</label>
                <input type="text" name="satuan" value="{{$data->satuan}}" class="form-control" placeholder="Masukkan Satuan">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga</label>
                <input type="text" name="harga" value="{{$data->harga}}" class="form-control" placeholder="Masukkan Harga">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
</div> 

</div>
<!-- /.container-fluid -->
@endsection