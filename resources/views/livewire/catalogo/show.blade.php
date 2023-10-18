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

                                @auth
                                <a href="/mis_pedidos/{{$user->id}}" class="cursor-pointer dropdown-item">
                                    <i class="fa fa-history"></i> 
                                         <span> Mis Pedidos</span>
                                </a>
                                @endauth


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
                <input class="form-control" placeholder="Buscar..." />
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
                        <img class="img-fluid" src="{{$producto->imagen}}" alt="Card image cap">
                        <h2 class="text-center">{{$producto->talla->nombre}}</h2>
                        <h2 class="text-center">{{$producto->categoria->nombre}}</h2>
                        <p class="card-text">{{$producto->descripcion}}</p>
                    </div>
                    <div class="card-footer center text-center">
                        <button onclick="agregarAlCarrito('{{$producto}}')" class="card-link btn btn-success"><i class=" fa fa-shopping-cart"></i></button>
                        <a onclick="activateXR()" href="javascript:void(0);" class="card-link text-custom"><i class=" fa fa-camera-retro"></i></a>
                    </div>
                </div>


            </div>
            @endforeach
            @endif
            @endif


        </div>
    </div>



    @push('js')

    <script src="htt ps://unpkg.com/three@0.126.0/build/three.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const cantidad = () => {
            let carritos = JSON.parse(localStorage.getItem('carrito')) || [];
            let cant_products = 0
            carritos.forEach((fila) => {
                const pdto = JSON.parse(fila);
                cant_products = cant_products + pdto.cantidad
            })
            return cant_products
        }

        document.getElementById('cantidad_carrito').innerHTML = cantidad()

        function agregarAlCarrito(productox) {
            const producto = JSON.parse(productox);
            const prod = {
                id: producto.id,
                nombre: producto.nombre,
                imagen: producto.imagen,
                descripcion: producto.descripcion,
                precio: producto.precio,
                talla: producto.talla,
                categoria: producto.categoria,
                cantidad: 1,
                subtotal: 1 * producto.precio
            }
            let carrito = JSON.parse(localStorage.getItem('carrito')) || []; // Obtener el carrito existente o crear uno nuevo si no existe          
            let nuevo_carrito = []
            carrito.forEach((fila) => {
                const pdto = JSON.parse(fila);
                if (pdto.id === prod.id) {
                    prod.cantidad = pdto.cantidad + 1
                } else {
                    nuevo_carrito.push(JSON.stringify(pdto))
                }
            })
            nuevo_carrito.push(JSON.stringify(prod))
            localStorage.setItem('carrito', JSON.stringify(nuevo_carrito));
            document.getElementById('cantidad_carrito').innerHTML = cantidad();
        }





        // async function activateXR() { // Initialize a WebXR session using "immersive-ar".
        //     const session = await navigator.xr.requestSession("immersive-ar");
        //     session.updateRenderState({
        //         baseLayer: new XRWebGLLayer(session, gl)
        //     });

        //     // A 'local' reference space has a native origin that is located
        //     // near the viewer's position at the time the session was created.
        //     const referenceSpace = await session.requestReferenceSpace('local');
        //     // Add a canvas element and initialize a WebGL context that is compatible with WebXR.
        //     const canvas = document.createElement("canvas");
        //     document.body.appendChild(canvas);
        //     const gl = canvas.getContext("webgl", {
        //         xrCompatible: true
        //     });


        //     // To be continued in upcoming steps.

        //     const scene = new THREE.Scene();

        //     // The cube will have a different color on each side.
        //     const materials = [
        //         new THREE.MeshBasicMaterial({
        //             color: 0xff0000
        //         }),
        //         new THREE.MeshBasicMaterial({
        //             color: 0x0000ff
        //         }),
        //         new THREE.MeshBasicMaterial({
        //             color: 0x00ff00
        //         }),
        //         new THREE.MeshBasicMaterial({
        //             color: 0xff00ff
        //         }),
        //         new THREE.MeshBasicMaterial({
        //             color: 0x00ffff
        //         }),
        //         new THREE.MeshBasicMaterial({
        //             color: 0xffff00
        //         })
        //     ];

        //     // Create the cube and add it to the demo scene.
        //     const cube = new THREE.Mesh(new THREE.BoxBufferGeometry(0.2, 0.2, 0.2), materials);
        //     cube.position.set(1, 1, 1);
        //     scene.add(cube);
        //     // Set up the WebGLRenderer, which handles rendering to the session's base layer.
        //     const renderer = new THREE.WebGLRenderer({
        //         alpha: true,
        //         preserveDrawingBuffer: true,
        //         canvas: canvas,
        //         context: gl
        //     });
        //     renderer.autoClear = false;

        //     // The API directly updates the camera matrices.
        //     // Disable matrix auto updates so three.js doesn't attempt
        //     // to handle the matrices independently.
        //     const camera = new THREE.PerspectiveCamera();
        //     camera.matrixAutoUpdate = false;


        //     // Create a render loop that allows us to draw on the AR view.
        //     const onXRFrame = (time, frame) => {
        //         // Queue up the next draw request.
        //         session.requestAnimationFrame(onXRFrame);

        //         // Bind the graphics framebuffer to the baseLayer's framebuffer
        //         gl.bindFramebuffer(gl.FRAMEBUFFER, session.renderState.baseLayer.framebuffer)

        //         // Retrieve the pose of the device.
        //         // XRFrame.getViewerPose can return null while the session attempts to establish tracking.
        //         const pose = frame.getViewerPose(referenceSpace);
        //         if (pose) {
        //             // In mobile AR, we only have one view.
        //             const view = pose.views[0];

        //             const viewport = session.renderState.baseLayer.getViewport(view);
        //             renderer.setSize(viewport.width, viewport.height)

        //             // Use the view's transform matrix and projection matrix to configure the THREE.camera.
        //             camera.matrix.fromArray(view.transform.matrix)
        //             camera.projectionMatrix.fromArray(view.projectionMatrix);
        //             camera.updateMatrixWorld(true);

        //             // Render the scene with THREE.WebGLRenderer.
        //             renderer.render(scene, camera)
        //         }
        //     }
        //     session.requestAnimationFrame(onXRFrame);




        // }

        // function activar() {
        //     navigator.mediaDevices.getUserMedia({
        //             video: true
        //         })
        //         .then((stream) => {
        //             var video = document.createElement('video');
        //             video.srcObject = stream;
        //             video.play();
        //             var contenedorVideo = document.createElement('div');
        //             contenedorVideo.appendChild(video);
        //             var con = document.getElementById("aqi").appendChild(contenedorVideo);
        //             console.log(stream);

        //         })
        //         .catch((error) => {
        //             console.log('error al abrir camara');
        //         })

        // }






        // document.addEventListener('livewire:load', () => {

        //     Livewire.on('abrirCamara', () => {
        //         navigator.mediaDevices.getUserMedia({
        //                 video: true
        //             })
        //             .then((stream) => {


        //             })
        //             .catch((error) => {
        //                 console.log('Error al abrir la camara');
        //             });

        //     });
        // });
    </script>
    @endpush

</div>