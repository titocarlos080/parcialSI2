<div>
    <div class="row  d-flex">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="mt-0">MIS SUCURSALES DE PEDIDOS </h5>
                        <p class="sub-header"> innovacion y tecnologia</p>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0">

                                <thead class="table-info">
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>CIUDAD</th>
 

                                    </tr>
                                </thead>
                                <tbody class="table-active">
                                    @foreach($sucursales as $sucural)
                                    <tr>
                                        <td>{{$sucural->id}} </td>
                                        <td>{{$sucural->nombre}} </td>
                                        <td>{{$sucural->ciudad->nombre}} </td>

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