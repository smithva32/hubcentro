@extends('layouts.app')



@section('titulo') {{$tema->nombre}}  @endsection

@section('content')

<section class="features3 cid-rPhPXVhNu6" id="features3-8" style="padding-top: 110px">
    
    @if($usuarioAutenticado && !$usuarioBloqueado && $usuarioVerificado)

    <div class="container">
       <div class="row" style="margin-top: 0px">
            <div class="card p-3 col-6 col-md-6 col-lg-2" style="text-align : justify; FONT-SIZE: 14px; background:black" >
                <div style="text-align : justify; FONT-SIZE: 14px; color: white;"> {{$tema->nombre}}:&nbsp;{{$articulos->count()}}</div>
            </div>
       </div>
        <div class="row">
        
           @foreach($articulos as $articulo)
           <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper img-fluid" madal-id="#a{{$articulo->id}}" style="border-radius: 10px">
                    <div class="card-img img-fluid" style="height: 18rem;">
                        <a data-fancybox href="{{ Storage::url('imagenesArticulos/'.$articulo->imagenDestacada()) }}">
                            <img class="cadr-img-top img-fluid" style="border-radius: 10px; height: 17rem;" src=" {{ Storage::url('imagenesArticulos/'.$articulo->imagenDestacada()) }}" >
                        </a>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title">
                        {{ $articulo->titulo}}
                        </h4>
                        <p  style="text-align : justify; FONT-SIZE: 12px; overflow:hidden; white-space:nowrap; text-overflow: ellipsis;"  class="mbr-text mbr-fonts-style display-7">
                        {{ $articulo->contenido}}
                        </p>
                    </div>
                    <div class="card-box" style="text-align : justify;">
                        <p class="mbr-section-text lead" style="text-align : justify; FONT-SIZE: 12px;">  <span class="mbri-clock mbr-iconfont mbr-iconfont-btn "></span> {{ $articulo->created_at->locale('es')->diffForHumans()   }}</p>  
                    </div>
                    <div class="mbr-section-btn text-center d-none d-sm-none d-md-block">
                        <a class="btn btn-primary btn-sm display-4" data-toggle="modal" data-target="#a{{$articulo->id}}">
                            Leer mas
                        </a>
                    </div>
                    <div class="mbr-section-btn text-center d-block d-sm-block d-md-none">
                        <a class="btn btn-primary btn-sm display-4" data-toggle="modal" data-target="#ab{{$articulo->id}}">
                            Leer mas
                        </a>
                    </div>
                </div>
            </div>

          @endforeach
        </div>
        <div class="card p-3 col-6 col-md-6 col-lg-2" class="card-wrapper sm">
            <div>
                {{ $articulos->links() }}
            </div>
        </div>

    <div class="d-none d-sm-none d-md-block">
        @foreach($articulos as $articulo)
                <!--INICIO DEL MODAL ESCRITORIO-->
                <div class="modal fade" id="a{{$articulo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content justify-content-center">
                        @if($articulo->imagenes->first())
                            <div class="modal-header justify-content-center">
                                <div class="justify-content-center" style="justify-content: center; display:inline-block ">
                                    @foreach($articulo->imagenes as $imagen)
                                        @if($imagen->articulo_id === $articulo->id)  
                                            <a data-fancybox="gallery{{ $imagen->articulo_id }}" href="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}">
                                        @endif
                                    <img style="width:250px" src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}" class="img-responsive" alt="Imgen dañada"/> 
                                    @endforeach 
                                    
                                    </a> 
                                </div>
                            </div>
                        @endif
                            <div class="modal-body">
                            
                                <h5 class="modal-title" id="exampleModalLabel">{{ $articulo->titulo}}</h5>
                                <p style="text-align : justify; FONT-SIZE: 14px; " class="mbr-section-text lead"> {!! $articulo->contenido !!}</p>  
                                <p class="mbr-section-text lead" style="text-align : justify; FONT-SIZE: 11px;">  <span class="mbri-clock mbr-iconfont mbr-iconfont-btn "></span> {{ $articulo->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $articulo->created_at->locale('es')->isoFormat('YYYY, h:mm a') }}</p>
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Cerrar</button>
                                
                            </div>
                        
                        </div>
                    </div>
                    </div>
                <!-- FIN DEL MODAL-->
        @endforeach
    </div>

    <div class="d-none d-block d-sm-block d-md-none">
        @foreach($articulos as $articulo)
                <!--INICIO DEL MODAL MOVIL-->
                <div class="modal fade" id="ab{{$articulo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content justify-content-center">
                        @if($articulo->imagenes->first())
                            <div class="modal-header justify-content-center"  style="overflow-x: scroll; height: 265px">
                                <div class="justify-content-center" style="justify-content: center; text-align : center; display:inline-block;"  style="overflow-x: scroll; height: 2665px">
                                <a data-fancybox="gallery{{ $imagen->articulo_id }}" href="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}">  
                                @foreach($articulo->imagenes as $imagen)
                                
                                    <img style="width:250px" src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}" class="img-responsive" alt="Imgen dañada"/> 
                                @endforeach

                               </a>
                                </div>
                            </div>                        
                        @endif

                            <div class="modal-body">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $articulo->titulo}}</h5>
                                <p style="text-align : justify; FONT-SIZE: 14px; " class="mbr-section-text lead"> {!! $articulo->contenido !!}</p>  
                                <p class="mbr-section-text lead" style="text-align : justify; FONT-SIZE: 11px;">  <span class="mbri-clock mbr-iconfont mbr-iconfont-btn "></span> {{ $articulo->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $articulo->created_at->locale('es')->isoFormat('YYYY, h:mm a') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Cerrar</button>
                            </div>
                        
                        </div>
                    </div>
                    </div>
                <!-- FIN DEL MODAL-->
        @endforeach
    </div>
    
           
    </div>


    @elseif(!$usuarioAutenticado)
	    <div style="width: 500px; margin: 20px auto 50px auto;  ">
	        <div style="background:#F96666; color:white;" class="alert alert-danger" role="alert">
	          <h4 class="alert-heading">Para, Por favor!</h4>
	          <p >Para acceder a este contenido debes suscribirte primero y luego iniciar sesión</p>
	          <hr>
	          <p class="mb-0" ><a href="{{url('/register')}}">Suscribirse</a></p>
	        </div>
	    </div>
 
    @elseif($usuarioBloqueado)
	    <div style="width: 500px; margin: 20px auto 50px auto;">
	        <div style="background:#F96666; color:white;" class="alert alert-danger" role="alert">
	          <h4 class="alert-heading">Para, Por favor!</h4>
	          <p>Has sido bloqueado</p>        
	        </div>
	    </div>

    @elseif(!$usuarioVerificado)
	    <div style="width: 500px; margin: 20px auto 50px auto;">
	        <div style="background:#F96666; color:white;" class="alert alert-danger" role="alert">
	          <h4 class="alert-heading">Para, Por favor!</h4>
	          <p>Aun no has verificado tu cuenta</p>        
	        </div>
	    </div>
    @endif

</section>

@include('includes.login-modal')
@endsection

@if($errors->any())
  @section('include-login-modal')
  <script src="{{ asset('js/login-modal.js') }}" defer></script>
  @endsection
@endif

