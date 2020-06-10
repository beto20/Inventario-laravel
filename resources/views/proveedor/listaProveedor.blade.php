
    <center>
            <table border="1" style="text-align:center">
                <thead>
                    <tr>
                        <th>nom_empresa</th>
                        <th>descripcion</th>
                        <th>rubro</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                @if(count($proveedores) >= 1)

                    @foreach($proveedores as $proveedor)
                        @if(Auth::check() && Auth::user()->id==$proveedor->user_id)
                        <tbody>
                            <tr>
                                <th>{{$proveedor->nom_empresa}}</th>
                                <th>{{$proveedor->descripcion}}</th>
                                <th>{{$proveedor->rubro}}</th>
                                
                                <th>
                                    
                                        <a href="{{ route('detallesProveedor',['proveedor_id' => $proveedor->id ] )}}" class="btn btn-success" style="margin:5px">Ver</a>
                                        <br>
                                        <a href="{{ route('editarProveedor',['proveedor_id' => $proveedor->id ] )}}" class="btn btn-warning" style="margin:5px">Editar</a>
                                        <br>
                                    
                                    <form action="{{url('/eliminarProveedor/'.$proveedor->id)}}" method="post" style="margin:5px">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    <!-- Botón en HTML (lanza el modal en Bootstrap)--> 
                                        <a href="#modal{{$proveedor->id}}" role="button" class="btn btn-danger"data-toggle="modal">Eliminar</a>
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
                                                    <h3>{{$proveedor->rubro}}</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn button-primary"  data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger">Borrar</button>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </th>
                            </tr>
                        </tbody>
                        @endif
                    @endforeach   
                @else
                    <div class="alert-danger">No hay proveedores, agregue alguno</div>
                @endif

            </table>
    </center>