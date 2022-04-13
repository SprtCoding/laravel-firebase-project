@extends('layouts.app')
@section('content')
    <section class="vh-100" style="background-color: #fff;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="alert alert-success" id="msgID" style="display: none">
                        <h4 id="msgBody" class="text-white"></h4>
                    </div>
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row">
                                <h1 class="logo fw-bold">i-ProSeS</h1>
                            </div>
                            <div class="row">
                                <p class="create-text">Create your <strong>i-ProSeS</strong> Account</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                                    <form class="mx-1 mx-md-4">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">

                                                        <input id="name" type="text" id="form3Example1c"
                                                            class="form-control form-control-lg" />
                                                        <label class="form-label" for="form3Example1c">First
                                                            Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-6">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input id="Lastname" type="text" id="form3Example1c"
                                                            class="form-control form-control-lg" />
                                                        <label class="form-label" for="form3Example1c">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input id="email" type="email" id="form3Example3c"
                                                            class="form-control form-control-lg"
                                                            aria-describedby="basic-addon2" />
                                                        <label class="form-label" for="form3Example3c">Your
                                                            Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">

                                                        <input id="password" type="password" id="form3Example4c"
                                                            class="form-control form-control-lg" placeholder="Password" />
                                                        <label class="form-label" for="form3Example4c">Password</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col col-md-6">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">

                                                        <input id="confirm_password" type="password" id="form3Example4cd"
                                                            class="form-control form-control-lg"
                                                            placeholder="Confirm password" />
                                                        <label class="form-label" for="form3Example4cd">Confirm
                                                            password</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button id="register" type="button"
                                                class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <label class="form-check-label" for="form2Example3">
                                                Already have an accaount? <a href="/login">login</a>
                                            </label>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-8 col-lg-4 col-xl-6 d-flex align-items-center order-1 order-lg-2">

                                    <img src="{{ URL('img/RICHBLITZlogo.png') }}" alt="images" class="img-thumbnail">

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

            $("#register").on('click', function() {
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;
                var name = document.getElementById('name').value;
                var Lastname = document.getElementById('Lastname').value;
                var confirm_password = document.getElementById('confirm_password').value;
                if (email == "") {
                    MsgSession("Email is required!");
                } else if (password == "") {
                    MsgSession("Password is required!");
                } else if (Lastname == "") {
                    MsgSession("Lastname is required!");
                } else if (name == "") {
                    MsgSession("Name is required!");
                } else if (confirm_password == "") {
                    MsgSession("please re-type your password!");
                }
                if (password != confirm_password) {
                    MsgSession("Password not match!");
                } else {
                    firebase.auth().createUserWithEmailAndPassword(email, password)
                        .then((userCredential) => {
                            // Signed in
                            var user = userCredential.user;
                            // ...
                            const userID = user.uid;
                            firebase.database().ref('Users/' + userID).set({
                                uid: userID,
                                email: email,
                                name: name,
                                Lastname: Lastname,
                            });
                            MsgSession("Account created successfully!");
                            location.replace('/login');
                        })
                        .catch((error) => {
                            const errorCode = error.code;
                            const errorMessage = error.message;
                            MsgSession(errorMessage);
                            // ..
                        });
                }


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
