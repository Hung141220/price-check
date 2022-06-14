@extends('user::layouts.app')
@section('title', 'Index user')
@section('active-role', 'active')
@section('content')
    @if(isset($roles) && count($roles) > 0)
        <h1>Danh sach quyen</h1>
        <a type="button" href="{{ route('user.create') }}" class="btn btn-primary">ADD</a>
        <a type="button" href="{{ route('user.trash') }}" class="btn btn-primary">TRASH</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->role_name }}</td>
                        <td>
                            <form action="{{ route('role.untrash') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $role->id }}">
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
            {{ $roles->links() }}
        </div>
    @endif
@endsection