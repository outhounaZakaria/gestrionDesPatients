
 @extends('layouts.base')

@section('title')
Health Care  | Services
@endsection
 
@section('body')
 
 <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Services <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Services</h1>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<span class="subheading">Services</span>
			  @if($departement_name != "")
            <h2 class="mb-4"> Département | {{$departement_name}}</h2>
			  @else
			   <h2 class="mb-4"> List des services de nos différent département</h2>
			  @endif
            </div>
        </div>
  			<div class="row tabulation mt-4 ftco-animate">
  				<div class="col-md-4">
						<ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
							@foreach($services as $service)
						  <li style="cursor: pointer" class="nav-item text-left">
						    <a onclick="afficherSerivice({{$service->id_service}})"  class="nav-link active py-4" data-toggle="tab" ><span class="flaticon-chiropractic mr-2"></span> {{$service->nom}}</a>
						  </li>
						  @endforeach
						</ul>
					</div>
					<div class="col-md-8">
						<div class="tab-content">
							 @php $a = 1; @endphp
							@foreach($services as $service)
							@if($a == 1 )
   							 <div  class="tab-pane container p-0  active" id="block_{{$service->id_service}}">
							  @php $a++ ; @endphp	
							@else 
							 <div id="block_{{$service->id_service}}" class="tab-pane container p-0  fade" id="services-1">
							@endif
						  	<div class="img" style="background-image: url({{asset($service->image)}});"></div>
						  	<h3>{{$service->nom}} </a></h3>
						  	<p>
								<ul class="list-unstyled">
								 @php $b = 1; @endphp
							  @foreach( explode(".", $service->description) as $desc)
							  @if($b < count(explode(".", $service->description)) )
							    <li style="text-align: left" ><span class="fa fa-check mr-3"></span> {{$desc}}</li>
							  @endif
								 @php $b++ ; @endphp	
								 @endforeach
							   </ul>
                     
							  </p>
						  </div>
						   @endforeach
						</div>
					</div>
				</div>
    	</div>
    </section>
    
   
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection

@section('javascript')
<script>
function afficherSerivice(param1) {
	  $(".tab-pane.container.p-0.active").addClass('fade');
	 $('.tab-pane.container.p-0.active').removeClass('active');
	$("#block_"+param1).removeClass('fade');
	$("#block_"+param1).addClass('active');
}
</script>
@endsection