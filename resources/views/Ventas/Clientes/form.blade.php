<div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Nombre</label>
            <div class="col-md-6"><input type="text" name="name" value="{{$cliente->name}}"
                    class="form-control @error('name') is-invalid @enderror"
                    @error('name') placeholder="{{ $message }}"@enderror></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
            <div class="row">
                <label for="" class="col-md-3">Usuario</label>
                <div class="col-md-6"><input type="text" name="username" value="{{$cliente->username}}"
                    class="form-control @error('username') is-invalid @enderror"
                        @error('username') placeholder="{{ $message }}"@enderror></div>
                <div class="clearfix"></div>
            </div>
        </div>

    <div class="form-group">
            <div class="row">
                <label for="" class="col-md-3">Dni</label>
                <div class="col-md-6"><input type="text" name="dni" value="{{$cliente->dni}}"
                    placeholder="Ej: 03600123012" class="form-control @error('dni') is-invalid @enderror"
                        @error('dni') placeholder="{{ $message }}"@enderror></div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="form-group">
                <div class="row">
                    <label for="" class="col-md-3">Telefono</label>
                    <div class="col-md-6"><input type="text" name="telefono" value="{{$cliente->telefono}}"
                        placeholder="Ej: 8091231234" class="form-control @error('telefono') is-invalid @enderror"
                            @error('telefono') placeholder="{{ $message }}"@enderror></div>
                    <div class="clearfix"></div>
                </div>
            </div>


        <div class="form-group">
                <div class="row">
                    <label for="" class="col-md-3">Direccion</label>
                    <div class="col-md-6"><input type="text" name="direccion" value="{{$cliente->direccion}}"
                            class="form-control @error('direccion') is-invalid @enderror"
                            @error('direccion') placeholder="{{ $message }}"@enderror></div>
                    <div class="clearfix"></div>
                </div>
            </div>

