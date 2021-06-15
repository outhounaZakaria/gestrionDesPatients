<div style=" background-color: #3598dc" class="row">
<div class="signup-form col-md-6 col-xs-11">
     @if(Session::has('error'))
                           <div style="z-index: 10" class="alert alert-danger">
                            {{ Session::get('error') }}
                              {{ Session::put('error', null) }}
                              </div>
                            @endif
    <form action="/patient/seConnecter" method="post">
        	{{csrf_field()}}
		<h2>Log In</h2>
		<hr>
       
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>

		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
        </div>
    </form>
	<div style="color: white" class="hint-text">You don't have an account? <a href="/patient/signUp">SignUp</a></div>
</div>
</div>
