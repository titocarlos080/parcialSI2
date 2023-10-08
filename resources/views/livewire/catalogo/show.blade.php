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
            <div class="d-flex">
                <div>
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="true">
                        Ciudades
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 70px, 0px);">
                        <!-- item-->
                        <button wire:click="sinCiudad" class="cursor-pointer dropdown-item">Todas las Ciudades</button>
                        @foreach ($ciudades as $ciudad)
                        <button wire:click="conCiudad( {{$ciudad->id}} )" class="cursor-pointer dropdown-item">{{ $ciudad->nombre }}</button>


                        @endforeach
                    </div>
                </div>

                <div>
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="true">
                        Sucursales
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 70px, 0px);">
                        <!-- item-->
                        <button wire:click="sinSucursal" class="cursor-pointer dropdown-item">Todas las sucursales</button>
                        @foreach ($sucursales as $sucursal)
                        <button wire:click="conSucursal( {{$sucursal->id}} )" class="cursor-pointer dropdown-item">{{ $sucursal->nombre }}</button>
                        @endforeach
                    </div>
                </div>
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
                                <img src="" alt="user-image" class="rounded-circle">
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


    <div class="content panel-body pt-5 ">

        <div class="d-block px-5 ">
            <div class="input-group app-search">
                <input type="text" wire:model.live='buscar' class="form-control" placeholder="Buscar..." />
                <button class="btn text-secondary"> <i class="fas fa-search"></i> </button>
            </div>
            <li class="dropdown d-none d-lg-block show">

                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="true">
                    Categorias
                    <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 70px, 0px);">
                    <!-- item-->
                    <button wire:click="sinCategoria" class="cursor-pointer dropdown-item">Todas la Categorias</button>
                    @foreach ($categorias as $categoria)
                    <button wire:click="conCategoria( {{$categoria->id}} )" class="cursor-pointer dropdown-item">{{ $categoria->nombre }}</button>
                    @endforeach
                </div>

            </li>
        </div>


        <div class="row m-3 flex-wrap" id="aqi">

            @if($switch)
            @foreach ($productosconcategoria as $producto)
            <div class="col-lg-6 col-xl-3">
                <div class="card ">
                    <h5 class="card-title text-center text-bold py-1">{{$producto->nombre}}</h5>
                    <div class="card-body">
                        <img class="img-fluid" src="" alt="Card image cap">
                        <h2 class="text-center">{{$producto->talla->nombre}}</h2>
                        <p class="card-text">{{$producto->descripcion}}</p>
                    </div>
                    <div class="card-footer center text-center">
                        <a href="javascript:void(0);" class="card-link text-custom"><i class=" fa fa-shopping-cart"></i></a>
                        <a wire:click="abrirProbador" href="javascript:void(0);" class="card-link text-custom"><i class=" fa fa-camera-retro"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            @if($productos_mostrar->isEmpty())

            <h5 class="text-center"> No hay productos</h5>


            @else
            @foreach ($productos_mostrar as $producto)
            <div class="col-lg-6 col-xl-3">
                <div class="card ">
                    <h5 class="card-title text-center text-bold py-1">{{$producto->nombre}}</h5>
                    <div class="card-body">
                        <img class="img-fluid" src="" alt="Card image cap">
                        <h2 class="text-center">{{$producto->talla->nombre}}</h2>
                        <h2 class="text-center">{{$producto->categoria->nombre}}</h2>
                        <p class="card-text">{{$producto->descripcion}}</p>
                    </div>
                    <div class="card-footer center text-center">
                        <a onclick="agregarAlCarrito('{{$producto}}')" href="javascript:void(0);" class="card-link text-custom"><i class=" fa fa-shopping-cart"></i></a>
                        <a onclick="activar()" href="javascript:void(0);" class="card-link text-custom"><i class=" fa fa-camera-retro"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            @endif


        </div>
    </div>

    @push('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function activar() {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then((stream) => {
                    var video = document.createElement('video');
                    video.srcObject = stream;
                    video.play();
                    var contenedorVideo = document.createElement('div');
                    contenedorVideo.appendChild(video);
                    var con = document.getElementById("aqi").appendChild(contenedorVideo);
                    console.log(stream);

                })
                .catch((error) => {
                    console.log('error al abrir camara');
                })

        }
        const carritoJSON = localStorage.getItem('carrito');
        const cant_products = carritoJSON ? JSON.parse(carritoJSON).length : 0
        document.getElementById('cantidad_carrito').innerHTML = cant_products

        function agregarAlCarrito(producto) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || []; // Obtener el carrito existente o crear uno nuevo si no existe
            carrito.push(producto); // Agregar el producto al carrito
            localStorage.setItem('carrito', JSON.stringify(carrito));
            document.getElementById('cantidad_carrito').innerHTML = JSON.parse(localStorage.getItem('carrito')).length
        }




        document.addEventListener('livewire:load', () => {

            Livewire.on('abrirCamara', () => {
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then((stream) => {


                    })
                    .catch((error) => {
                        console.log('Error al abrir la camara');
                    });

            });
        });
    </script>
    @endpush

</div>