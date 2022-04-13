@extends('layouts.app')
@section('content')
<!-- Navbar -->
    <nav class="navbar navbar-expand d-flex flex-column align-items-center" id="sidebar">
        <a href="/" class="navbar-brand text-align mt-4 text-light">
            <div>
                <h3 class="logo display-8 font-weight-bold" style="color: #fff;">i-ProSeS</h3>
                <img src="{{ URL('img/RICHBLITZlogo.png') }}" alt="images" class="logo" width="100px" height="100px">
            </div>
        </a>
        <i class="fa-solid fa-bars" id="menu-btn"></i>
        <ul class="navbar-nav d-flex flex-column w-100 p-3">
            <li class="nav-item w-100">
                <a href="/" class="nav-link text-light"><i class="fa-solid fa-laptop"></i> <span class="nav-text">Dashboard</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="/inventory" class="nav-link text-light"><i class="fa-solid fa-box"></i> <span class="nav-text">Inventory</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="/analytics" class="nav-link text-light"><i class="fa-solid fa-percent"></i> <span class="nav-text">Point of Sale</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="/reports" class="nav-link text-light"><i class="fa-solid fa-chart-column"></i> <span class="nav-text">Reports</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="/logs" class="nav-link text-light"><i class="fa-solid fa-clock-rotate-left"></i> <span
                        class="nav-text">Logs</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="#" class="nav-link text-light"><i class="fa-solid fa-gear"></i> <span class="nav-text">Admin</span></a>
            </li>
            <li class="nav-item w-100"><a href="#" class="nav-link text-light" id="logout_btn"><i class="fas fa-sign-out-alt"></i><span class="nav-text">Signout</span></a>
            </li>
        </ul>
    </nav>

    //section

    <section class="p-4 my-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-9">
                    <h1 class="mt-2 font-weight-bold">Customer Receipt</h1>
                </div>
                <div class="col">
                    <!-- Avatar -->
                    <ul id="avatar" class="navbar-nav d-flex align-items-center flex-row">
                        <li class="nav-item dropdown">
                            <div class="px-3 pt-3 d-flex">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                                    class="rounded-circle me-3" height="40" alt="" loading="lazy" />
                                <div>
                                    <h6 id="name" class="mb-0"></h6>
                                    <p id="myEmail" class="mb-2"></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="h3 mt-4" style="color: #5E5E5E;">The transaction has been processed securely.</p>
                    <hr />
                </div>
            </div>
            <div class="row">
                <div class="col col-md-2">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Sold to: </p>
                </div>
                <div class="col col-md-6">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Walk-in </p>
                </div>
                <div class="col col-md-1">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Order Type:  </p>
                </div>
                <div class="col col-md-2">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Quick Sale </p>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-2">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Order No.: </p>
                </div>
                <div class="col col-md-6">
                    <p class="h3 mt-4" style="color: #5E5E5E;">XYZ125545854585 </p>
                </div>
                <div class="col col-md-1">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Date:  </p>
                </div>
                <div class="col col-md-2">
                    <p class="h3 mt-4" style="color: #5E5E5E;">August 30, 2021 </p>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-2">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Sale Person: </p>
                </div>
                <div class="col col-md-6">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Admin </p>
                </div>
                <div class="col col-md-1">
                    <p class="h3 mt-4" style="color: #5E5E5E;">Order Time:  </p>
                </div>
                <div class="col col-md-2">
                    <p class="h3 mt-4" style="color: #5E5E5E;">1:03:23 PM </p>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-8 p-2"><p class="h3 mt-4" style="color: #5E5E5E;">Item/s </p></th>
                            <th class="col p-2"><p class="h3 mt-4" style="color: #5E5E5E;">Price</p></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-8 p-2">
                                <p class="h3 mt-4" style="color: #000;">Classic Cheezy Cake Bars &nbsp;&nbsp;&nbsp; <span>x1</span></p>
                                <p class="h3 mt-4" style="color: #000;">Cheese Bread &nbsp;&nbsp;&nbsp; <span>x1</span></p>
                                <p class="h3 mt-4" style="color: #000;">Carrot Cupcake with Cream Cheese Frosting &nbsp;&nbsp;&nbsp; <span>x1</span></p>
                            </td>
                            <td class="col p-2">
                                <p class="h3 mt-4" style="color: #000;">P <span>250</span></p>
                                <p class="h3 mt-4" style="color: #000;">P <span>75</span></p>
                                <p class="h3 mt-4" style="color: #000;">P <span>300</span></p>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="col-md-6 p-2">
                                <p class="h3 mt-4" style="color: #5E5E5E;"></p>
                            </td>
                            <td class="col p-2">
                                <p class="h3 mt-4" style="color: #5E5E5E;">Total Cost: &nbsp;&nbsp; <strong>P <span>625</span></strong></p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
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

        //firebase credentials
        const firebaseConfig = {
            apiKey: "{{ config('services.firebase.apiKey') }}",
            authDomain: "{{ config('services.firebase.authDomain') }}",
            projectId: "{{ config('services.firebase.projectId') }}",
            storageBucket: "{{ config('services.firebase.storageBucket') }}",
            messagingSenderId: "{{ config('services.firebase.messagingSenderId') }}",
            appId: "{{ config('services.firebase.appId') }}",
            measurementId: "{{ config('services.firebase.measurementId') }}",
            databaseURL: "{{ config('services.firebase.databaseURL') }}"
        };

        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        //menu
        var menu = document.querySelector("#menu-btn");
        var sidebar = document.querySelector("#sidebar");
        var container = document.querySelector(".my-container");

        menu.addEventListener('click', () => {
            sidebar.classList.toggle("active");
            container.classList.toggle("active-cont");
        });

        //mouse over
        menu.onmouseover = function() {
            sidebar.classList.toggle("active");
            container.classList.toggle("active-cont");
        }
        //global variable

        var tableIndex = 0;

        //check if user is login
        firebase.auth().onAuthStateChanged((user) => {
            if (user) {
                // User is signed in, see docs for a list of available properties
                // https://firebase.google.com/docs/reference/js/firebase.User
                var uid = user.uid;

                var starCountRef = firebase.database().ref('Users/' + uid + '/name');
                starCountRef.on('value', (snapshot) => {
                    const data = snapshot.val();
                    var email = $('#name').text(data);
                    var email = $('#myEmail').text(user.email);
                });

                btnLogoutShow();

                $('#logout_btn').on('click', function() {
                    firebase.auth().signOut().then(() => {
                        // Sign-out successful.
                        MsgSession("Logout successfully");
                        var email = $('#myEmail').text("");
                        location.replace('/login');
                        btnLoginShow();
                    }).catch((error) => {
                        // An error happened.
                        MsgSession("Logout un-successfully");
                        btnLogoutShow();
                    });
                });
            } else {
                // User is signed out
                btnLoginShow();
                $('#txt').text("Not Login. please login to your account");
                location.replace('/login');
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

        //create function


        //fetch product data


        //update function


        //edit function


        //delete function



        //session message


        //clear inpupt

        function btnLogoutShow() {
            $('#login_btn').css("display", "none");
            $('#signup_btn').css("display", "none");
            $('#avatar').css("display", "block");
        }

        function btnLoginShow() {
            $('#login_btn').css("display", "block");
            $('#signup_btn').css("display", "block");
            $('#avatar').css("display", "none");
        }
    })
</script>

@endpush
