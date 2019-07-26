<div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Nombre</label>
            <div class="col-md-6">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{$role->name}}"@error('name') placeholder="{{ $message }}" @enderror>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
