@extends('user::layouts.app')
@section('title', 'Edit user')
@section('content')
    <div class="col-md-6">
        <form action="{{ route('user.update') }}" method="post">
            @csrf
            <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ $user->id }}" > 
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ $user->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ $user->email }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Roles</label><br>
                <select name="role_id[]" class="form-control select2_init" multiple>
                    <option value=""></option>
                    @foreach ($roles as $role)
                        <option 
                                {{ $rolesOfUser->contains('id', $role->id) ? 'selected' : '' }}
                                value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Roles</label><br>
                <select name="permission_id[]" class="form-control select2_init2" multiple>
                    <option value=""></option>
                    @foreach ($permissions as $permission)
                        <option 
                                {{ $permissionsOfUser->contains('id', $permission->id) ? 'selected' : '' }}
                                value="{{ $permission->id }}">{{ $permission->uri }} -- {{ $permission->method }}</option>
                    @endforeach
                </select>
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