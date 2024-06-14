@extends("layouts.default")
@section("title", "registartion")

@section("content")
<main class="login-form mt-5" style="width: 100%">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if (session()->has("success"))
                <div class="alert alert-success">
                    {{session()->get("success")}}
                </div>
                @endif

                @if (session()->has("error"))
                <div class="alert alert-success">
                    {{session()->get("error")}}
                </div>
                @endif
                <div class="card">
                    <h3 class="card-header text-center">Register</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.post') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="fullName" class="form-control" name="fullName"
                                    autofocus>
                                @if ($errors->has('fullname'))
                                <span class="text-danger">{{ $errors->first('fullName') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <a href="{{ route('stripe.checkout',['price' => 10,'product' => 'silver']) }}">Make Payment</a>


                            <div class="form-group mb-5">
                                {!!getCaptchaBox('txtAnswer')!!}


                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign Up</button>
                            </div>
                            <div class="col-md-10 mt-3">
                            <p class="fs-5 text-center"><a href="{{route('register')}}" style="text-decoration: none;"><a href="{{route('login')}}">Allready have an account</a></p>
                          </div> 
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection