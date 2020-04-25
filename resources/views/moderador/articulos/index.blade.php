@extends('layouts.appModerador')

@section('content')

<div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link"><i class="icon-home"></i> Menu</a>
                    </li>
                    <li class="nav-title">
                        Funciones del Moderador
                    </li>                   

                    <li class="nav-item">
                        <a class="nav-link" onclick="location='{{ url('moderador/articulos') }}'"><i class="icon-book-open"></i> Articulos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" ><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

        <!-- Contenido Principal -->
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style=" color:#941b94;" href="#">Administración</a></li>
               
            </ol>
                       

            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Artículos&nbsp;&nbsp;
                        <button style="border-radius: 40px"   type="button" class="btn btn-perzonalizado" data-toggle="modal" data-target="#modalCrear">
                            <i  class="icon-plus"></i>&nbsp;Agregar Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class=" col-md-3">
                            <div class="input-group">
                                <span><b>Total de artículos: &nbsp;{{ $todosArticulos}}</b></span>
                                </div>
                              
                            </div>
                            <div class="col-md-6">
                               
                              
                            </div>
                            <div class="col-md-3">
                                
                                <div class="input-group">
                                <form class="form-inline" action="{{url('moderador/buscador/articulos')}}" method="GET">
                                    @csrf
                                    <input style="border-radius: 40px; text-align:center;" type="text" id="exampleInputEmail2" name="busqueda" class="form-control" placeholder="Artículo">
                                    &nbsp;&nbsp; <button style="border-radius: 40px" type="submit" class="btn btn-perzonalizado"><i class="fa fa-search"></i> Buscar</button>
                                </form>
                                    
                                   
                                </div>


                              
        
                            </div>
                        </div>
                            @if(session('notificacion'))   
                                <div class="alert alert-success" role="alert">
                                {{session('notificacion')}}
                                </div>
                            @endif
                            @if(session('notificacion2'))   
                                <div class="alert alert-success" role="alert">
                                {{session('notificacion2')}}
                                </div>
                            @endif
                          
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Titulo</th>
                                    <th >Autor</th>
                                    <th>Tema</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($articulos as $articulo)
                                <tr>
                                    <td>
                                    <a href="{{ route('moderador.articulos.edit',$articulo->id) }}"><button  type="button" class="btn btn-primary btn-sm"><i class="icon-pencil"></i>
                                    </button></a>&nbsp;


                                
                                        
                                    <button type="button" class="btn btn-perzonalizado btn-sm" data-toggle="modal" data-target="#modalVer{{$articulo->id}}">
                                          <i class="icon-eye"></i>
                                    </button>
                                                                <div class="modal fade" id="modalVer{{$articulo->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                                    <div class="modal-dialog modal-personalizado modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Detalles del Artículo</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <form method="GET" action="" enctype="multipart/form-data" class="temaFormuEdit">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                           
                                                                                <div style="text-align:center; margin-top:5px; margin-bottom:5px;">

                                                                                <div style="margin-top:10px; margin-bottom:20px; text-align:center; FONT-SIZE:25px" >
                                                                                    <b>{{ $articulo->titulo }}</b>
                                                                                </div>

                                                                                <div >

                                                                                   
                                                                                    <div class="row" style="justify-content: center; display:inline-block ">
                                                                                        @foreach($articulo->imagenes as $imagen)
                                                                                            <img src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}">
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>

                                                                                <div style=" margin-top: 20px" class="row">
                                                                                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                                                                                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                                                                        {!! $articulo->contenido !!}
                                                                                    </div>

                                                                                </div>

                                                                          
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button style="border-radius: 40px"  type="button" class="btn btn-perzonalizado" data-dismiss="modal">Salir</button>
                                                                            
                                                                            </div>
                                                                        </div>
                                                                        </form>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                                </div>
                                                                &nbsp; 
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar{{$articulo->id}}">
                                          <i class="icon-trash"></i>
                                        </button>
                                                    <!-- Inicio del modal Eliminar -->
                                                    <div class="modal fade" id="modalEliminar{{$articulo->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-danger" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Eliminar Artículo</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Estas seguro de eliminar el Artículo?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" style="border-radius: 40px" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                   

                                                                    <form method="POST" action="{{	route('moderador.articulos.destroy',$articulo->id) }}">
                                                                        @csrf
                                                                        {{ method_field('DELETE') }}
                                                                        <button class="btn btn-danger" style="border-radius: 40px" type="submit" >Eliminar</button>
                                                                        
                                                                    </form> 
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- Fin del modal Eliminar -->
                                        </div>
                                        
                                           
                                    </td>
                                    <td>{{ $articulo->titulo }}</td>
                                    <td>{{ $articulo->user->name }}</td>
                                    <td>{{ $articulo->tema->nombre }}</td>
                                    <td>{{ $articulo->created_at->formatLocalized('%A %d %B %Y')  }}</td>
                                    
                                  

                                    @if($articulo->activo)
                                    <td>
                                        <span class="badge badge-success">Activo</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="badge badge-danger">Desactivado</span>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav>
                        <div class="row">
                            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                {{ $articulos->links() }}
                            </div>
                        </div> 
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            
            <!--Fin del modal-->
            <!-- Inicio del modal Eliminar -->
            
            <!-- Fin del modal Eliminar -->
        </main>
        <!-- /Fin del contenido principal -->
    </div>



@include('includes.createModerador-modal')

@endsection

@if($errors->any())
  @section('include-createModerador-modal')
  <script src="{{ asset('js/createModerador-modal.js') }}" defer></script>
  @endsection
@endif

