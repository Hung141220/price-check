@extends('user::layouts.app')
@section('title', 'Vehicle trash')
@section('asset', 'active')
@section('sub-menu2', 'active')
@section('content')
<h1>Trash vehicle</h1>
    @if(isset($vehicles) && count($vehicles) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->name }}</td>
                        <td>
                            <form action="{{ route('vehicle.un-trash') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $vehicle->id }}">
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
            {{ $vehicles->links() }}
        </div>
    @endif
@endsection