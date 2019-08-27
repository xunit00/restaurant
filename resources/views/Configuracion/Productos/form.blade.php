<div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Nombre</label>
            <div class="col-md-6"><input type="text" name="nombre"
                value="{{$producto->nombre}}" @error('nombre')
                placeholder="{{ $message }}" @enderror
                class="form-control @error('nombre') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Descripcion</label>
            <div class="col-md-6"><input type="text" name="descripcion"
                value="{{$producto->descripcion}}" @error('descripcion')
                placeholder="{{ $message }}" @enderror
            class="form-control @error('descripcion') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Categoria</label>
            <div class="col-md-6">
                <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
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
            <label for="" class="col-md-3">Precio</label>
            <div class="col-md-6"><input type="text" name="precio"
                value="{{$producto->precio}}" @error('precio')
                placeholder="{{ $message }}" @enderror
            class="form-control @error('precio') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>
