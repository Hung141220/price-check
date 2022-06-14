@extends('user::layouts.app')
@section('title', 'index')
@section('active-role', 'active')
@section('content')
{{-- <a type="button" href="{{ route('role.create') }}" class="btn btn-primary">ADD</a>
<a type="button" href="{{ route('role.trash') }}" class="btn btn-primary">TRASH</a> --}}
    @if(isset($permissions) && count($permissions) > 0)
        <h1>Danh sach</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>URI</td>
                    <td>METHOD</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->uri }}</td>
                        <td>{{ $permission->method }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12">
            {{ $permissions->links() }}
        </div>

    @endif
@endsection