<div>

    <div class="row flex-wrap">

        <div class="col-md-3">
            <div class="form-group">
                <label for="categoria" class="control-label">Categorias</label>
                <select class="form-control" wire:model="id_categoria" name="categoria" id="categoria">
                    <option value="">Seleccionar</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="talla" class="control-label">Tallas</label>
                <select class="form-control" wire:model="id_talla" name="talla" id="talla">
                    <option value="">Seleccionar</option>
                    @foreach ($tallas as $talla)
                    <option value="{{ $talla->id }}">{{ $talla->nombre }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="sucursal" class="control-label">Sucursal</label>
                <select class="form-control" wire:model="id_sucursal" name="sucursal" id="sucursal">
                    <option value="">Seleccionar</option>
                    @foreach ($sucursales as $sucursal)
                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-12 ">
            <label>
                <span>Nombre</span>

                <input type="text" wire:model="nombre">
            </label><br>
            <label>
                <span>Descripcion</span>
                <textarea wire:model="descripcion"></textarea>
            </label><br>
            <label>
                <span>Stock</span>
                <input type="number" min="0" wire:model="stock"></input>
            </label><br>
            <label>
                <span>Precio</span>
                <input type="number" min="0" wire:model="precio" accept="image/jpeg,image/png,image/gif"></input>
            </label><br>
            <label>
                <span>Imagen</span>
                <input type="file" wire:model="foto"></input>
            </label>
        </div>
        <div class="form-group text-right m-b-0">
            <button type="button" wire:click="cancelar" wire:loading.attr="disabled" class="btn btn-danger waves-effect m-l-5">
                Cancelar
            </button>
            <button class="btn btn-primary waves-effect waves-light" wire:click="guardarProducto" wire:loading.attr="disabled" type="button">
                Guardar
            </button>
        </div>
    </div>

</div>