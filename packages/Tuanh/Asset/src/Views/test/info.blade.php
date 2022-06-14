@extends('user::layouts.app')
@section('title', 'Dinh gia xe')
@section('info', 'active')
@section('content')
    <h1 style="text-align: center">Thông tin định giá</h1>
    <div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product</td>
                    <td>{{ $info[0] }}</td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td>{{ $info[1] }}</td>
                </tr>
                <tr>
                    <td>Vehicle</td>
                    <td>{{ $info[2] }}</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>{{ $info[3] }}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>{{ $info[4] * 1000000 }}</td>
                </tr>
                <tr>
                    <td>Price loan</td>
                    <td>{{ $info[5] * 1000000 }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
