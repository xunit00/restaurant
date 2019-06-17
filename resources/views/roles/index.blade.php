@extends('home')
@section('blade')
    <div class="container mt-2">
      <a class="btn btn-success" href="{{route('roles.create')}}">
        Add New
        <i class="fa fa-user-plus"></i>
      </a>
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title">Lista de Roles</h3>

         @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <p>{{ session('success') }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input
                type="text"
                name="table_search"
                class="form-control float-right"
                placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Modyfy</th>
              </tr>
              @foreach($roles as $rol)
              <tr>
                <td>{{$rol->id}}</td>
                <td>{{$rol->name}}</td>
                <td>
                    @can('update.permissions')
                    {{-- <a class="btn btn-outline-secondary btn-sm" href="{{route('permissions.edit',$permission->id)}}"> --}}
                        <i class="fa fa-edit"></i>
                    </a>
                    @endcan
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{$rol->links()}} --}}
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  @endsection
