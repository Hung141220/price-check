@extends('user::layouts.app')
@section('title', 'Brand')
@section('asset', 'active')
@section('sub-menu1', 'active')
@section('content')
    <a type="button" href="{{ route('brand.create') }}" class="btn btn-primary">ADD</a>
    <a type="button" href="{{ route('brand.trash') }}" class="btn btn-primary">TRASH</a>
    @if(isset($brands) && count($brands) > 0)
        <h1>Brand</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Product</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>
                        @foreach ($brand->products as $product)
                            {{ $product->name }} <br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('brand.edit', ['id' => $brand->id]) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('brand.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $brand->id }}">
                            <button type="submit" class="btn btn-danger"
                                onclick="return(confirm('Do you want to continue?'));">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12">
            {{ $brands->links() }}
        </div>
    @endif
@endsection