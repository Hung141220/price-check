@extends('user::layouts.app')
@section('title', 'Edit menu')
@yield('menu', 'active')
@section('content')
    <div class="col-md-6">
        <form action="{{ route('menu.update') }}" method="post">
            @csrf
            <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" placeholder="Role nam" value="{{ $menu->id }}" > 
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Menu name" value="{{ $menu->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Permission</label><br>
                <select name="parent_id" class="form-control">
                    <option value="0">Chon danh muc</option>
                    {!! $optionSelects !!}
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Src</label>
                <input type="text" name="src" class="form-control" id="exampleInputEmail1" placeholder="Menu src" value="{{ $menu->src }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Icon</label>
                <input type="text" name="icon" class="form-control" id="exampleInputEmail1" placeholder="Menu icon" value="{{ $menu->icon }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush



@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){

        $('.select2_init').select2({
            placeholder: "Chose roles",
            allowClear: true
        });
        $('.select2_init2').select2({
            placeholder: "Chose permission",
            allowClear: true
        });
  
    });
</script>
@endpush