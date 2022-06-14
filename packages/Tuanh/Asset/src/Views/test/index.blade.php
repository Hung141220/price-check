@extends('user::layouts.app')
@section('title', 'Dinh gia xe')
@section('info', 'active')
@section('content')
    <h1>Thông tin định giá</h1>
    <form action="{{ route('info.submit') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Product</label><br>
            <select name="product_id" class="form-control" id="product">
                <option value="">Chose product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Brand</label><br>
            <select name="brand_id" class="form-control" id="brand">
                <option value="">Chose brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Vehicle</label><br>
            <select name="vehicle_id" class="form-control" id="vehicle">
                <option value="">Chose vehicle</option>
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                @endforeach
            </select>
            @error('vehicle_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Type</label><br>
            <select name="type_id" class="form-control" id="type">
                <option value="">Chose type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Type</label><br>
            <select name="year" class="form-control">
                <option value="">Chose year</option>

                @for ($i = 2010; $i <= 2022; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('type_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
@push('js')
<script>
    $(function () {
        //brand
        $('#product').change(function () {
            var product_id = $(this).val();
            var url = '/asset/brand/' + product_id + '/get';
            console.log(url);
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                success: function (res) {
                    var html = '';
                    html += "<option value=''>" + "Chose brand" + "</option>";
                    $('#brand').empty();
                    res.forEach(element => {
                        html += "<option value='" + element.id + "'>" + element.name + "</option>"
                        // console.log(html);
                    });
                    $('#brand').append(html);
                },
                error: function (res) {
                    console.log(res);
                }
            });
        });

        //vehicle
        $('#brand').change(function () {
            var brand_id = $(this).val();
            var url = '/asset/vehicle/' + brand_id + '/get';
            console.log(url);
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                success: function (res) {
                    var html = '';
                    html += "<option value=''>" + "Chose vehicle" + "</option>";
                    $('#vehicle').empty();
                    res.forEach(element => {
                        html += "<option value='" + element.id + "'>" + element.name + "</option>"
                        // console.log(html);
                    });
                    $('#vehicle').append(html);
                },
                error: function (res) {
                    console.log(res);
                }
            });
        });

        //type
        $('#vehicle').change(function () {
            var vehicle_id = $(this).val();
            var url = '/asset/type/' + vehicle_id + '/get';
            console.log(url);
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                success: function (res) {
                    var html = '';
                    html += "<option value=''>" + "Chose type" + "</option>";
                    $('#type').empty();
                    res.forEach(element => {
                        html += "<option value='" + element.id + "'>" + element.name + "</option>"
                        // console.log(html);
                    });
                    $('#type').append(html);
                },
                error: function (res) {
                    console.log(res);
                }
            });
        });
    });
</script>
@endpush
