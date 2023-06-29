
<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet"  href="{{asset('assets/css/login.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>

                     {{-- menampilkan falidasi --}}
                     @if ($errors->any())
                    <ul style="width: 100%; background: red; padding: 10px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                    @endforeach     
                    </ul>
                    @endif
                    {{-- munculin pemberitahuan gagal login --}}
                    @if (Session::get('gagal'))
                    <div style="width: 100%; background: red; padding: 10px;">
                    {{Session::get('gagal')}}
                    </div>
                    @endif

                        <form action="{{route('auth')}}" method="post">
                        @csrf
		      		<div class="form-group">
                        <label for="">Email</label>
		      			<input type="email" class="form-control rounded-left" placeholder="Email" name="email" id="email" >
		      		</div>
	            <div class="form-group">
                    <label for="">Password</label>
	              <input type="password" class="form-control rounded-left" placeholder="Password"  name="password" id="password">
	            </div>
	
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary p-3 px-5">Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

