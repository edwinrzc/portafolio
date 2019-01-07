@extends('mainpreview')

@section('contenido')

<style type="text/css" >
    header.masthead
    {
        background-image: url({{ Storage::url($banner->imagen) }}) !important;    
    }
</style>
<!-- Header -->
<header class="masthead">
  <div class="container">
    <div class="intro-text">
      @if( $banner->titulo )
      <div class="intro-lead-in">{{ $banner->titulo }}</div>
      @endif
      
      @if( $banner->subtitulo )
      <div class="intro-heading text-uppercase">{{ $banner->subtitulo }}</div>
      @endif
      
      @if( $banner->tituloboton )
      	<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">{{ $banner->tituloboton }}</a>
      @else
      	<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Servicios</a>
      @endif
      
      
    </div>
  </div>
</header>
@stop