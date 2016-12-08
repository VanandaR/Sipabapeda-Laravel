@extends('layout/master')

@section('judul','Register')

@section('konten')
	<div class="login-container">


		<div class="login-form">
			<div class="login-content">
				<h2 style="color:white">Registrasi</h2>
				<hr>
				<br>
				<?php echo Form::open(array('url'=>'auth/register','method'=>'post'));?>
				@if (count($errors) > 0)
					<div class="alert alert-warning">
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
							<i class="entypo-user"></i>
						</div>
						<input type="text" class="form-control" name="name" placeholder="Nama" value="{{old('name')}}" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-mail"></i>
						</div>
						<input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>

						<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>

						<input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						REGISTER
					</button>
				</div>
				<div class="form-group col-md-12">

					<a href="{{url()}}/password/email">Lupa Password?</a>

				</div>

				</form>
			</div>

		</div>

	</div>
@endsection

