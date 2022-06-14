@extends('user::layouts.app')
@section('title', 'Menu')
@section('menu', 'active')
@section('content')
<a type="button" href="{{ route('menu.create') }}" class="btn btn-primary">ADD</a>
<h1>Danh sach Menu</h1>
    @if(isset($menus) && count($menus) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Src</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->src }}</td>
                        <td>
                            <a href="{{ route('menu.edit', ['id' => $menu->id]) }}" class="btn btn-success">edit</a>
                            <form action="{{ route('menu.delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $menu->id }}">
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
            {{ $menus->links() }}
        </div>
    @endif
@endsection