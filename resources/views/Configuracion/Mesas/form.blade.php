<div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Nombre</label>
            <div class="col-md-6"><input type="text" name="nombre"
                value="{{$mesa->nombre}}" @error('nombre')
                placeholder="{{ $message }}" @enderror
                class="form-control @error('nombre') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Cubiertos</label>
            <div class="col-md-6"><input type="text" name="cubiertos"
                value="{{$mesa->cubiertos}}" @error('cubiertos')
                placeholder="{{ $message }}" @enderror
            class="form-control @error('cubiertos') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
            <div class="row">
                <label for="" class="col-md-3">Area</label>
                <div class="col-md-6">
                    <select name="area_id" class="form-control @error('area_id') is-invalid @enderror">
                        <option value="">Seleccionar Area</option>
                        @foreach($areas as $area=>$value)
                            @if($area==$mesa->area_id)
                            <option value="{{$area}}" selected>{{$value}}</option>
                            @else
                            <option value="{{$area}}">{{$value}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
