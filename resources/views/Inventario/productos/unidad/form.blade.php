<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Producto</label>
            <div class="col-md-6">
                <select name="producto_id"
                class="form-control @error('producto_id') is-invalid @enderror">
                    <option value="">Seleccionar Producto</option>
                    @foreach($productos as $prod=>$value)
                        @foreach($prod_unidad->productos as $prod_u)
                            @if($prod==$prod_u->id)
                            <option value="{{$prod}}" selected>{{$value}}</option>
                            @else
                            <option value="{{$prod}}">{{$value}}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
            </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Unidad</label>
            <div class="col-md-6">
                <select name="unidad_id" id=""
                class="form-control @error('unidad_id') is-invalid @enderror">
                    <option value="">Seleccionar Unidad</option>
                    @foreach($unidades as $unidad=>$value)
                        @if($prod_unidad->id==$unidad)
                            <option value="{{$unidad}}" selected>{{$value}}</option>
                        @else
                            <option value="{{$unidad}}">{{$value}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Cantidad</label>
        <div class="col-md-6"><input type="text" name="cantidad" value="{{$prod_u->pivot->cantidad}}"
        class="form-control @error('cantidad') is-invalid @enderror" @error('cantidad')
        placeholder="{{ $message }}" @enderror></div>

        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Precio de Venta</label>
    <div class="col-md-6"><input type="text" name="precio_venta" value="{{$prod_u->pivot->precio_venta}}"
                class="form-control @error('precio_venta') is-invalid @enderror" @error('precio_venta')
                placeholder="{{ $message }}" @enderror></div>

        <div class="clearfix"></div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Costo</label>
        <div class="col-md-6"><input type="text" name="costo"value="{{$prod_u->pivot->costo}}"
                class="form-control @error('costo') is-invalid @enderror" @error('costo')
                placeholder="{{ $message }}" @enderror></div>
        <div class="clearfix"></div>
    </div>
</div>
