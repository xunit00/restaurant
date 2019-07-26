<div class="form-group mt-2">
    <div class="row">
        <label class="col-md-2">Permisos</label>
        <div class="col-md-6">

            <div class="form-check my-1 mr-sm-2">
                <input type="checkbox" class="form-check-input" onClick="selectAll(this)">
                <label class="form-check-label">Seleccionar Todo</label>
            </div>

        </div>
    </div>

    <div class="card mt-2">
        <section class="content">
            <div class="container-fluid mt-2">

                @foreach($permissions as $permission=>$all)
                <div class="form-check my-1 mr-sm-2">
                    <input type="checkbox" class="form-check-input" @error('permission')
                        is-invalid @enderror name="permission[]" value="{{$all}}" @foreach($my_perm as $mp=>$value)
                    @if($all==$value) checked @endif @endforeach>
                    <label class="form-check-label">{{$all}}</label>
                </div>
                @endforeach

            </div>
        </section>
    </div>
</div>
<script lang="javascript">
    function selectAll(source){
   	checkboxes = document.getElementsByName('permission[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
}
</script>
