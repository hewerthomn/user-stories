<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/favicon.ico">

	<title>Stories | Login</title>

	<link href="/css/bootstrap-paper.min.css" rel="stylesheet">
	<link href="/css/login.css" rel="stylesheet">
</head>
<body>
	<div class="container">

		{!! Notification::showAll() !!}

		<h2 class="text-center">Stories</h2>
		<br>
		<br>

		<div class="row">
			<div class="col-md-offset-2 col-md-4">
				<div class="img-responsive">
					<img src="/img/logo.png" style="width:100%" alt="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading h4">
						<span class="text-primary">
							Login
						</span>

						<small class="pull-right"><small>
							{{ date('D') }}, {{ date('d') }} {{ date('M') }}
						</small></small>
					</div>
					<div class="panel-body">
						<form method="POST" action="/auth/login">
							{!! csrf_field() !!}

							<div class="form-group">
								<label for="email">Email</label>
								<input autofocus type="email" name="email" class="form-control" placeholder="Your email" tabindex="1" value="{{ old('email') }}" required>
							</div>

							<div>
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" placeholder="Your password" tabindex="2" id="password" required>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" tabindex="4"> Remember me
								</label>
							</div>

							<div>
								<button type="submit" class="btn btn-block btn-primary" tabindex="3">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div><!-- /.container -->

	<footer class="text-center">
		<small><b>{{ date('Y') }}</b> - Stories</small>
	</footer>

	<script src="/packages/jquery/dist/jquery.min.js"></script>
	<script src="/packages/bootstrap//dist/js/bootstrap.min.js"></script>
</body>
</html>