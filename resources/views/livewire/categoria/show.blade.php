<div>



    @foreach ($categorias as $categoria)
    <tr class="text-wrap text-center">
        <th scope="row" class="align-middle">{{ $categoria->id }}</th>
        <td class="align-middle text-left">{{ $categoria->nombre }}</td>
        <td class="align-middle">

            <span class="text-success py-1 px-2 rounded-lg" style="background-color: #c3e6cb">Disponible</span>

            <span class="text-danger py-1 px-2 rounded-lg" style="background-color: #f8d7da">Ocupado</span>

        </td>
        <td class="align-middle text-nowrap">
            <button type="button" title="Editar" wire:click=" " class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
            <button type="button" title="Eliminar" wire:click="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
        </td>
    </tr>
    @endforeach




    
</div>