<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Nombre</label>
        <div class="col-md-6"><input type="text" name="nombre_producto" value="{{$producto->nombre_producto}}"
                class="form-control @error('nombre_producto') is-invalid @enderror"
                @error('nombre_producto')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Descripcion</label>
        <div class="col-md-6"><input type="text" name="descripcion_producto" value="{{$producto->descripcion_producto}}"
                class="form-control @error('descripcion_producto') is-invalid @enderror"
                @error('descripcion_producto')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Categoria</label>
        <div class="col-md-6">
            <select name="id_categoria" id="" class="form-control @error('id_categoria') is-invalid @enderror">
                <option value="">Seleccionar Categoria</option>
                @foreach($categorias as $cat=>$value)
                @if($producto->id_categoria==$cat)
                <option value="{{$cat}}" selected>{{$value}}</option>
                @else
                <option value="{{$cat}}">{{$value}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Imagen</label>
        <div class="col-md-6">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
