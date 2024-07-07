<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ECVolunteers</title>
    <link rel="stylesheet" href="{{ asset('_voler/dist/assets/css/bootstrap.css') }}">
    <link rel="shortcut icon" href="{{ asset('_voler/dist/assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('_voler/dist/assets/css/app.css') }}">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <h4>Trader Governance Information System</h4>
                        <p>Please sign-in to your account</p>
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    </div>

					<form action="{{ route('trader.login.process') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="username" name="username">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback">

							</div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                                <a href="auth-forgot-password.html" class='float-end'>
                                    <small>Forgot password?</small>
                                </a>
                            </div>
                            <div class="position-relative">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback">

							</div>
                        </div>
                        <div class="float-start">
                            <a href="{{ route('trader.register') }}">Don't have an account?</a>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-end">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="{{ asset('_voler/dist/assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('_voler/dist/assets/js/app.js') }}"></script>
    
    <script src="{{ asset('_voler/dist/assets/js/main.js') }}"></script>
</body>

</html>