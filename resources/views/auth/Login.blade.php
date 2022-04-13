@extends('layouts.app')
@section('content')
    <section class="vh-100" style="background-color: #fff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="alert alert-success" id="msgID" style="display: none">
                        <h4 id="msgBody" class="text-white"></h4>
                    </div>
                    <div class="card mask-custom py-5" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block">
                                <div>
                                    <h1 class="logo fw-bold">i-ProSeS</h1>
                                </div>
                                <img src="{{ URL('img/RICHBLITZlogo.png') }}" alt="images" class="img-thumbnail">
                            </div>
                            <div class="col-md-6 col-lg-5 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0" style="color: #A6A6A8">Welcome back!</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                                            Login to access
                                            <strong>i-ProSeS</strong>
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <input id="email" type="email" id="form2Example17"
                                                class="form-control form-control-lg" placeholder="sample@gmail.com" />
                                            <label class="form-label" for="form2Example17"><i
                                                    class="fa-solid fa-user"></i> Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input id="password" type="password" id="form2Example27"
                                                class="form-control form-control-lg" placeholder="Password" />
                                            <label class="form-label" for="form2Example27"><i
                                                    class="fa-solid fa-lock"></i> Password</label>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center  mb-4">
                                            <!-- Checkbox -->
                                            <div class="form-check">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    id="form2Example3" />
                                                <label class="form-check-label" for="form2Example3">
                                                    Remember me
                                                </label>
                                            </div>
                                            <a href="#!" class="text-body">Forgot password?</a>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button id="login_btn" class="btn btn-primary btn-md" type="button"
                                                style="background-color: #35C496">Login</button>
                                        </div>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="/registration" style="color: #393f81;">Register here</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loader-wrapper">
                <span class="loader"><span class="loader-inner"></span></span>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
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

            //get date
            var today = new Date();

            var month = today.getMonth();
            var year = today.getFullYear();
            var date = today.getDate();
            var monthArray = new Array("January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December");

            var current_date = `${monthArray[month]} ${date}, ${year}`;

            var hours = today.getHours();
            var minutes = today.getMinutes();
            var seconds = today.getSeconds();
            var current_time = `${hours}:${minutes}:${seconds}`;

            console.log(current_date + " " + current_time);

            var userID;

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
                        userID = user.uid;
                        location.replace('/');
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
