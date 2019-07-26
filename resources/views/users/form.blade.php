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
                    class="form-control @error('email') is-invalid @enderror"
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
                <select name="rol" id="" class="form-control @error('rol') is-invalid @enderror">
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
