
@extends('layout/master')

@section('judul','Register')

@section('konten')
	<div class="login-container">


		<div class="login-form">
			<div class="login-content">
				<h2 style="color:white">Reset Password</h2>
				<hr>
				<br>
				<?php echo Form::open(array('url'=>'/password/email','method'=>'post'));?>
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif

				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-mail"></i>
						</div>
						<input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Send Password Reset Link
					</button>
				</div>
				</form>
			</div>

		</div>

	</div>
@endsection
