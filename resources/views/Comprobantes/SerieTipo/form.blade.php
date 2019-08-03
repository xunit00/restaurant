<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Serie/Tipo</label>
        <div class="col-md-6"><input type="text" name="serie_tipo"
            value="{{$comprobanteTipo->serie_tipo}}" @error('serie_tipo')
            placeholder="{{ $message }}" @enderror
            class="form-control @error('serie_tipo') is-invalid @enderror"></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Descripcion</label>
            <div class="col-md-6"><input type="text" name="descripcion"
                value="{{$comprobanteTipo->descripcion}}" @error('descripcion')
                placeholder="{{ $message }}" @enderror
                class="form-control @error('descripcion') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>
