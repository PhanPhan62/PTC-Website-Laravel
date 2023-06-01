@extends('FrontEnd.layoutaccount')
@section('title', 'Sign in')
@section('Sign')


    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="login/images/signin-image.jpg" alt="sing up image"></figure>
                    <a style="text-decoration: none" href="{{ route('signup') }}" class="signup-image-link">Create an
                        account</a>
                    <a style="text-decoration: none" href="{{ route('home') }}" class="signup-image-link">Back to Home</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">@yield('title')</h2>
                    <form method="POST" class="register-form" id="login-form" action="{{ route('postSignin') }}">
                        @csrf
                        {{-- <div class="form-group"> --}}
                        {{-- <div class="select-box">

                            <label for="select-box1" class="label select-box1"><span class="label-desc">Choose your
                                    Power</span> </label>
                            <select required style="cursor: pointer;" id="select-box1" class="select" name="power">
                                @foreach ($powers as $item)
                                    @if ($item->power == 0)
                                        <option value="{{ $item->id }}">Admin</option>
                                    @elseif ($item->power == 1)
                                        <option value="{{ $item->id }}" selected>Nhân Viên</option>
                                    @else
                                        <option value="{{ $item->id }}">Khách Hàng</option>
                                    @endif
                                @endforeach
                                {{-- <option value="Choice 1">Falkland Islands</option>
                                <option value="Choice 2">Germany</option>
                                <option value="Choice 3">Neverland</option> 
                            </select>

                        </div> --}}
                        {{-- </div> --}}
                       
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" required name="email" id="your_name" placeholder="Email@example.com" />

                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" required name="password" id="your_pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" id="signin" class="form-submit" value="Log in" />
                        </div>
                    </form>

                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
