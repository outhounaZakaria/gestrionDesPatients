	<!-- consulation section -->
    
  
	<section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex justify-content-center">
    			<div class="col-md-12">
	    			<div class="wrap-appointment d-md-flex">
		    			<div  class="col-md-8 bg-primary p-5 heading-section heading-section-white">
                        	 @if(Session::has('Success'))
                           <div style="z-index: 10" class="alert alert-success">
                            {{ Session::get('Success') }}
                              {{ Session::put('Success', null) }}
                              </div>
                            @endif
							<span class="subheading">Free consultation</span>
		    				<h2 class="mb-4">Book an Appointment</h2>
		    				<form action="/consultation/confirmer" method="POST" class="appointment" enctype="multipart/form-data">
		    					{{csrf_field()}}
                                <div class="row justify-content-center">
										<div class="col-md-6">
                                                <label for="form_departement"> Sélectionner le département </label>
											<div class="form-group">
					    					<div class="form-field">
			          					<div class="select-wrap">
			                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
			                      <select   name="form_departement" id="form_departement" class="form-control">
			                        @foreach($departements as $departement)
                                    <option value="{{$departement->id_departement}}">{{$departement->nom}}</option>
                                    @endforeach
			                      </select>
			                    </div>
					              </div>
					    				</div>
										</div>
										<div class="col-md-6">
                                              <label for="form_service"> Sélectionner le service </label>
											<div class="form-group">
					    					<div class="form-field">
			          					<div class="select-wrap">
			                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
			                      <select name="form_service" id="form_service" class="form-control">
			                      </select>
			                    </div>
					              </div>
					    				</div>
										</div>
                                        <div class="col-md-6">
                                              <label for="form_docteur"> Sélectionner le docteur </label>
											<div class="form-group">
					    					<div class="form-field">
			          					<div class="select-wrap">
			                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
			                      <select name="docteurs" id="form_docteur" class="form-control">
			                      </select>
			                    </div>
					              </div>
					    				</div>
										</div>
										<div class="col-md-6">
                                             <label for="docteurs"> Sélectionner la date </label>
											<div class="form-group">
					    					<div class="input-wrap">
					            		<div class="icon"><span class="fa fa-calendar"></span></div>
					            		<input name="date" type="text" id="datePicker" class="form-control " placeholder="Date">
				            		</div>
					    				</div>
										</div>
										 <div style="width: 50%" class="col-md-6">
                                              <label  for="form_docteur"> Selectionner une heur </label>
											<div class="form-group">
					    					<div class="form-field">
			          					<div class="select-wrap">
			                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
			                      <select name="heur" id="form_heur" class="form-control">
			                      </select>
			                    </div>
					              </div>
					    				</div>
										</div>
										<div class="col-md-6 col-xs-1"></div>
										<div class="col-md-12">
											<div class="form-group">
					              <input type="submit" value="Book your appointment" class="btn btn-secondary py-3 px-4">
					            </div>
										</div>
		    					</div>
			          </form>
		    			</div>
		    			<div class="col-md-4 bg-white text-center p-5">
		    				<div class="desc border-bottom pb-4">
		    					<h2>Business Hours</h2>
			              <div class="opening-hours">
			              	<h4>Opening Days:</h4>
			              	<p class="pl-3">
			              		<span><strong>Monday – Friday:</strong> 9am to 20 pm</span>
			              		<span><strong>Saturday :</strong> 9am to 17 pm</span>
			              	</p>
			              	<h4>Vacations:</h4>
			              	<p class="pl-3">
			              		<span>All Sunday Days</span>
			              		<span>All Official Holidays</span>
			              	</p>
			              </div>
		    				</div>
								<div class="desc pt-4 ">
									<h3 class="heading">For Emergency Cases</h3>
									<span class="phone">(+01) 123 456 7890</span>
								</div>
		    			</div>
		    		</div>
		    	</div>
    		</div>
    	</div>
    </section>
    <!-- fin consultatin section -->