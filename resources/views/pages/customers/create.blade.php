@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Create Customers</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('customers.index') }}">
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
        <form action="{{route('customers.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
              {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Telephone</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Telephone">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
    </div>
</div> 

</div>
<!-- /.container-fluid -->
@endsection