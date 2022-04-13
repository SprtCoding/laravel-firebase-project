@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand d-flex flex-column align-items-center" id="sidebar">
        <a href="/" class="navbar-brand text-align mt-4 text-light">
            <div>
                <h3 class="logo display-8 font-weight-bold" style="color: #fff;">i-ProSeS</h3>
                <img src="{{ URL('img/RICHBLITZlogo.png') }}" alt="images" class="logo" width="100px"
                    height="100px">
            </div>
        </a>
        <i class="fa-solid fa-bars" id="menu-btn"></i>
        <ul class="navbar-nav d-flex flex-column w-100 p-3">
            <li class="nav-item w-100">
                <a href="/" class="nav-link text-light"><i class="fa-solid fa-laptop"></i> <span
                        class="nav-text">Dashboard</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="/inventory" class="nav-link text-light"><i class="fa-solid fa-box"></i> <span
                        class="nav-text">Inventory</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="/analytics" class="nav-link text-light"><i class="fa-solid fa-percent"></i> <span
                        class="nav-text">Point of Sale</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="/reports" class="nav-link text-light"><i class="fa-solid fa-chart-column"></i> <span
                        class="nav-text">Reports</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="/logs" class="nav-link text-light"><i class="fa-solid fa-clock-rotate-left"></i> <span
                        class="nav-text">Logs</span></a>
            </li>
            <li class="nav-item w-100">
                <a href="#" class="nav-link text-light"><i class="fa-solid fa-gear"></i> <span
                        class="nav-text">Admin</span></a>
            </li>
            <li class="nav-item w-100"><a href="#" class="nav-link text-light" id="logout_btn"><i
                        class="fas fa-sign-out-alt"></i><span class="nav-text">Signout</span></a>
            </li>
        </ul>
    </nav>

    <section class="p-4 my-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-9">
                    <h1 class="mt-2 font-weight-bold">Logs</h1>
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
            <div class="row mt-4">
                <div class="col-md-8">
                    <h2>Items</h2>
                    <div class="row mt-4">
                        <div class="col">
                            <table id="dataTable" class="table">
                                <thead>
                                    <tr>
                                        <th class="col col-md-3" scope="col">
                                            <h5>Product Name</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Price</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Quantity</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Date</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Time</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>User</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 userCol">
                    <h2>Users</h2>
                    <div class="row mt-4">
                        <div class="col">
                            <table id="dataTable1" class="table">
                                <thead>
                                    <tr>
                                        <th class="col col-md-3" scope="col">
                                            <h5>UserName</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Time-in</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Date-in</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
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
            var myName;

            //check if user is login
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    // User is signed in, see docs for a list of available properties
                    // https://firebase.google.com/docs/reference/js/firebase.User
                    var uid = user.uid;

                    var starCountRef = firebase.database().ref('Users/' + uid + '/name');
                    starCountRef.on('value', (snapshot) => {
                        const data = snapshot.val();
                        myName = data;
                        var name = $('#name').text(data);
                        var email = $('#myEmail').text(user.email);
                    });

                    console.log(uid);

                    var starCountRef = firebase.database().ref('UsersLogs/' + uid);
                    starCountRef.on('value', (snapshot) => {
                        const data = snapshot.val();
                        myName = data;
                        var name = $('#date').text(data.Date_of_login);
                        var email = $('#hours').text(data.Hours_of_login);
                    });

                    var ref = firebase.database().ref('ItemSell/');
                    var dataset = [];
                    var table = $('#dataTable').DataTable({
                        pageLength: 5,
                        lengthMenu: [
                            [5, 10, 20, -1],
                            [5, 10, 20, 'All']
                        ],
                        data: dataset,
                    });

                    var ref1 = firebase.database().ref('UsersLogs/');
                    var dataset1 = [];
                    var table1 = $('#dataTable1').DataTable({
                        pageLength: 5,
                        lengthMenu: [
                            [5, 10, 20, -1],
                            [5, 10, 20, 'All']
                        ],
                        data: dataset1,
                    });
                    //fetch data in datatables
                    ref.once('value', (snapshot) => {
                        snapshot.forEach((childSnapshot) => {
                            var childData = childSnapshot.val();
                            dataset = [
                                childSnapshot.child('item_list').val(),
                                childSnapshot.child('price').val(),
                                childSnapshot.child('total_items').val(),
                                childSnapshot.child('date_of_purchase').val(),
                                childSnapshot.child('time_of_purchase').val(),
                                childSnapshot.child('user_out').val(),
                            ];
                            table.rows.add([dataset]).draw();
                            $('#user').text(childSnapshot.child('user_out').val());
                        });
                    });

                    //fetch data in datatables
                    ref1.once('value', (snapshot) => {
                        snapshot.forEach((childSnapshot) => {
                            var childData = childSnapshot.val();
                            dataset1 = [
                                childSnapshot.child('UserName').val(),
                                childSnapshot.child('Hours_of_login').val(),
                                childSnapshot.child('Date_of_login').val(),
                            ];
                            table1.rows.add([dataset1]).draw();
                        });
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
