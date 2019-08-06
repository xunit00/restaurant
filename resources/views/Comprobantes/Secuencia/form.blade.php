<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Serie/Tipo</label>
        <div class="col-md-6">
            <select name="comprobante_id" class="form-control @error('comprobante_id') is-invalid @enderror">
                <option value="">Seleccionar Serie/Tipo</option>
                @foreach($comprobanteTipo as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Secuencia de Inicio</label>
        <div class="col-md-6"><input type="text" name="secuencia_inicial" @error('secuencia_inicial') placeholder="{{ $message }}"
                @enderror class="form-control @error('secuencia_inicial') is-invalid @enderror"></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Secuencia Final</label>
        <div class="col-md-6"><input type="text" name="secuencia_final" @error('secuencia_final') placeholder="{{ $message }}"
                @enderror class="form-control @error('secuencia_final') is-invalid @enderror"></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Fecha de Expiracion</label>
        <div class="col-md-6"><input type="date" name="fecha_expiracion" max="3000-12-31" min="1000-01-01"
                class="form-control"></div>
        <div class="clearfix"></div>
    </div>
</div>
