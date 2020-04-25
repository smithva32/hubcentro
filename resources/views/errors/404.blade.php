@extends('layouts.app')





@section('content')

<section class="features3 cid-rPhPXVhNu6" id="features3-8" style="padding-top: 110px">
    
    <div class="container">

        <div class="media-container-row">
          <p>Este tema no existe, por favor busque otro</p>
        </div>  
           
    </div>



</section>

@include('includes.login-modal')
@endsection

@if($errors->any())
  @section('include-login-modal')
  <script src="{{ asset('js/login-modal.js') }}" defer></script>
  @endsection
@endif
