@extends('layouts.app')
@section('content')
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="alert alert-success" id="msgID" style="display: none">
                        <h4 id="msgBody" class="text-white"></h4>
                    </div>
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Logo</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Email address</label>
                                            <input id="email" type="email" id="form2Example17"
                                                class="form-control form-control-lg" placeholder="sample@gmail.com" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input id="password" type="password" id="form2Example27"
                                                class="form-control form-control-lg" placeholder="Password" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button id="login_btn" class="btn btn-dark btn-lg btn-block"
                                                type="button">Login</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="/registration" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            const firebaseConfig = {
                apiKey: "AIzaSyBeQI2S_A-hJghcxi921OBP8pd5ap-V0D8",
                authDomain: "laravel-crud-4c773.firebaseapp.com",
                databaseURL: "https://laravel-crud-4c773-default-rtdb.firebaseio.com",
                projectId: "laravel-crud-4c773",
                storageBucket: "laravel-crud-4c773.appspot.com",
                messagingSenderId: "1045849305749",
                appId: "1:1045849305749:web:e2be80f675219dff4b219c",
                measurementId: "G-W4YQBFXH9K"
            };

            firebase.initializeApp(firebaseConfig);
            firebase.analytics();

            $("#login_btn").on('click', function() {
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;
                if (email == "") {
                    MsgSession("Email is required!");
                } else if (password == "") {
                    MsgSession("Password is required!");
                }
                firebase.auth().signInWithEmailAndPassword(email, password)
                    .then((userCredential) => {
                        // Signed in
                        const user = firebase.auth().currentUser;
                        const userEmail = user.email;
                        MsgSession(userEmail);
                        // ...
                    })
                    .catch((error) => {
                        const errorCode = error.code;
                        const errorMessage = error.message;
                        MsgSession(errorMessage);
                    });
            });
            //session message
            function MsgSession(msg) {
                $('#msgID').css('display', 'block');
                $('#msgBody').text(msg);
                setTimeout(() => {
                    $('#msgID').css('display', 'none');
                    $('#msgBody').text('');
                }, 3000)
            }

        })
    </script>
@endpush
