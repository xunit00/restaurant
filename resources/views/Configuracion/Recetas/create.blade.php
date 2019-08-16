@extends('home')

@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Agregar Receta</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{route('recetas.index')}}">Lista Receta</a></li>
                    <li class="breadcrumb-item active">Agregar Receta</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

{{-- <create-receta productos="{{ $productos}}"></create-receta> --}}

@include('partials.errors-create')

<!-- /.content-header -->
<div class="card">
    <section class="content">
        <div class="container-fluid mt-3">
            <form action="{{route('recetas.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('configuracion.recetas.form')

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    $(document).ready(function(){
            var count=1;

            dynamic_field(count);

            function dynamic_field(number)
            {
                 var html='<tr>';
                    html+='<td> imput</td>';
                    html+='<td><input type="text" name="cantidad[]" class="form-control"></td>';
                    if(number>1)
                    {
                        html+='<td><button type="button" name="remove" id="remove" class="btn btn-danger">Remove</button></td></tr>';
                        $('tbody').append(html);
                    }
                    else
                    {
                        html+='<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                        $('tbody').html(html);
                    }
            }
            $('#add').click(function(){
                count++;
                dynamic_field(count);
            });
            $(document).on('click','#remove',function(){
                count--;
                dynamic_field(count);
            });
            $('#dynamic_form').on('submit',function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{ route("")}}'
                })
            });
        });
</script>
@endsection
