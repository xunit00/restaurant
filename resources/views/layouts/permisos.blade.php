<div class="form-group mt-2">
    <div class="row">
        <label class="col-md-2">Permisos</label>
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox"
                 id="miCheckBox" name="miCheckBox"  onClick="miCheckBox()">
                <label class="form-check-label">Seleccionar Todo</label>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <div style="visibility:hidden">cuadro de permisos</div>
        <section class="content">
            <div class="container-fluid">

                @foreach($permissions as $permission=>$all)
                <div class="form-check">
                    <input class="form-check-input @error('permission') is-invalid @enderror" type="checkbox"
                        name="permission[]" value="{{$all}}" @foreach($my_perm as $mp=>$value)
                    @if($all==$value) checked @endif
                    @endforeach>
                    <label class="form-check-label">{{$all}}</label>
                </div>
                @endforeach
            </div>
            <div style="visibility:hidden">final:cuadro de permisos</div>
        </section>
    </div>
</div>
<script>
$("#miCheckBox").click(()=>{$("input[type=checkbox]").prop("checked",true)})
</script>
