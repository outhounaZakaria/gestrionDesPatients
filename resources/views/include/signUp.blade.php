<div style=" background-color: #3598dc" class="row">
     
<div class="signup-form col-md-6 col-xs-11">
    <form action="/patient/register" method="POST">
        	{{csrf_field()}}
		<h2>Sign Up</h2>
         @forelse($errors->all() as $error)
         <p style="color: rgb(199, 55, 55)"> {{ $error }}</p> 
         @empty
             <p >Remplissez les chanmp suivantes pour s'enregistrer !</p>
        @endforelse
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-md-6 col-xs-12"><input type="text" class="form-control" name="nom" placeholder="Nom" required="required"></div>
				<div class="col-md-6 col-xs-12"><input type="text" class="form-control" name="prenom" placeholder="Prenom" required="required"></div>
                <div class="col-md-6 col-xs-12"><input type="text" class="form-control" name="cin" placeholder="CIN" required="required"></div>
				<div class="col-md-6 col-xs-12"><input type="text" class="form-control" name="telephon" placeholder="N telephone" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="required">
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
	<div style="color: white" class="hint-text">Already have an account? <a href="/patient/signIn">Login here</a></div>
</div>
</div>
