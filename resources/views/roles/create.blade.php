@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Agregar Rol</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Lista Roles</a></li>
                    <li class="breadcrumb-item active">Agregar Rol</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@include('partials.errors-create')

<!-- /.content-header -->
<div class="card" id="app">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-md-2">Nombre</label>
                        <div class="col-md-6"><input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" @error('name')
                                placeholder="{{ $message }}" @enderror></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                {{-- @include('layouts.permisos') --}}

                <div class="container">
                    <div class="form-group mt-2">
                        <div class="row">
                            <label class="col-md-2">Permisos</label>
                            <div class="col-md-6">
                                @error('permission')
                                <label for="error">{{ $message }}</label>
                                @enderror
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onClick="selectAll(this)">
                                    <label class="form-check-label">Seleccionar Todo</label>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <section class="content">
                                <div class="container-fluid">
                                    @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input @error('permission') is-invalid @enderror"
                                            type="checkbox" name="permission[]" value="{{$permission->name}}">
                                        <label class="form-check-label">{{$permission->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </section>
</div>
<script lang="javascript">
    function selectAll(source){
   	checkboxes = document.getElementsByName('permission[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
}
</script>
@endsection
