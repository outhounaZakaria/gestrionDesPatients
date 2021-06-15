@extends('layouts.base')

@section('title')
Health Care  | Réservation de consultation
@endsection

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('body')
   <!--  Debut slider -->
    <div class="hero-wrap">
	    <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url({{asset('images/bg_3.jpg')}});">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-end">
		          <div class="col-md-6 ftco-animate">
		          	<div class="text w-100">
			            <h1 class="mb-4">Welcome to our clinic</h1>
			            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
		            </div>
		          </div>
		        </div>
	        </div>
	      </div>
	    </div>
	</div>
	<!-- fin slider -->
 
   @include('include.consultationForm')

    @endsection

    
  @section('javascript')
	<script type="text/javascript">
        var $form_dep =  $("#form_departement");
        $form_dep.change(function(){
             var data = {};
                data['departement'] = parseInt( $form_dep.val());
                data['activeDepartement'] = '1';
            $.ajax({
                url: "/consultation/reserver",
                method: 'POST',
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                 data: data,
                success: function(data) {
                    $('#form_service').html(data.html);
                     $('#form_docteur').html(data.html2);
                }
            });
        });

         var $form_ser =  $("#form_service");
        $form_ser.change(function(){
             var data = {};
                data['service'] = parseInt( $form_ser.val());
                data['activeService'] = '1';
                data['departement'] = parseInt( $form_dep.val());
            $.ajax({
                url: "/consultation/reserver",
                method: 'POST',
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                 data: data,
                success: function(data) {
                    $('#form_docteur').html(data.html);
                }
            });
        });

		 var $form_docteur =  $("#form_docteur");
		 var fullDates = [] ;
        $form_docteur.change(function(){
             var data = {};
                data['docteur'] = parseInt( $form_docteur.val());
                data['activeDocteur'] = '1';
            $.ajax({
                url: "/consultation/reserver",
                method: 'POST',
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                 data: data,
                success: function(data) {
					 fullDates = data.fullDates;
					 $("#datePicker").datepicker({
                     changeYear: false,
                     changeMonth:true,
                     dateFormat: 'yy-mm-dd',
                     minDate: new Date(),
            		  beforeShowDay: DisableDates
                   });
                   console.log(data.fullDates);
                }
            });
        });

		function DisableDates(date) {
                     var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                     return [fullDates.indexOf(string) == -1];
                   }


	  var $form_date =  $("#datePicker");
        $form_date.change(function(){
             var data = {};
                data['date'] =  $form_date.val();
				data['docteur'] = parseInt( $form_docteur.val());
                data['activeDate'] = '1';
            $.ajax({
                url: "/consultation/reserver",
                method: 'POST',
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                 data: data,
                success: function(data) {
                     $('#form_heur').html(data.html);
                }
            });
        });
	

    </script>

  @endsection