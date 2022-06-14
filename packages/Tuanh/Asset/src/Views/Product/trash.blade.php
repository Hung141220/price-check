@extends('user::layouts.app')
@section('title', 'Index user')
@section('active-user', 'active')
@section('content')
<h1>Trash product</h1>
    @if(isset($products) && count($products) > 0)
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
                            <form action="{{ route('product.un-trash') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-success">
                                    Restore
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