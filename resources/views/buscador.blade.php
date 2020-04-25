@extends('layouts.app')

@section('titulo', 'Buscador')

@section('content')


<section class="features3 cid-rPhPXVhNu6" id="features3-8" style="padding-top: 95px">
    @if(!isset($articulosPermitidos))
    <div class="container">
     
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
                 <div class="mbr-section-btn text-center">
                    <a class="btn btn-primary btn-sm display-4" data-toggle="modal" data-target="#a{{$articulo->id}}">
                         Leer mas
                    </a>
                 </div>
                
             </div>
         </div>

       @endforeach
     </div>
     

    @foreach($articulos as $articulo)
    <div class="modal fade" id="a{{$articulo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content justify-content-center">
                    @if($articulo->imagenes->first())
                        <div class="modal-header justify-content-center">
                            <div class="justify-content-center d-none d-sm-none d-md-block" style="justify-content: center; display:inline-block ">
                                @foreach($articulo->imagenes as $imagen)
                                    @if($imagen->articulo_id === $articulo->id)  
                                        <a data-fancybox="gallery{{ $imagen->articulo_id }}" href="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}">
                                    @endif
                                    <img style="width:250px" src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}" class="img-responsive" alt="Imgen dañada"/> 
                                @endforeach 
                                
                                </a> 
                            </div>
                        </div>
                        
                        <div style="text-align : center; overflow-x: scroll; height: 250px" class="justify-content-center d-block d-sm-block d-md-none">
                            @foreach($articulo->imagenes as $imagen)
                                <img style="width:250px" src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}" class="img-responsive" alt="Imgen dañada"/> 
                            @endforeach
                        </div>
                      
                    @endif
                        <div class="modal-body">
                        
                            <h5 class="modal-title" id="exampleModalLabel">{{ $articulo->titulo}}</h5>
                            <p style="text-align : justify; FONT-SIZE: 14px; " class="mbr-section-text lead"> {!! $articulo->contenido !!}</p>  
                            <p class="mbr-section-text lead" style="text-align : justify; FONT-SIZE: 11px;">  <span class="mbri-clock mbr-iconfont mbr-iconfont-btn "></span> {{ $articulo->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $articulo->created_at->locale('es')->isoFormat('YYYY, h:mm a') }}</p>
                        </div>
                        <div class="moda-date">
                                <a>
                                    
                                <a>   
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
    @else
    <div class="container">
  
    
     <div class="row">
        
       
        @foreach($articulosPermitidos as $articulo)
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
                 <div class="mbr-section-btn text-center">
                     <a class="btn btn-primary btn-sm display-4" data-toggle="modal" data-target="#a{{$articulo->id}}">
                         Leer mas
                     </a>
                 </div>
                
             </div>
         </div>
             @endforeach
         

      
     </div>
     
  

 @foreach($articulosPermitidos as $articulo)
 <div class="modal fade" id="a{{$articulo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content justify-content-center">
                    @if($articulo->imagenes->first())
                        <div class="modal-header justify-content-center">
                            <div class="justify-content-center d-none d-sm-none d-md-block" style="justify-content: center; display:inline-block ">
                                @foreach($articulo->imagenes as $imagen)
                                    @if($imagen->articulo_id === $articulo->id)  
                                        <a data-fancybox="gallery{{ $imagen->articulo_id }}" href="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}">
                                    @endif
                                <img style="width:250px" src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}" class="img-responsive" alt="Imgen dañada"/> 
                                @endforeach 
                                
                                </a> 
                            </div>
                        </div>
                        
                        <div style="text-align : center; overflow-x: scroll; height: 250px" class="justify-content-center d-block d-sm-block d-md-none">
                            @foreach($articulo->imagenes as $imagen)
                                <img style="width:250px" src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}" class="img-responsive" alt="Imgen dañada"/> 
                            @endforeach
                        </div>
                      
                    @endif
                        <div class="modal-body">
                        
                            <h5 class="modal-title" id="exampleModalLabel">{{ $articulo->titulo}}</h5>
                            <p style="text-align : justify; FONT-SIZE: 14px; " class="mbr-section-text lead"> {!! $articulo->contenido !!}</p>  
                            <p class="mbr-section-text lead" style="text-align : justify; FONT-SIZE: 11px;">  <span class="mbri-clock mbr-iconfont mbr-iconfont-btn "></span> {{ $articulo->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $articulo->created_at->locale('es')->isoFormat('YYYY, h:mm a') }}</p>
                        </div>
                        <div class="moda-date">
                                <a>
                                    
                                <a>   
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

    @endif 
</section>

@include('includes.login-modal')
@endsection

@if($errors->any())
  @section('include-login-modal')
  <script src="{{ asset('js/login-modal.js') }}" defer></script>
  @endsection
@endif

