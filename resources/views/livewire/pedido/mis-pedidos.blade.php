<div>
    <div class="row">
        <a href="/productos/cliente">Volver</a>
    </div>
    <div class="row justify-content-center mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Nro Pedido</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count=0;
                @endphp
                @foreach($pedidos as $pedido)
                @php
                $count++;
                @endphp
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->usuario->nombre }}</td>
                    <td>{{ $pedido->estado->nombre }}</td>
                    <td> <a href="/reportes/pago/{{ $pedido->id }}">
                            <i class="bi bi-file-pdf pdf-icon"></i> Descargar PDF
                        </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>