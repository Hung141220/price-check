@extends('user::layouts.app')
@section('title', 'index')
@section('active', 'active')
@section('content')
    @auth
        <h1>Hello {{ auth()->user()->name }}</h1>
    @endauth
    {{-- @if(isset($posts) && count($posts) > 0)
    <h1>Post</h1>
    <table>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>
                    <a href="{{ route('post.show',['id' => $post->id]) }}">Show</a>
                </td>
            </tr>            
        @endforeach
    </table>
    @else
    <h1>Index</h1>
    @endif --}}

@endsection