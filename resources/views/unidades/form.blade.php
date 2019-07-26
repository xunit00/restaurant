<div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Nombre</label>
            <div class="col-md-6"><input type="text" name="nombre_unidad" value="{{$unidad->nombre_unidad}}"
                    class="form-control @error('nombre_unidad') is-invalid @enderror"
                    @error('nombre_unidad') placeholder="{{ $message }}" @enderror></div>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Descripcion</label>
            <div class="col-md-6"><input type="text" name="descripcion_unidad" value="{{$unidad->descripcion_unidad}}"
                    class="form-control @error('descripcion_unidad') is-invalid @enderror"
                    @error('descripcion_unidad') placeholder="{{ $message }}"@enderror></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Contenido</label>
            <div class="col-md-6"><input type="text" name="contenido" value="{{$unidad->contenido}}"
                    class="form-control @error('contenido') is-invalid @enderror"
                    @error('contenido') placeholder="{{ $message }}"@enderror></div>
            <div class="clearfix"></div>
        </div>
    </div>
