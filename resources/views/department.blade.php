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
				 @php $a = 1; @endphp
				 @foreach ($departments as $department)
				 <div class="row dept align-items-center">
				 @php
				 if (fmod($a, 2)==0){
					echo  '<div class="col-md-6 pl-md-5 order-md-last">';
                     $a++;    
				 }else{
					echo '<div class="col-md-6 pr-md-5">';
			         $a++;   
				 }
				 @endphp          
						<h2>{{$department->nom}}</h2>
						 @foreach( explode(".", $department->description) as $desc)
						 <p>{{ $desc }}</p>
						 @endforeach
						<p><a  href='/services/{{$department->id_departement}}' class="btn btn-primary">Read more</a></p>
					</div>
					<div  class="col-md-6 img" style="margin-bottom: 40px;background-image: url({{$department->image}});"></div>
				</div>
                 @endforeach
          
			</div>
		</section>
  
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @endsection 