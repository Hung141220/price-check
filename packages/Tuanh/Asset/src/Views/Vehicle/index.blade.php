@extends('user::layouts.app')
@section('title', 'Vehicle')
@section('asset', 'active')
@section('sub-menu2', 'active')
@section('content')
    <a type="button" href="{{ route('vehicle.create') }}" class="btn btn-primary">ADD</a>
    <a type="button" href="{{ route('vehicle.trash') }}" class="btn btn-primary">TRASH</a>
    @if(isset($vehicles) && count($vehicles) > 0)
        <h1>Product</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Brand</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->name }}</td>
                    <td>{{ $vehicle->brand->name }}</td>
                    <td>
                        <a href="{{ route('vehicle.edit', ['id' => $vehicle->id]) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('vehicle.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $vehicle->id }}">
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
            {{ $vehicles->links() }}
        </div>
    @endif
@endsection