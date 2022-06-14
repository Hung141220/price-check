@extends('user::layouts.app')
@section('title', 'Type trash')
@section('asset', 'active')
@section('sub-menu3', 'active')
@section('content')
<h1>Trash vehicle</h1>
    @if(isset($types) && count($types) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <form action="{{ route('type.un-trash') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $type->id }}">
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
            {{ $types->links() }}
        </div>
    @endif
@endsection