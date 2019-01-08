@extends('master.master-template')

@section('title')
    Login
@endsection

@section('content')
    <div id="main" role="main">

        <!-- MAIN CONTENT -->
        <div id="content" class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="well no-padding">
                        <form role="form" method="POST" action="{{ url('/auth/login') }}" id="login-form" class="smart-form client-form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <header>
                                Inloggen
                            </header>

                            <fieldset>

                                <section>
                                    <label class="label">E-mail</label>
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                        <input type="text" name="email">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Vul uw e-mail adres of gebruikernaam in.</b></label>
                                </section>

                                <section>
                                    <label class="label">Wachtwoord</label>
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="password">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Vul uw wachtwoord in.</b> </label>
                                    <div class="note">
                                        {{--<a href="forgotpassword.html">Forgot password?</a>--}}
                                    </div>
                                </section>

                                <section>
                                    {{--<label class="checkbox">--}}
                                        {{--<input type="checkbox" name="remember" checked="">--}}
                                        {{--<i></i>Stay signed in</label>--}}
                                </section>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">
                                    Log in
                                </button>
                            </footer>
                        </form>

                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
