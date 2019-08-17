<div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Nombre</label>
            <div class="col-md-6"><input type="text" name="nombre" value="{{$unidad->nombre}}"
                    class="form-control @error('nombre') is-invalid @enderror"
                    @error('nombre') placeholder="{{ $message }}" @enderror></div>

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Descripcion</label>
            <div class="col-md-6"><input type="text" name="descripcion" value="{{$unidad->descripcion}}"
                    class="form-control @error('descripcion') is-invalid @enderror"
                    @error('descripcion') placeholder="{{ $message }}"@enderror></div>
            <div class="clearfix"></div>
        </div>
    </div>
