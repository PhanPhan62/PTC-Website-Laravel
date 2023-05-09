@extends('FrontEnd.layoutaccount')
@section('title', 'Sign up')
@section('Sign')
    <!-- Sign up form -->
    <section class="signup">
        <div class="container" style="height: 555px;">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">@yield('title')</h2>
                    <form method="POST" class="register-form" id="register-form"
                        onsubmit="return document.getElementById('agree-term').checked;">
                        @csrf

                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" required name="name" id="name" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" required name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" required name="password" id="pass" placeholder="Password" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" required name="re_pass" id="re_pass" placeholder="Repeat your password" />
                        </div> --}}
                        <div class="form-group">
                            <input type="checkbox" name="status" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" id="signup" class="form-submit" value="Register"
                                onclick="validateCheckbox();" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="login/images/signup-image.jpg" alt="sing up image"></figure>
                    <a style="text-decoration: none" href="{{ route('signin') }}" class="signup-image-link">I am already member</a>
                    <a style="text-decoration: none" href="{{ route('home') }}" class="signup-image-link">Back to Home</a>
                </div>
            </div>
        </div>
        <script>
            function validateCheckbox() {
                var checkbox = document.getElementById("agree-term");

                if (!checkbox.checked) {
                    alert("Hãy đồng ý với điều khoản chúng tôi đặt ra!!!");
                } 
                var password = document.getElementById("pass");
                var confirmPassword = document.getElementById("re_pass");

                function validatePassword() {
                    if (password.value != confirmPassword.value) {
                        confirmPassword.setCustomValidity("Mật khẩu không trùng nhau");
                    } else {
                        confirmPassword.setCustomValidity("");
                    }
                }

                password.onchange = validatePassword;
                confirmPassword.onkeyup = validatePassword;

            }
        </script>





    </section>
@endsection
