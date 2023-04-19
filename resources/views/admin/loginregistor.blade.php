<x-HeadComponent css="home_header.css"></x-HeadComponent>
<body style="background-color:#FCFAF2;">
@include('front_end.layouts.header')
<div class="login-register-area"  >
    @if(session('status'))
        <div style="text-align: center; background-color:red; font-size:20px; height:fit-content; padding:10px; font-weight:bold; font-family: Apple">

            {{ session('status') }}

        </div>
    @endif
    <div class="login-register-wrapper" >
        <div class="login-register-tab-list nav" style="max-width: 550px;">
            <a class="active" data-toggle="tab" href="#lg1">
                <h4> login </h4>
            </a>
            <a data-toggle="tab" href="#lg4">
                <h4> change password </h4>
            </a>
            <a data-toggle="tab" href="#lg5">
                <h4> forgot password </h4>
            </a>
        </div>
        <div class="tab-content" style="display:flex;justify-content:center;">
            <div id="lg1" class="tab-pane active" >
                <div class="login-form-container" style=" border-radius: 15px;">
                    <div class="login-register-form">
                        <form action="{{ route('postLogin') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="EMAIL" placeholder="EMAIL" style="border-radius: 15px;">
                            <input type="password" name="PASSWORD" placeholder="PASSWORD" style="border-radius: 15px;">
                            <div class="button-box">
                                <div class="login-toggle-btn">
                                    <input type="checkbox" name="remember" value="1">
                                    <label>Remember me</label>
                                </div>
                                <div class="login_group" style="">
                                    <button class="default-btn" type="submit">Login</button>
                                    <div style="text-align:center; font-size:1.3rem;font-weight:bolder">___or___</div>
                                    <div class="other_login" style="text-align:center;">
                                        <button class="default-btn" type="submit"><i class="fa fa-facebook"></i></button>
                                        <button class="default-btn" type="submit"><i class="fa fa-twitter"></i></button>
                                        <button class="default-btn" type="submit"><i class="fa fa-google"></i></button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div id="lg2" class="tab-pane">
                <div class="login-form-container" style=" border-radius: 15px;">
                    <div class="login-register-form">
                        <form action="#" method="post">
                            <input type="text" name="old-password" placeholder="Old password" style="border-radius: 15px;">
                            <input type="password" name="new-password" placeholder="New password" style="border-radius: 15px;">
                            <div class="button-box">
                                <div class="login_group" style="">
                                    <button class="default-btn" type="submit">Change</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div id="lg3" class="tab-pane">
                <div class="login-form-container" style=" border-radius: 15px;">
                    <div class="login-register-form">
                        <form action="#" method="post">
                            <input name="user-email" placeholder="Email" type="email" style="border-radius: 15px;">
                            <div class="button-box">

                                <div class="login_group" style="">
                                    <button class="default-btn" type="submit">Reset password</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('front_end.layouts.footer')
</body>

</html>
