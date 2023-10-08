<div class="mt-5 text-center justify-content-center">
    @if($pagar)
    <div class="row">
        <div class="col">
            <select name="Metodo de pago" id="">
                <option value="">Transferencia Bancaria</option>
                <option value="">Transferencia QR</option>
            </select>
        </div>
        <div class="col">
            <select name="Metodo de pago" id="">
                <option value=""></option>
            </select>
        </div>
    </div>
 
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-0">
            <thead class="bg-dark text-white text-nowrap">
                <tr >
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>IMAGEN</th>
                    <th>DESCRIPCION</th>
                    <th>CATEGORIA</th>
                    <th>TALLA</th>

                </tr>

            </thead>
            <tbody id="tabla_carrito">

            </tbody>
        </table>
        <a wire:click=realizarPedido  class="btn btn-success"> Realizar Pedido </a>

    </div>
    @endif
    <script>
        const tablaCarrito = document.getElementById('tabla_carrito')
        const carritoJSON = localStorage.getItem('carrito');
        const carrito =   JSON.parse(carritoJSON);
       console.log(carrito);
        carrito.forEach((   productoStrim) => {
            const producto= JSON.parse(productoStrim);
             const fila = document.createElement('tr');
            fila.innerHTML = `
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td>${producto.imagen}</td>
                            <td>${producto.descripcion}</td>
                            <td>${producto.categoria.nombre}</td>
                            <td>${producto.talla.nombre}</td>                   
                            `;
            tablaCarrito.appendChild(fila);
        })
    </script>

</div>