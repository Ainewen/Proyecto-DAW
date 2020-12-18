<!doctype html>
<!--Plantilla de la gestión interna de la aplicación web-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fabrica Colchones Zaragoza') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
    
    <!-- Bootstrap Core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../../css/business-casual.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../../../js/bootstrap.min.js"></script>
    <!--Editor html-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    <!--Script para confirmar borrado de registro-->
    <script>
      function confirmar ( mensaje ) {
        return confirm( mensaje );
      }
    </script>

    <!--Script para Añadir o quitar campos input dinamicamente-->
    <script type="text/javascript">
      $(document).ready(function(){
        var maxField = 10; //Limitation Incrementación de campos input limitado a 10 a la vez
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="form-group form-inline"><div class="field_wrapper"><input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control col-xs-1" required/><input type="text" name="medida[]" id="medida" placeholder="Medida" class="form-control col-xs-1" required/><input type="text" name="precio[]" id="precio" placeholder="Precio" class="form-control col-xs-1" required/><input type="text" name="precio_oferta[]" id="precio_oferta" placeholder="Precio Oferta" class="form-control col-xs-1"/><input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control col-xs-1" required/><a href="javascript:void(0);" class="remove_button"><img src="../../../img/iconos/remove-icon.png"/></a></div></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
      });
</script>
</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Fabrica Colchones Zaragoza') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->                     
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Desconectar') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>                      
                    </ul>
                </div>
            </div>
        </nav>
    <section class="text-center row">
       <div class="col-md-3">
            <nav id="mainNavbar" class="navbar navbar-dark bg-dark">
              <a class="navbar-brand" href="#">Menú Lateral</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navlinks" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navlinks">
                <ul class="navbar-nav mr-auto">
                    <!--MENU GESTION-->                    
                     <li class="nav-item">
                        <a class="nav-link" href="/tienda/gestion">Pantalla principal</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/tienda/articulos">Ver listado de Artículos</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/tienda/categorias">Ver listado de Categorías</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/tienda/pedidos">Ver listado de Pedidos</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/tienda/usuarios">Ver listado de Usuarios</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/tienda/formaspago">Ver listado de Formas de Pago</a>
                     </li>                         
                </ul>
              </div>
            </nav>
        </div>
            @yield('content')
      </div>
    </section> 
    <!--PIE DE LA PÁGINA-->
    <footer id="pie" class="mt-auto fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <p style="text-align:center">Copyright &copy; <span itemprop="url"><a href="http://www.fabricacolchoneszaragoza.es/">Fábrica Colchones Zaragoza</a></span> 2015
                <a href="politica-privacidad.html">Aviso Legal</a></p>
                    <ul>
                        <li><a href="https://www.facebook.com/pages/Fabrica-Colchones-Zaragoza/1914256232133466" class="fb"></a></li>
                        <li><a href="https://twitter.com/ColchonesZgz" class="tw"></a></li>
                        <li><a href="http://instagram.com/fabricacolchoneszaragoza/" class="in"></a></li>
                        <li><a href="http://www.pinterest.com/fabricacolchon/" class="pi"></a></li> 
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
 <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });
    </script>
</html>