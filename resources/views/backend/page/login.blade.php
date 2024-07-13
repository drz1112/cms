<!DOCTYPE html>
<html>
<head>
	<title> - Login</title>
	<link rel="shortcut icon" href="{{asset('img/favicon.png')}}" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    	body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #ffffff !important;
            /* background-image: url('{{ asset('img/banner.jpg')}}'); */
            background-position: center;
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
		}
		.backgr {
			height: 450px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #095285;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 40px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 40px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 40px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;
		}
		.brand_logo_container {
			position: absolute;
            height: 210px;
            width: 210px;
            top: -100px;
            border-radius: 50%;
            background: #ffffff;
            padding: 7px;
            text-align: center;
            
		}
		.brand_logo {
			height: 185px;
			width: 185px;
			border-radius: 50%;
		}
		.form_container {
			margin-top: 10%;
		}
		.login_btn {
			width: 100%;
			background: #f39c12 !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #f39c12 !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
</style>
<body >
    <div class="container h-100">
        @include('backend/layout.alert')
		<div class="d-flex justify-content-center h-100">
			<div class="backgr">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="{{ asset('/'.$settingweb->site_Image_login)}}" class="brand_logo" alt="Logo">
					</div>
				</div>
                <div class="d-flex justify-content-center form_container">
                    <form action="{{ route('ceklogin')}}" method="POST">
                        @csrf
                        @method('post')
                        <div class="d-flex justify-content-center mt-3 py-3">
                            <h2 class="text-white"><br> LOGIN</h2>
                        </div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" class="form-control input_user @error('email') is-invalid @enderror" value="" placeholder="Email">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass @error('password') is-invalid @enderror" value="" placeholder="Password">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-puzzle-piece"></i></span>
							</div>
							<input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha">

						</div>
						<div class="input-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
								<div class="captcha">
								<span>{!! captcha_img('math') !!}</span>
									<button type="button" class="btn btn-success btn-refresh"><i class="fas fa-sync-alt"></i></button>
								</div>	  
								@if ($errors->has('captcha_error'))
									<span class="help-block">
										<strong>{{ $errors->first('captcha_error') }}</strong>
									</span>
								@endif
						
						</div>
                        <div class="d-flex justify-content-center mt-3">
				 	        <button type="submit" class="btn btn-sm login_btn">Login</button>
				        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">


	$(".btn-refresh").click(function(){
		$.ajax({
			type:'GET',
			url:"{{ route('refreshCaptcha')}}",
			success:function(data){
			$(".captcha span").html(data.captcha);
			}
		});
	});
	
	
	</script>
</html>
