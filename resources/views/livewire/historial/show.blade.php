<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="mt-0"> HISTORIAL DE PEDIDOS </h5>
                    <p class="sub-header"> innovacion y tecnologia</p>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0" id="btn-editable">
                            <thead>
                                <tr>
                                    <th>NUMERO</th>
                                    <th>CLIENTE</th>
                                    <th>ESTADO</th>
                                    <th></th>


                                </tr>
                            </thead>

                            <tbody>
                                @foreach($pedidos as $pedido)
                                <tr>
                                    <td><span class="tabledit-span tabledit-identifier">{{$pedido->id}}</span></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{$pedido->id_usuario}}</span></td>
                                    <td>

                                    <td class="tabledit-view-mode"><span class="tabledit-span"> {{$pedido->id_estado }}</span> </td>
                                    <td>
                                        <a href="/dashboard/confirmar_pedido/ {{$pedido->id}}"> Ver Pedido </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>



</div>