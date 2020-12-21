
@extends('mainsite')

@section('contenido2')
<style type="text/css" >
    header.masthead
    {
        background-image: url({{ Storage::url($banner->imagen) }}) !important;    
    }
</style>
<!-- Header -->
<header class="masthead">
  @if(!is_null($banner))
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">{{ $banner->titulo }}!</div>
          <div class="intro-heading text-uppercase">{{ $banner->subtitulo }}</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">{{ $banner->tituloboton }}</a>
        </div>
      </div>
  @endif
</header>

<!-- Services -->
<section id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Servicios</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
      </div>
    </div>
    <div class="row text-center">
           
      @if( !is_null($servicios) )
      
      	@foreach( $servicios as $servicio)  
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa {{ $servicio->imagencode }} fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">{{ $servicio->titulo }}</h4>
            <p class="text-muted">{{ $servicio->descripcion }}</p>
          </div>
      	@endforeach
      	
      @else
      	  <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">E-Commerce</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Responsive Design</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Web Security</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
      @endif
      
    </div>
  </div>
</section>

<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Portafolio</h2>
        <h3 class="section-subheading text-muted">Hemos intervenido en el desarrollo de aplicaciones de gran performace con distintas tecnología.</h3>
      </div>
    </div>
    <div class="row">
      @if( !is_null($portafolios) )
      
      	@foreach($portafolios as $portafolio)
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$portafolio->id}}">
                  <div class="portfolio-hover" >
                    <div class="portfolio-hover-content">
                      <i class="fa fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" src="{{ Storage::url(str_replace('portafolio/', 'portafolio/crop_', $portafolio->imagen)) }}" alt="">
                </a>
                <div class="portfolio-caption">
                  <h4>{{ $portafolio->titulo }}</h4>
                  <p class="text-muted">{{ $portafolio->categoria }}</p>
                </div>
            </div>        
      	@endforeach      
      @endif 
    </div>
  </div>
</section>

<!-- Team -->
<section class="bg-light" id="team">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Nuestro Equipo de Trabajo</h2>
        <h3 class="section-subheading text-muted">En Reeweb contamos con un equipo de trabajo sorprendente.</h3>
      </div>
    </div>
    <div class="row">
      @foreach($equipo as $miembro)
          <div class="col-sm-4">        
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="{{ Storage::url($miembro->foto) }}" alt="">
              <h4>{{$miembro->fullname() }}</h4>
              <p class="text-muted">{{$miembro->cargo}}</p>
              <ul class="list-inline social-buttons">
              	@if($miembro->twwitter)
                <li class="list-inline-item">
                  <a target="_blank" href="{{ url($miembro->twwitter) }}">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                @endif
                @if($miembro->facebook)
                <li class="list-inline-item">
                  <a target="_blank" href="{{ url($miembro->facebook) }}">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                @endif
                
                @if($miembro->linkedin)
                <li class="list-inline-item">
                  <a target="_blank" href="{{ url($miembro->linkedin) }}">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
                @endif
              </ul>
            </div>        
          </div>    
      @endforeach  
    </div>
  </div>
</section>

<!-- Clients
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <a href="#">
          <img class="img-fluid d-block mx-auto" src="/assets/images/img/logos/envato.jpg" alt="">
        </a>
      </div>
      <div class="col-md-3 col-sm-6">
        <a href="#">
          <img class="img-fluid d-block mx-auto" src="/assets/images/img/logos/designmodo.jpg" alt="">
        </a>
      </div>
      <div class="col-md-3 col-sm-6">
        <a href="#">
          <img class="img-fluid d-block mx-auto" src="/assets/images/img/logos/themeforest.jpg" alt="">
        </a>
      </div>
      <div class="col-md-3 col-sm-6">
        <a href="#">
          <img class="img-fluid d-block mx-auto" src="/assets/images/img/logos/creative-market.jpg" alt="">
        </a>
      </div>
    </div>
  </div>
</section> -->

<!-- Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Contactanos</h2>
        <h3 class="section-subheading text-muted"></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form id="contactForm" name="sentMessage" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Modals -->
@if( !is_null($portafolios) )
      
    @foreach($portafolios as $portafolio)
        <div class="portfolio-modal modal fade" id="portfolioModal{{$portafolio->id}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-8 mx-auto">
                    <div class="modal-body">
                      <!-- Project Details Go Here -->
                      <h2 class="text-uppercase">{{ $portafolio->titulo }}</h2>
                      
                      <div class="row">
                      	 @foreach($portafolio->imagenes()->get() as $imagen)
                      	
                          	<figure class="col-md-4">
                                <img class="img-fluid mx-auto" src="{{ Storage::url($imagen->imagen()) }}" alt="">
                                
                            </figure>
                          @endforeach
                      </div>
                      
                      <p>{{ $portafolio->descripcion }}</p>
                      <ul class="list-inline">
                        <li>Sitio: {{ $portafolio->sitio }}</li>
                        <li>Categoria: {{ $portafolio->categoria }}</li>
                      </ul>
                      <button class="btn btn-primary" data-dismiss="modal" type="button">
                        <i class="fa fa-times"></i>
                        Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    @endforeach

@endif

@stop

@section('contenido2')
<script type="text/javascript">
$(document).ready(function()
{
    
});
</script>
@stop


