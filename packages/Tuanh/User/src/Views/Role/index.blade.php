@extends('user::layouts.app')
@section('title', 'index')
@section('active-role', 'active')
@section('content')
<a type="button" href="{{ route('role.create') }}" class="btn btn-primary">ADD</a>
<a type="button" href="{{ route('role.trash') }}" class="btn btn-primary">TRASH</a>
    @if(isset($roles) && count($roles) > 0)
        <h1>Danh sach nguoi dung</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Role name</td>
                    <td>Permission</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->role_name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                {{ $permission->uri }} - {{ $permission->method }} <br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('role.edit', ['id' => $role->id]) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('role.delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $role->id }}">
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
            {{ $roles->links() }}
        </div>

    @endif
@endsection