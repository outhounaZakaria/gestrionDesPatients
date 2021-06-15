@extends('layouts.base')

@section('title')
Health Care  | Team
@endsection

@section('body')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Team <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Our Experts Chiropractor</h1>
          </div>
        </div>
      </div>
    </section>

   	<section class="ftco-section">
			<div class="container">
				<div class="row no-gutters justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Team &amp; Staff</span>
            <h2> Nos experts </h2>
          </div>
        </div>
				<div class="row">

					@foreach($medcins as $medcin)
					<div style="margin-bottom: 20px" class="col-md-4 ftco-animate d-flex">
						<div class="staff bg-primary">
						<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url({{$medcin->image}});"></div>
							</div>
							<div class="text pt-3 px-3 pb-4 text-center">
								<h3>{{$medcin->nom}}  {{$medcin->prenom}}</h3>
								<span class="position mb-2">{{$medcin->specialite}}</span>
								<div class="faded">
									<p>{{$medcin->description}}</p>
	                        </div>
				        </div>
		           	</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
    
  
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection