<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Nombre</label>
        <div class="col-md-6"><input type="text" name="nombre" value="{{$producto->nombre}}"
                class="form-control @error('nombre') is-invalid @enderror"
                @error('nombre')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Unidad</label>
        <div class="col-md-6">
            <select name="unidad_id" id="" class="form-control @error('unidad_id') is-invalid @enderror">
                <option value="">Seleccionar Unidad</option>
                @foreach($unidades as $unid=>$value)
                @if($producto->unidad_id==$unid)
                <option value="{{$unid}}" selected>{{$value}}</option>
                @else
                <option value="{{$unid}}">{{$value}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Descripcion</label>
        <div class="col-md-6"><input type="text" name="descripcion" value="{{$producto->descripcion}}"
                class="form-control @error('descripcion') is-invalid @enderror"
                @error('descripcion')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Categoria</label>
        <div class="col-md-6">
            <select name="categoria_id" id="" class="form-control @error('categoria_id') is-invalid @enderror">
                <option value="">Seleccionar Categoria</option>
                @foreach($categorias as $cat=>$value)
                @if($producto->categoria_id==$cat)
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
        <label for="" class="col-md-3">Existencia Stock</label>
        <div class="col-md-6"><input type="text" name="existencia" value="{{$producto->existencia}}"
                class="form-control @error('existencia') is-invalid @enderror"
                @error('existencia')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Nivel Maximo Stock</label>
        <div class="col-md-6"><input type="text" name="maximo" value="{{$producto->maximo}}"
                class="form-control @error('maximo') is-invalid @enderror"
                @error('maximo')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Nivel Minimo Stock</label>
        <div class="col-md-6"><input type="text" name="minimo" value="{{$producto->minimo}}"
                class="form-control @error('minimo') is-invalid @enderror"
                @error('minimo')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Nivel Reorden Stock</label>
        <div class="col-md-6"><input type="text" name="reorden" value="{{$producto->reorden}}"
                class="form-control @error('reorden') is-invalid @enderror"
                @error('reorden')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Precio Compra</label>
        <div class="col-md-6"><input type="text" name="costo" value="{{$producto->costo}}"
                class="form-control @error('costo') is-invalid @enderror"
                @error('costo')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Precio Venta</label>
        <div class="col-md-6"><input type="text" name="precio_venta" value="{{$producto->precio_venta}}"
                class="form-control @error('precio_venta') is-invalid @enderror"
                @error('precio_venta')placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Imagen</label>
        <div class="col-md-6">
            <div class="custom-file">
                <input type="file" class="custom-file-input
                @error('imagen') is-invalid @enderror" name="imagen"
                value="{{$producto->imagen}}">
                <label class="custom-file-label" for="imagen">Choose file...</label>
                <div class="invalid-feedback">Error de Archivo</div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

