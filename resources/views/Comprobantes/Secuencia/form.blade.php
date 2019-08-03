<div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Serie/Tipo</label>
            <div class="col-md-6">
                <select name="producto_id" id=""
                class="form-control @error('producto_id') is-invalid @enderror">
                <option value="">Seleccionar Serie/Tipo</option>
                @foreach($comprobanteTipo as $tipo=>$value)
                <option value="{{$tipo}}">{{$value}}</option>
                @endforeach
                </select>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Secuencia de Inicio</label>
            <div class="col-md-6"><input type="text" name="descripcion"@error('cantidad')
                placeholder="{{ $message }}" @enderror
                class="form-control @error('cantidad') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
            <div class="row">
                <label for="" class="col-md-3">Secuencia Final</label>
                <div class="col-md-6"><input type="text" name="descripcion"@error('cantidad')
                    placeholder="{{ $message }}" @enderror
                    class="form-control @error('cantidad') is-invalid @enderror"></div>
                <div class="clearfix"></div>
            </div>
        </div>
