<div class="form-group">
    <div class="row">
        <label for="" class="col-md-3">Nombre</label>
        <div class="col-md-6"><input type="text" name="name" value="{{$permission->name}}"
            class="form-control @error('name') is-invalid @enderror"
             @error('name')placeholder="{{ $message }}"@enderror></div>
        <div class="clearfix"></div>
    </div>
</div>
