<div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Nombre</label>
            <div class="col-md-6"><input type="text" name="nombre"
                value="{{$receta->nombre}}" @error('nombre')
                placeholder="{{ $message }}" @enderror
                class="form-control @error('nombre') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Descripcion</label>
            <div class="col-md-6"><input type="text" name="descripcion"
                value="{{$receta->descripcion}}" @error('descripcion')
                placeholder="{{ $message }}" @enderror
            class="form-control @error('descripcion') is-invalid @enderror"></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Porciones</label>
            <div class="col-md-6">
                <input type="text" name="porciones" placeholder="" class="form-control"></div>
            <div class="clearfix"></div>
        </div>
    </div>


    <div class="form-group">
        <div class="row">
            <label for="" class="col-md-2">Contiene:</label>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Add</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">
                            <select name="producto" class="form-control">
                                <option value="0" disabled>Seleccionar Producto</option>
                                <option value=""></option>
                            </select>
                        </th>
                        <td>
                            <input type="text" name="cantidad" class="form-control">
                        </td>
                        <td>
                            <a class="btn btn-outline-success" href="">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



