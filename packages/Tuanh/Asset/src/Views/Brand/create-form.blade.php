@extends('user::layouts.app')
@section('title', 'Brand create')
@section('asset', 'active')
@section('sub-menu1', 'active')
@section('content')
<div class="col-md-6">
    <form action="{{ route('brand.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Products</label><br>
            <select name="product_id[]" class="form-control select2_init" multiple>
                <option value=""></option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success" type="submit">Create</button>
    </form>
</div>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush



@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){

        $('.select2_init').select2({
            placeholder: "Chose permissions",
            allowClear: true
        });
  
    });
</script>
@endpush