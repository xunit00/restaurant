@extends('home')
@section('blade')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               
               

            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                    <!-- <li class="breadcrumb-item active">Lista de Estadistica</li> -->
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Probabilidades/Promedios Cola</h3>

            @include('partials.success-alert')
            <!--mensaje de exito proceso-->

            <div class="card-tools row">
            <div class="col-md-8">
                <input type="number" placeholder="Numero De Clientes" id="n_clientes" class="form-control">
            </div>
            <div class="col-md-4">
                <button class="btn btn-success" onclick="get_data( $('#n_clientes').val() )">
                    Generar
                </button>
            </div>
            
                <!-- <form action="{{route('search.transacciones')}}">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="value" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <h2 id="p0"></h2>
          <h2 id="pn"></h2>
          <h2 id="wq"></h2>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
           
           
        </div>
    </div>
</div>

<script>
function get_data(valor){

if(valor == 0){
    valor =1;
}

    if(! (Number.isInteger(parseInt(valor, 10))) ){
        alert();
        return 0;
    }

    $.ajax({
            method:"POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:  window.location+"/get_data",
            data: { pn: valor }
        }).done(function( data ) {
            if(data.status == "200"){
                $("#p0").html("Probabilidad De Haber Cero Personas En Cola: <b>"+data.p0+"</b>");
                $("#pn").html("Probabilidad De Haber <b>"+valor+"</b> Personas En Cola: <b>"+data.pn+"</b>");
                $("#wq").html("Promedio De Tiempo Que Duras Para Servirle: <b>"+data.wq+"</b>");

            }else{
                alert(data.message);
            }
    });

}
</script>

@endsection
