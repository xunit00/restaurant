<div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Nombre</label>
            <div class="col-md-6"><input type="text" name="name" value="{{$user->name}}"
                    class="form-control @error('name') is-invalid @enderror"
                    @error('name') placeholder="{{ $message }}"@enderror></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
            <div class="row">
                <label for="" class="col-md-3">Dni</label>
                <div class="col-md-6"><input type="text" name="dni" value="{{$user->dni}}"
                    placeholder="Ej: 03600123012" class="form-control @error('dni') is-invalid @enderror"
                        @error('dni') placeholder="{{ $message }}"@enderror></div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="form-group">
                <div class="row">
                    <label for="" class="col-md-3">Telefono</label>
                    <div class="col-md-6"><input type="text" name="telefono" value="{{$user->telefono}}"
                        placeholder="Ej: 8091231234" class="form-control @error('telefono') is-invalid @enderror"
                            @error('telefono') placeholder="{{ $message }}"@enderror></div>
                    <div class="clearfix"></div>
                </div>
            </div>


        <div class="form-group">
                <div class="row">
                    <label for="" class="col-md-3">Direccion</label>
                    <div class="col-md-6"><input type="text" name="direccion" value="{{$user->direccion}}"
                            class="form-control @error('direccion') is-invalid @enderror"
                            @error('direccion') placeholder="{{ $message }}"@enderror></div>
                    <div class="clearfix"></div>
                </div>
            </div>


    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Usuario</label>
            <div class="col-md-6"><input type="text" name="username" value="{{$user->username}}"
                    class="form-control @error('username') is-invalid @enderror"
                    @error('username') placeholder="{{ $message }}"@enderror></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Correo</label>
            <div class="col-md-6"><input type="text" name="email" value="{{$user->email}}"
                placeholder="test@mail.com" class="form-control @error('email') is-invalid @enderror"
                    @error('email') placeholder="{{ $message }}"@enderror></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Password</label>
            <div class="col-md-6"><input type="password" name="password" value="{{$user->password}}"
                    class="form-control @error('password') is-invalid @enderror"
                    @error('password') placeholder="{{ $message }}"@enderror></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-3">Rol</label>
            <div class="col-md-6">
                <select name="rol" id="roles" class="form-control @error('rol') is-invalid @enderror">
                    @foreach($roles as $rol=>$value)
                    @if($user->hasRole($value))
                    <option value="{{$rol}}" selected>{{$value}}</option>
                    @else
                    <option value="{{$rol}}">{{$value}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
