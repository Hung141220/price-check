@extends('user::layouts.app')
@section('title', 'Type')
@section('asset', 'active')
@section('sub-menu3', 'active')
@section('content')
    <a type="button" href="{{ route('type.create') }}" class="btn btn-primary">ADD</a>
    <a type="button" href="{{ route('type.trash') }}" class="btn btn-primary">TRASH</a>
    @if(isset($types) && count($types) > 0)
        <h1>Type</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Vehicle</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->vehicle->name }}</td>
                    <td>
                        <a href="{{ route('type.edit', ['id' => $type->id]) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('type.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $type->id }}">
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
            {{ $types->links() }}
        </div>
    @endif
@endsection