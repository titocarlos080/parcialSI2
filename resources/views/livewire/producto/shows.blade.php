<div>
    @if($crearProducto)
    <livewire:producto.create>
        @elseif($editarProducto)
        <livewire:producto.edit>

            @else

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title">Gestionar Producto</h4>
                        <button wire:click='nuevoProducto' class="btn btn-success"><i class="fa fa-plus">Nuevo Producto</i></button>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>IDENTIFICADOR</th>
                                        <th>NOMBRE</th>
                                        <th>IMAGEN</th>
                                        <th>DESCRIPCION</th>
                                        <th>STOCK</th>
                                        <th>PRECIO</th>
                                        <th>CATEGORIA</th>
                                        <th>TALLA</th>
                                        <th>SUCURSAL</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                    <tr>
                                        <td> {{$producto->id}}</td>
                                        <td> {{$producto->nombre}}</td>

                                        <td>
                                            @if ($producto->imagen)
                                            <img src="{{ $producto->imagen }}" height="64" width="64" alt="Imagen del producto">
                                            @else
                                            <img src="{{ asset('storage/imagenes/default.jpg') }}" alt="Imagen predeterminada">
                                            @endif
                                        </td>
                                        <td> {{$producto->descripcion}}</td>
                                        @if ($producto->stock == 0) 
                                        <td class="bg-danger text-white">{{ $producto->stock }} AGOTADO</td>
                                        @elseif ($producto->stock <= 5)
                                        <td class="bg-warning text-white">{{ $producto->stock }} SUMINISTAR</td>
                                            @else
                                            <td class="bg-success text-white">{{ $producto->stock }} DISPONIBLE</td>
                                            @endif
                                            <td> {{$producto->precio}}</td>
                                            <td> {{$producto->categoria->nombre}}</td>
                                            <td> {{$producto->talla->nombre}}</td>
                                            <td> {{$producto->sucursal->nombre}}</td>
                                            <td> <button class="btn btn-primary">Editar</button>
                                                <button class="btn btn-danger">Eliminar</button>
                                            </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card-box -->
                </div> <!-- end col -->


            </div>


            @endif




</div>