@extends('layouts.app')



@section('content')


<section class="engine"><a href=""></a>
</section>
<section class="carousel slide cid-rPhydiGJ5A" data-interval="false" id="slider1-1">
            <div class="full-screen">
                <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li data-app-prevent-settings="" data-target="#slider1-1" class=" active" data-slide-to="0"></li>
                        <li data-app-prevent-settings="" data-target="#slider1-1" data-slide-to="1"></li>
                    </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url(assets/images/background1.jpg);">
                            <div class="container container-slide">
                                <div class="image_wrapper"><img src="assets/images/background1.jpg" alt="" title="">
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-center"></div>
                                </div>
                            </div></div>
                        </div>
                        <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url(assets/images/background3.jpg);">
                        <div class="container container-slide">
                            <div class="image_wrapper"><img src="assets/images/background3.jpg" alt="" title="">
                            <div class="carousel-caption justify-content-center">
                                <div class="col-10 align-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-1">
                <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-1">
                <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>

</section>



<section class="features3 cid-rPhPXVhNu6" id="features3-8">

@foreach($temasDestacados as $temaDestacado)
    <div class="container">
   
        <div class="media-container-row">
    
        @foreach($temaDestacado->articulos->sortByDesc('id')->take(4) as $articulo)
        <div class="card p-3 col-xs-12 col-md-4 col-lg-4">
        
                <div class="card-wrapper" madal-id="#a{{$articulo->id}}">
                    <div class="card-img">
                        <a data-fancybox whith="80%" href="{{ Storage::url('imagenesArticulos/'.$articulo->imagenDestacada()) }}">
                        <img src=" {{ Storage::url('imagenesArticulos/'.$articulo->imagenDestacada()) }}" >
                        </a>
                       
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            {{ $articulo->titulo}}
                        </h4>
                        <p  style="text-align : justify; FONT-SIZE: 12px; overflow:hidden; white-space:nowrap; text-overflow: ellipsis;"  class="mbr-text mbr-fonts-style display-7">
                         {{ $articulo->contenido}}
                        </p>
                    </div>
                    <div class="card-box">
                            <a>
                                <p class="mbr-section-text lead" style="text-align : justify; FONT-SIZE: 12px;">  <span class="mbri-clock mbr-iconfont mbr-iconfont-btn "></span> {{ $articulo->created_at->locale('es')->diffForHumans()   }}</p>
                            <a>   
                    </div>
                    <div class="mbr-section-btn text-center">
                        <a  class="btn btn-primary btn-sm display-4"  data-toggle="modal" data-target="#a{{$articulo->id}}">
                            Ver mas
                        </a>
                    </div>
                </div>
             
        </div>
        
            
            @endforeach
        </div>
        
      
        
    
    </div>
   
    @endforeach

    @foreach($temasDestacados as $temaDestacado)
    
    @foreach($temaDestacado->articulos->sortByDesc('id')->take(3) as $articulo)
    <div  class="modal fade" id="a{{$articulo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div style="height: 600px" class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            @if($articulo->imagenes->first())
                            <div class="modal-header juntify-content-center center-block">
                          
                                   
                                    <div class="d-flex flex-wrap justify-content-around" style="justify-content: center; display:inline-block ">
                                        @foreach($articulo->imagenes as $imagen)
                                            @if($imagen->articulo_id === $articulo->id)  
                                                <a data-fancybox="gallery{{ $imagen->articulo_id }}" href="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}">
                                        @endif
                                        <img  src="{{ Storage::url('imagenesArticulos/'.$imagen->nombre) }}" class="img-responsive" alt="Imgen dañada"/> 
                                        @endforeach 
                                        
                                        </a> 
                                    </div>
                                    
                                    <div class="juntify-content-center d-block d-sm-block d-md-none">
                                            @foreach($articulo->imagenes as $imagens)
                                                @if($imagens->articulo_id === $articulo->id)                                          
                                                    <a data-fancybox="gallery{{ $imagens->articulo_id }}" href="{{ Storage::url('imagenesArticulos/'.$imagens->nombre) }}">
                                                @endif
                                            @endforeach 
                                            
                                        <img  src="{{ Storage::url('imagenesArticulos/'.$articulo->imagenDestacada()) }}" class="img-responsive" alt="Imgen dañada"/>  
                                        </a>
                                    </div>
                            </div>
                            @endif
                            <div  class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $articulo->titulo}}</h5>
                            <p style="text-align : justify; FONT-SIZE: 14px; " class="mbr-section-text lead"> {!! $articulo->contenido !!}</p>  

                            <div class="moda-date">
                                <a>
                                    <p class="mbr-section-text lead" style="text-align : justify; FONT-SIZE: 12px;">  <span class="mbri-clock mbr-iconfont mbr-iconfont-btn "></span> {{ $articulo->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $articulo->created_at->locale('es')->isoFormat('YYYY, h:mm a') }}</p>
                                <a>   
                            </div>   
                            </div>
                                                                                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                </div>
            </div>
            
    </div>
    @endforeach
    @endforeach
  
</section>

@include('includes.login-modal')
@endsection

@if($errors->any())
  @section('include-login-modal')
  <script src="{{ asset('js/login-modal.js') }}" defer></script>
  @endsection
@endif