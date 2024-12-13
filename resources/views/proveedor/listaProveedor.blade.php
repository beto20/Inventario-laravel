<table  class="table table-striped">
    <thead align="center" class="bg-secondary text-white">
        <tr>
            <th colspan="7"><h3>Lista de Proveedores</h3></th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody align="center">
        @if(count($proveedores) >= 1)
            @foreach($proveedores as $proveedor)
                @if(Auth::check() && Auth::user()->id==$proveedor->user_id)
                    <tr>
                        <th>{{$proveedor->nom_empresa}}</th>
                        <th>{{$proveedor->correo}}</th>
                        <th>{{ "(".substr($proveedor->telefono, 0,2).")"." ".substr($proveedor->telefono,2,4)."-".substr($proveedor->telefono,6,5) }}</th>
                        <th>{{$proveedor->direccion}}</th>
                        <th>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editProveedor{{ $proveedor->id }}" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </th>
                        <th>
                            <form action="{{url('/eliminarProveedor/'.$proveedor->id)}}" method="post" style="margin:5px">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <!-- Botón en HTML (lanza el modal en Bootstrap)--> 
                                <a href="#modal{{$proveedor->id}}" role="button" class="btn btn-danger"data-toggle="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i></a>
                                <!-- Modal / Ventana / Overlay en HTML  -->

                                <div id="modal{{$proveedor->id}}" class="modal fade" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">¿Estás seguro?</h4>
                                                {{--'&times;' ES UNA 'X' PARA CERRAR EN BOOTSTRAP--}}
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Seguro que quieres borrar este proveedor?</p>
                                            <h3>{{$proveedor->nom_empresa}}</h3>
                                            <h6>{{$proveedor->rubro}}</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Borrar</button>  
                                                <button type="button" class="btn btn-warning"  data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </th>
                    </tr>
                @endif
                @include('proveedor.Modal.editarProveedor')
            @endforeach   
        @else
            <th class="alert-danger" colspan="6"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;No hay proveedores, agregue alguno</th><br>
        @endif
    </tbody>
</table>