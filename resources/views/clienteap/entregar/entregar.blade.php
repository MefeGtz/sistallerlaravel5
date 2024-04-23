@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<center><h3>Listado de Aparatos a Entregar </h3></center>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
		<br>
		<br>
			<table class="table table-striped table-bordered table-condensed table-hover dt-responsive " id="tabla">
				<thead>
					<th width="10px" >Id</th>
					<th>Nombre-Apellido</th>
					<th>Dirección</th>
					<th>Telefono</th>
					<th>Aparato</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>F-Ingreso</th>
					<th>F-Entrega</th>
                    <th>Imagen</th>
					<th>Cobro</th>
					<th>Opciones</th>
				</thead>
				<tbody>
               @foreach ($cliente_aparato as $cat)
				<tr>
					<td>{{$envio=$cat->idclienteaparato}}</td>
					<td>{{ $cat->nombre_apellido}}</td>
					<td>{{ $cat->direccion}}</td>
                    <td>{{ $cat->telefono}}</td>
					<td>{{ $cat->aparato}}</td>
                    <td>{{ $cat->marca}}</td>
					<td>{{ $cat->modelo}}</td>
                    <td>{{ $cat->descripcion}}</td>
                    <td>{{ $cat->estado}}</td>
					<td>{{ $cat->f_ingreso}}</td>
					<td>{{ $cat->f_entrega}}</td>
                    <td><a href="" data-target="#modal-imagen-{{$envio}}" data-toggle="modal">
					 <img src="{{asset('imagenes/cliente_aparato/'.$cat->imagenaparato)}}"
					  alt="{{$cat->imagenaparato}}" height="180px" width="130px" class="img-thumbnail" 
					  style="cursor:zoom-in"  ></a>
					 </td>
                    <td>{{ $cat->cobro}}</td>
					<td>
                         <a href="" data-target="#modal-delete-{{$envio}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
					</td>
                </tr>	
				@include('clienteap/entregar/show')		
				@include('clienteap/entregar/modal')	
				@endforeach		
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
