
<center>
        <table border="1" style="text-align:center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            @if(count($inventarios) >= 1)

                @foreach($inventarios as $inventario)
                    @if(Auth::check() && Auth::user()->id==$inventario->user_id)
                    <tbody>
                        <tr>
                            
                            <th>{{$inventario->nombre}}</th>
                            <th>{{$inventario->descripcion}}</th>
                            
                            <th>
                                <a href="{{ route('detallesInventario',['inventario_id' => $inventario->id ] )}}" class="btn btn-success" style="margin:5px">Detalles</a>
                                <br>
                                <a href="{{ route('editarInventario',['inventario_id' => $inventario->id ] )}}" class="btn btn-warning" style="margin:5px">Editar</a>
                                <br>
                                <a href="{{ route('inicioArticulos',['inventario_id' => $inventario->id ] )}}" class="btn btn-info" style="margin:5px">Entrar</a>
                                <br>

                                <form action="{{url('/eliminarInventario/'.$inventario->id)}}" method="post" style="margin:5px">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                <!-- Botón en HTML (lanza el modal en Bootstrap)--> 
                                    <a href="#modal{{$inventario->id}}" role="button" class="btn btn-danger"data-toggle="modal">Eliminar</a>
                                    <!-- Modal / Ventana / Overlay en HTML  -->

                                    <div id="modal{{$inventario->id}}" class="modal fade" >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">¿Estás seguro?</h4>
                                                    {{--'&times;' ES UNA 'X' PARA CERRAR EN BOOTSTRAP--}}
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Seguro que quieres borrar este inventario?</p>
                                                <h3>{{$inventario->nombre}}</h3>
                                                <h3>{{$inventario->descripcion}}</h3>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn button-primary"  data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Borrar</button>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </>
                        </tr>
                    </tbody>
                    @endif
                @endforeach   
                @else
                    <div class="alert-danger">No hay inventarios, agregue alguno</div>
                @endif

        </table>
</center>