@extends('user::layouts.app')
@section('title', 'Product')
@section('asset', 'active')
@section('sub-menu', 'active')
@section('content')
    <a type="button" href="{{ route('product.create') }}" class="btn btn-primary">ADD</a>
    <a type="button" href="{{ route('product.trash') }}" class="btn btn-primary">TRASH</a>
    @if(isset($products) && count($products) > 0)
        <h1>Product</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('product.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
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
            {{ $products->links() }}
        </div>
    @endif
@endsection