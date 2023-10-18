 <div>
     <style>
         .my_cart_quantity {
             top: -10px;
             /* Ajusta la posición vertical según tu diseño */
             right: -10px;
             /* Ajusta la posición horizontal según tu diseño */
             background-color: red;
             /* Color de fondo del contador */
             color: white;
             /* Color del texto del contador */
             border-radius: 50%;
             /* Hace que el contador tenga forma circular */
             padding: 4px 8px;
             /* Espaciado interno del contador */
         }
     </style>

     <div class="navbar-custom">

         <div class="d-flex justify-content-between">
             <div>
                 <a href="/productos/cliente" class="cursor-pointer  btn btn-primary"><i class="fa-arrow-left"></i> Seguir comprando</a>

             </div>
             <div class="ml-auto">
                 <div class="d-flex">
                     <div class="topnav-menu float-md-right mb-0">

                         <div class="o_wsale_my_cart align-self-md-start nav-item mx-lg-3">
                             <a href="{{route('realizar_pedido')}}" class="nav-link" data-bs-original-title="" title="mi carrito">
                                 <i class="fa fa-shopping-cart"></i>
                                 <sup id="cantidad_carrito" class="my_cart_quantity badge text-bg-primary" data-order-id="">0</sup>
                             </a>
                         </div>

                     </div>
                     <ul class="list-unstyled topnav-menu   mb-0">
                         <li class="dropdown notification-list">
                             <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                 <img src="/assets/images/user_1.jpg" alt="user-image" class="rounded-circle">
                                 <span class="pro-user-name ml-1"> <i class="la la-angle-down"></i>
                                 </span>
                             </a>


                             <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                 <!-- item-->
                                 <div class="dropdown-item noti-title">
                                     <h5 class="m-0 text-white">
                                         Bienvenido !
                                     </h5>
                                 </div>

                                 <!-- item-->
                                 @php
                                 $user= Auth::user();

                                 @endphp
                                 <a href="#" class="dropdown-item notify-item">
                                     <i class="fe-user"></i>
                                     @auth <span> {{$user->nombre}}</span>
                                     @endauth
                                     @guest
                                     <span> Mi Perfil</span>
                                     @endguest
                                 </a>

                                 <!-- item-->
                                 @auth
                                 <a href="/mis_pedidos/{{$user->id}}" class="cursor-pointer dropdown-item">
                                     <i class="fa fa-history"></i>
                                     <span> Mis Pedidos</span>
                                 </a>
                                 @endauth
                                 @guest
                                 <a href="/login" class="dropdown-item notify-item">
                                     <i class="fa fa-acount"></i>
                                     <span>Login</span>
                                 </a>
                                 @endguest
                                 <div class="dropdown-divider"></div>

                                 <!-- item-->
                                 @auth
                                 <form method="POST" action="{{ route('logout') }}">
                                     @csrf
                                     <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="this.closest('form').submit()">
                                         <i class="fe-log-out"></i>
                                         <span>Cerrar Sesión</span>
                                     </a>
                                 </form>
                                 @endauth
                             </div>
                         </li>
                     </ul>


                 </div>
             </div>
         </div>
     </div>

     <div class="row pt-5">
         <div class="col mx-5 ">
             <div class="form-group">
                 <label for="metodo_pago" class="control-label">Eligir Metodo Pago</label>
                 <select class="form-control" wire:model="id_metodo_pago" name="metodo_pago" id="metodo_pago">
                     <option disabled value="">Seleccionar</option>
                     @foreach($metodoPagos as $metodo)
                     <option value="{{$metodo->id}}">{{$metodo->nombre}}</option>
                     @endforeach
                 </select>
             </div>
             <div id="modal-pago" class="modal " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block; padding-right: 17px;" aria-modal="true">
                 <div class="modal-dialog">
                     <div class="modal-content bg-gray-500">
                         <div class="modal-header">
                             <h4 class="modal-title" id="TituloPago"> </h4>
                             <button onclick="cerrarModalPago()" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                         </div>
                         <div class="modal-body bg-emerald-500">
                             <div class="row">
                                 <div class="col-md-6">
                                     <!-- FORMULARIO efectivo -->
                                     <div id="formulario_efectivo">
                                         <form action="#" method="post">
                                             @csrf
                                             <div class="form-group mb-3">
                                                 <label>Ciudad:</label>
                                                 <input class="form-control" name="ciudad" type="text" value="" placeholder="Ciudad" autofocus="">

                                             </div>
                                             <div class="form-group mb-3">
                                                 <label for="email">Calle:</label>
                                                 <input class="form-control" name="calle" type="text" placeholder="Direccion de envio">

                                                 <label for="email">Numero:</label>
                                                 <input class="form-control" name="numero" type="number" id="tel">
                                             </div>
                                             
                                             <input style="display: none;"   name="id_metodo" type="number" id="id_metodo_efectivo">
                                             <button class="btn btn-success" type="submit">Pagar efectivo</button>

                                         </form>
                                     </div>
                                     <!-- fORMULARIO tarjeta -->
                                     <div id="tarjeta">
                                         <form action="#" method="post">
                                             @csrf
                                             <input style="display: none;"  name="id_metodo" type="number" id="id_metodo_tarjeta">
                                             <button class="btn btn-success" type="submit">Pagar targeta</button>

                                         </form>
                                     </div>
                                     <!-- FORMULARIO QRtransferencia -->
                                     <div id="formulario_QRtransferencia">
                                         <form action="#" method="post">
                                             @csrf
                                             <div class="form-group mb-3">
                                              
                                             <img src="/assets/images/imegenqr.jpg" width="50%" height="50%" alt="img" >
        
                                            </div>
                                             <input style="display: none;" name="id_metodo" type="number" id="id_metodo_qr">
                                             <button class="btn btn-success" type="submit">Pagar Qr</button>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <label for="metodo_pago" class="control-label">Mis Direcciones</label>
                 <select class="form-control" wire:model="direccion_selecionado" name="direcion" id="mi_direccion">
                 <option disabled value="">Selecionar direccion</option>
                 @foreach( $direcciones as $direccion)
                 <option value="{{$direccion->id}}">{{$direccion->ciudad}}, {{$direccion->calle}}, {{$direccion->numero}}</option>
                 @endforeach
                 </select>
                 <div>
                     <div class="card-box">
                         <button class="btn btn-primary" onclick="abrirModal()">Nueva Direccion</button>
                         @if(session('success'))
                         <div class="alert alert-success">
                             {{ session('success') }}
                         </div>
                         @endif

                         @if(session('error'))
                         <div class="alert alert-danger ">
                             {{ session('error') }}
                         </div>
                         @endif
                         <div id="modal" class="modal " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block; padding-right: 17px;" aria-modal="true">
                             <div class="modal-dialog">
                                 <div class="modal-content bg-gray-500">
                                     <div class="modal-header">
                                         <h4 class="modal-title">NUEVA DIRECCION</h4>
                                         <button onclick="cerrarModal()" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                                     </div>
                                     <div class="modal-body bg-emerald-500">

                                         <div class="row">
                                             <div class="col-md-6">
                                                 <form action="/nueva_direccion" method="post">
                                                     @csrf


                                                     <div class="form-group mb-3">
                                                         <label for="nombre">Ciudad:</label>
                                                         <input class="form-control" name="ciudad" type="text" value="" placeholder="Ciudad" autofocus="">

                                                     </div>
                                                     <div class="form-group mb-3">
                                                         <label for="email">Calle:</label>
                                                         <input class="form-control" name="calle" type="text" placeholder="Direccion de envio">

                                                         <label for="email">Numero:</label>
                                                         <input class="form-control" name="numero" type="number" id="tel">
                                                     </div>
                                                     <button class="btn btn-success" type="submit"> Guardar Direccion</button>
                                                 </form>


                                             </div>
                                         </div>

                                     </div>
                                 </div>

                             </div>

                         </div>


                     </div> <!-- end card-box-->
                 </div>
             </div>


         </div>
         <div class=" col">
             <div class="table-wrapper">
                 <div class="btn-toolbar">
                     <div class="btn-group focus-btn-group">
                         <div class="table-responsive" data-pattern="priority-columns">



                             <h3><span>MI CARRITO</span></h3>
                             <div class="table-responsive">
                                 <table class="table table-bordered table-hover mb-0">
                                     <thead class="bg-dark text-white text-nowrap">
                                         <tr>
                                             <th>ID</th>
                                             <th>NOMBRE</th>
                                             <th>IMAGEN</th>
                                             <th>DESCRIPCION</th>
                                             <th>PRECIO</th>
                                             <th>TALLA</th>
                                             <th>CANTIDAD</th>
                                             <th>SUB_TOTAL</th>
                                             <th>ACCION</th>

                                         </tr>

                                     </thead>
                                     <tbody id="tabla_carrito">

                                     </tbody>
                                 </table>
                                 <div>
                                     @if(session('pedido'))
                                     <div class="alert alert-success">
                                         {{ session('pedido') }}
                                         
                                         <a href="/reportes/pago/{{ session('pedido_id') }}">Descargar PDF</a>
                                          <script>
                                            localStorage.removeItem('carrito')
                                          </script>
                                        </div>
                                     @endif

                                     @if(session('nopedido'))
                                     <div class="alert alert-danger ">
                                         {{ session('nopedido') }}
                                     </div>
                                     @endif
                                 </div>

                                 <form action="/realizar_pago" method="post">
                                     @csrf
                                     <textarea style="display: none;" name="carrito" id="carrito" cols="30" rows="10">
                                    </textarea>
                                     <button id="btnRealizarcompra" type="submit" class="btn btn-success"> Finalizar compra </button>

                                 </form>
                             </div>
                         </div>


                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script>
         //----------------------------------------------------------------------------
         var selectElement = document.getElementById('metodo_pago');
         // Agrega un evento onchange al select
         selectElement.addEventListener('change', function() {
             // Obtiene el valor seleccionado
             var selectedValue = selectElement.value;
             var selectedText = selectElement.options[selectElement.selectedIndex].text;
             document.getElementById('formulario_efectivo').style.display = 'none';
             document.getElementById('tarjeta').style.display = 'none';
             document.getElementById('formulario_QRtransferencia').style.display = 'none';
            if (selectedValue == 1) {
                 document.getElementById('id_metodo_efectivo').value = selectedValue;
                 document.getElementById('TituloPago').textContent = selectedText;
                 document.getElementById('formulario_efectivo').style.display = 'block';

             } else if (selectedValue == 2) {
                 document.getElementById('id_metodo_tarjeta').value = selectedValue;
                 document.getElementById('TituloPago').textContent = selectedText;
                 document.getElementById('tarjeta').style.display = 'block';
             } else if (selectedValue == 3){
                 document.getElementById('id_metodo_qr').value = selectedValue;
                 document.getElementById('TituloPago').textContent = selectedText;
                 document.getElementById('formulario_QRtransferencia').style.display = 'block';
                 
             }
             // Realiza acciones con el valor seleccionado, por ejemplo, abre un modal
             const model = document.getElementById('modal-pago');
             model.style.display = 'block'
         });

         cerrarModalPago();

         function cerrarModalPago() {
             // Aquí puedes abrir el modal o realizar cualquier acción con el valor seleccionado
             const model = document.getElementById('modal-pago');
             model.style.display = 'none'
         }







         //----------------------------------------------------------------------------

         document.addEventListener("DOMContentLoaded", function() {
             document.getElementById("carrito").value = productos();
         });

         function productos() {
             const carritoJSON = JSON.parse(localStorage.getItem('carrito'));
             return JSON.stringify(carritoJSON);
         };


         const tablaCarrito = document.getElementById('tabla_carrito')
         const carritoJSON = localStorage.getItem('carrito');
         const carrito = JSON.parse(carritoJSON);
         var i = 0,
             aux = 0;
         carrito.forEach((productoStrim) => {
             i++
             const producto = JSON.parse(productoStrim);
             aux = aux + producto.cantidad;
             const fila = document.createElement('tr');
             fila.innerHTML = `
                       <td>${i}</td>
                       <td>${producto.nombre}</td>
                       <td>
                       <img src="${producto.imagen}" alt="prod" round  height="64" width="64"  srcset="">
                        </td>
                       <td>${producto.descripcion}</td>
                       <td>${producto.precio} Bs</td>
                       <td>${producto.talla.nombre}</td>
                       <td>${producto.cantidad}</td>
                       <td>${producto.cantidad*producto.precio} Bs</td>
                       <td> <a onclick="eliminar(${producto.id})"  >         <i class="btn btn-danger">X</i>
                        </a>
                        </td>  

                       `;
             tablaCarrito.appendChild(fila);
         })
         document.getElementById('cantidad_carrito').innerHTML = aux

         if (aux == 0) {
             document.getElementById('btnRealizarcompra').style.display = 'none';
             document.getElementById('tabla_carrito').style.innerHTML = 'No hay pedidio';

         } else {
             document.getElementById('btnRealizarcompra').style.display = 'blok';
         }

         function eliminar(id) {
             localStorage.removeItem('carrito');
             let carrito_nuevo = JSON.parse(localStorage.getItem('carrito')) || []; // Obtener el carrito existente o crear uno nuevo si no existe
             let cant = 0;
             carrito.forEach((productoStrim) => {
                 const producto = JSON.parse(productoStrim);
                 if (producto.id != id) {
                     carrito_nuevo.push(JSON.stringify(producto))
                     cant = producto.cantidad + cant
                 }
             })
             localStorage.setItem('carrito', JSON.stringify(carrito_nuevo));
             location.reload();
         }

         function cerrarModal() {
             const model = document.getElementById('modal');
             model.style.display = 'none'
         }

         function abrirModal(id) {

             const model = document.getElementById('modal');
             model.style.display = 'block'
         }
         cerrarModal();
     </script>
 </div>