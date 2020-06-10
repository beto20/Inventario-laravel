
<center>
        <table border="1" style="text-align:center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Descripcion</th>
                    <th>Precio de venta</th>
                    <th>Stock minimo</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            @if(count($articulos) >= 1)

                @foreach($articulos as $articulo)
                    @if(Auth::check() && Auth::user()->id==$articulo->user_id)
                    <tbody>
                        <tr>
                            
                            <th>{{$articulo->nombre}}</th>
                            <th>{{$articulo->categoria}}</th>
                            <th>{{$articulo->cantidad}}</th>
                            <th>{{$articulo->descripcion}}</th>
                            <th>{{$articulo->p_venta}}</th>
                            <th>{{$articulo->stock_min}}</th>
                            <th>
                                @if(Storage::disk('imagenes')->has($articulo->imagen))
                                    <div class="fa-pull-right">
                                            <img src="{{url('/imagen/'.$articulo->imagen)}}" style="width: 200px; height: 150px; overflow: hidden;">
                                    </div>
                                @endif
                            </th>

                            
                            <th>
                                <a href="{{ route('detallesArticulo',['articulo_id' => $articulo->id ] )}}" class="btn btn-success" style="margin:5px">Ver</a>
                                <br>
                                <a href="{{ route('editarArticulo',['articulo_id' => $articulo->id ] )}}" class="btn btn-warning" style="margin:5px">Editar</a>
                                <br>

                                <form action="{{url('/eliminarArticulo/'.$articulo->id)}}" method="post" style="margin:5px">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                <!-- Botón en HTML (lanza el modal en Bootstrap)--> 
                                    <a href="#modal{{$articulo->id}}" role="button" class="btn btn-danger"data-toggle="modal">Eliminar</a>
                                    <!-- Modal / Ventana / Overlay en HTML  -->

                                    <div id="modal{{$articulo->id}}" class="modal fade" >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">¿Estás seguro?</h4>
                                                    {{--'&times;' ES UNA 'X' PARA CERRAR EN BOOTSTRAP--}}
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Seguro que quieres borrar este articulo?</p>
                                                <h3>{{$articulo->nombre}}</h3>
                                                <h3>{{$articulo->categoria}}</h3>
                                                @if($articulo->imagen)
                                                <img src="{{url('/imagen/'.$articulo->imagen)}}" style="width: 150px; height: 200px;" >
                                                @endif
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
                    <div class="alert-danger">No hay articulos, agregue alguno</div>
                @endif

        </table>
</center>