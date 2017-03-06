@extends('layout/master')

@section('judul','Login')

@section('konten')

	<div class="login-container">

		<div class="login-header login-caret" style="padding-top:25px; padding-bottom:25px">
			<div class="login-content">
				<img src="/images/logo.jpg" style="width: 10%">
				<br>
				<br>
				<p>Selamat Datang</p>
				<h2 style="color:white">SIPABAPEDA PLN Jember</h2>
				<p class="description">Sistem Informasi Pasang Baru dan Perubahan Daya</p>
			</div>
		</div>

		<div class="login-form">
			<div class="login-content">
				<?php echo Form::open(array('url'=>'/auth/login','method'=>'post'));?>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
								<i class="entypo-mail"></i>
							</div>
							<input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" autocomplete="on" />
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-key"></i>
							</div>

							<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block btn-login">
							<i class="entypo-login"></i>
							LOGIN
						</button>
					</div>
					<div class="form-group col-md-12">

							Belum punya akun? Klik <a href="{{url()}}/auth/register">disini</a>

					</div>

				</form>
			</div>

		</div>

	</div>
@endsection
