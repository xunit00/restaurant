<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Nombre</label>
        <div class="col-md-6"><input type="text" name="nombre"
            value="{{$catInsumo->nombre}}" @error('nombre')
            placeholder="{{ $message }}" @enderror
            class="form-control @error('nombre') is-invalid @enderror"></div>

        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Descripcion</label>
        <div class="col-md-6"><input type="text" name="descripcion"
            value="{{$catInsumo->descripcion}}" @error('descripcion')
            placeholder="{{ $message }}" @enderror
        class="form-control @error('descripcion') is-invalid @enderror"></div>
        <div class="clearfix"></div>
    </div>
</div>
