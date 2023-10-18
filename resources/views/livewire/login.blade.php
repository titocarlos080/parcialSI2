<x-app>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="/">
                                <!-- NOMBRE EMPRESA -->
                                <span>ECOMMERCE</span>
                            </a>
                        </div>

                        <h5 class="auth-title">Iniciar Sesión</h5>

                        <form   method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Correo Electrónico:</label>
                                <input class="form-control" name="email" type="email" id="email" value="{{ old('email') }}" placeholder="Ingrese su correo electrónico" autofocus>
                                @error('email')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-1">
                                <label for="password">Contraseña:</label>
                                <input class="form-control" name="password" type="password" id="password" placeholder="Ingrese su contraseña">
                                @error('password')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="col-12 text-right">
                                    <p> <a href="#" class="text-muted ml-1">¿Olvidaste tu contraseña?</a></p>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-dark btn-block" type="submit"> INGRESAR </button>
                            </div>

                        </form>
                        <div class="  text-center">
                            <a href="/registro" class="btn btn-success btn-block"> Registrarse </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</x-app>

