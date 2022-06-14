@extends('user::layouts.app')
@section('title', 'Index user')
@section('active-user', 'active')
@section('content')
    @if(isset($users) && count($users) > 0)
        <h1>Danh sach nguoi dung</h1>
        <a type="button" href="{{ route('user.create') }}" class="btn btn-primary">ADD</a>
        <a type="button" href="{{ route('user.trash') }}" class="btn btn-primary">TRASH</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>
                            @foreach ($user->roles as $role)
                                {{ $role->role_name }}
                            @endforeach
                        </td> --}}
                        <td>
                            <form action="{{ route('user.untrash') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
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
            {{ $users->links() }}
        </div>
    @endif
@endsection