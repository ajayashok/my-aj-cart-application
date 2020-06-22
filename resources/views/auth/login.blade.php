<!DOCTYPE html>
<html>
<head>
    <title>AJ-CART LOGIN</title>

   {{ Html::style('css/bootstrap.min.css') }}
   {{ Html::style('css/login.css') }}
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <h4 class="text-success"><strong>AJ-CART LOGIN</strong></h4>
            <p id="profile-name" class="profile-name-card"></p>
            <form method="POST" action="{{ route('login') }}" class="form-signin">
                    @csrf
                <span id="reauth-email" class="reauth-email"></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="clear">
                <br>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember
                    </label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>

<script type="text/javascript">        
    {{ Html::script('js/bootstrap.min.js')}}
    {{ Html::script('js/jquery.min.js')}}
</script>
</body>
</html>