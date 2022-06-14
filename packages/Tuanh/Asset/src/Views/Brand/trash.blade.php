@extends('user::layouts.app')
@section('title', 'Brand trash')
@section('asset', 'active')
@section('sub-menu1', 'active')
@section('content')
<h1>Trash brand</h1>
    @if(isset($brands) && count($brands) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <form action="{{ route('brand.un-trash') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $brand->id }}">
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
            {{ $brands->links() }}
        </div>
    @endif
@endsection