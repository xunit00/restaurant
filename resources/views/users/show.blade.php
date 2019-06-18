@extends('home')

@section('blade')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detalle de Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Lista Usuario</a></li>
                    <li class="breadcrumb-item active">Detalle Usuario</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<form action="{{route('manage_permissions',$user->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
            <div class="form-group">
                <strong>Username:</strong>
                {{ $user->username }}
            </div>
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->email }}
            </div>
            <div class="form-group">
                <strong>Rol:</strong>
                @foreach($roles as $rol=>$value)
                @if($user->hasRole($value))
                {{$value}}
                @endif
                @endforeach
            </div>
        </div>
    </section>
</div>

    <div class="form-group mt-2">
        <div class="row">
            <label class="col-md-2">Permisos</label>
            <div class="col-md-6">
                @error('permission')
                <label for="error">{{ $message }}</label>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label">Seleccionar Todo</label>
                </div>
            </div>
        </div>

        <div class="card">
            <section class="content">
                <div class="container-fluid">

                    @foreach($permissions as $permission=>$all)
                    <div class="form-check">
                        <input class="form-check-input @error('permission') is-invalid @enderror" type="checkbox"
                            name="permission[]" value="{{$all}}" @foreach($my_perm as $mp=>$value)
                        @if($all==$value) checked @endif
                        @endforeach>
                        <label class="form-check-label">{{$all}}</label>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Update">
    </div>
</form>
@endsection
