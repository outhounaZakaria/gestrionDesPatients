@extends('layouts.base')

@section('title')
Health Care  | Departments
@endsection

@section('body')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Departments <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Departments</h1>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row dept align-items-center">
					<div class="col-md-6 pr-md-5">
						<h2>Chiropractic</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
						<p><a href="#" class="btn btn-primary">Read more</a></p>
					</div>
					<div class="col-md-6 img" style="background-image: url(images/work-1.jpg);"></div>
				</div>

				<div class="row dept align-items-center">
					<div class="col-md-6 pl-md-5 order-md-last">
						<h2>Acupuncture</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
						<p><a href="#" class="btn btn-primary">Read more</a></p>
					</div>
					<div class="col-md-6 img" style="background-image: url(images/work-5.jpg);"></div>
				</div>

				<div class="row dept align-items-center">
					<div class="col-md-6 pr-md-5">
						<h2>Massage</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
						<p><a href="#" class="btn btn-primary">Read more</a></p>
					</div>
					<div class="col-md-6 img" style="background-image: url(images/work-4.jpg);"></div>
				</div>
			</div>
		</section>
  
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @endsection 