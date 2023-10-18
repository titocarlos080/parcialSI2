<div>



    <div class="row  d-flex">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="mt-0">ADMINISTRACION DE PEDIDOS </h5>
                        <p class="sub-header"> innovacion y tecnologia</p>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0" id="btn-editable">
                                <thead>
                                    <tr>
                                        <th>NUMERO</th>
                                        <th>CLIENTE</th>
                                        <th>ESTADO</th>
                                        <th></th>

                                        <th class="tabledit-toolbar-column">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($pedidos as $pedido)
                                    <tr>
                                        <td><span class="tabledit-span tabledit-identifier">{{$pedido->id}}</span></td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">{{$pedido->usuario->nombre}}</span></td>
                                        <td>
                                              
                                            <select wire:change="actualizarEstado({{$pedido->id}})"  wire:model="id_estado" name="categoria" id="categoria">
                                                <option class="bg-primary text-bold text-white" value="{{ $pedido->estado->id }}">{{$pedido->estado->nombre }}</option>
                                                @foreach ($estados as $estado)
                                                <option wire:click="actualizarEstado()" value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                                @endforeach
                                            </select>
                                           
                                        <td class="tabledit-view-mode"><span class="tabledit-span"> {{$pedido->pago}}</span> </td>
                                        <td>
                                            <button wire:click="verDetalles({{$pedido->id}})" type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal"> Ver Pedido</button>
                                        </td>
                                        <td class="tabledit-view-mode">
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
        @if($detallepedido)

        <div id="modal" class="modal " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block; padding-right: 17px;" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content bg-gray-500">
                    <div class="modal-header">
                        <h4 class="modal-title">DETALLES DEL PEDIDO</h4>
                        <button onclick="cerrarModal()" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                    </div>
                    <div class="modal-body bg-emerald-500">
                        <label class="bg-soft-success">Pedido Nro:{{$pedidoSeleccionado}} </label>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-centered mb-0">

                                    <thead class="table-info">
                                        <tr>
                                            <th>PRODUCTO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO UNITARIO</th>
                                            <th>PRECIO_PARCIAL</th>


                                        </tr>
                                    </thead>
                                    <tbody class="table-active">
                                        @foreach($detallepedido as $detalle)
                                        <tr>
                                            <td>{{$detalle->id_producto}} </td>
                                            <td>{{$detalle->cantidad}} </td>
                                            <td>{{$detalle->precio}} </td>
                                            <td>{{$detalle->precio_parcial}} </td>
                                            {{$total+=$detalle->precio_parcial }}
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="table-primary">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <label for="">TOTAL: {{$total}} Bs</label>
                                            </th>
                                        </tr>
                                    </tfoot>


                                </table>


                            </div>
                        </div>

                    </div>
                </div>


                @else
                <span>no hay detalles</span>
                @endif


            </div>

        </div>





        <script>
            function cerrarModal() {
                const model = document.getElementById('modal');
                model.style.display = 'none'
            }

            function abrirModal(id) {
                console.log(id);
                const model = document.getElementById('modal');
                model.style.display = 'block'
            }
        </script>