
@extends('layouts.app')
@section('content')
<!--Vista de la página principal de la gestión interna del la aplicación web-->
	<div class="container">
        <div class="row text-center">
			<h1 class="titulo mx-auto">GESTION INTERNA FABRICA COLCHONES</h1>
			<!--Mostrar si hay más formaciones-->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left">
					<div class="accordion" id="accordionExample">
					  <div class="card">
					  		<h4>Seleccione la opción deseada</h4>
						<div class="card-header mt-2" id="headingOne">
						  <h2 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Articulos
							</button>
						  </h2>
						</div>
						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						  <div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<a class="btn btn-primary btn-block" href="articulos" role="button">
											Ver Listado de Artículos
										</a> 			
									</div>	
								</div>
						  	</div>
						</div>
					  </div>

					  <div class="card">
						<div class="card-header" id="headingTwo">
						  <h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							 Categorías
							</button>
						  </h2>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						  <div class="card-body">
						  		<div class="row">
									<div class="col-md-12">
										<a class="btn btn-primary btn-block" href="categorias" role="button">
											Ver Listado de Categorías
										</a> 			
									</div>	
								</div>
							</div>
						  </div>					
						</div>

						<div class="card">
						 <div class="card-header" id="headingFour">
						  <h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							  Pedidos
							</button>
						  </h2>
						</div>
							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
							  <div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<a class="btn btn-primary btn-block" href="pedidos" role="button">
											Ver Listado de Pedidos
										</a> 			
									</div>	
								</div>	
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" id="headingFive">
						  <h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
							 Usuarios
							</button>
						  </h2>
						</div>
							<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
							  <div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<a class="btn btn-primary btn-block" href="usuarios" role="button">
										Ver Listado de Usuarios	
										</a> 			
									</div>	
								</div>
							  </div>
						</div>
					</div>

					<div class="card">
						 <div class="card-header" id="headingThree">
						  <h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  Forma de Pago
							</button>
						  </h2>
					</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						  <div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<a class="btn btn-primary btn-block" href="formaspago" role="button">
										Ver Listado de Formas de Pago
									</a> 			
								</div>	
							</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>	
     </div>

@endsection('content')