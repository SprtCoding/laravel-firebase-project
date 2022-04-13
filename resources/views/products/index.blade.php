@extends('layouts.app')
@section('content')
    <!-- Navbar -->
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
                    <h1 class="mt-2 font-weight-bold">Dashboard</h1>
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
                <div class="container">
                    <div class="align-center">
                        <div class="col-md-3 p-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Total Number of Items
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h1 class="font-weight-bold m"><span id="totalNumberOfItems"></span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Sold Items
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h1 class="font-weight-bold m"><span id="totalQuantity"></span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Available Items
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h1 class="font-weight-bold m"> <span id="availableProducts"></span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Total Sale
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h1 class="font-weight-bold m"><i class="fa-solid fa-peso-sign"></i> <span
                                            id="totalSale"></span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="align-center">
                        <div class="col-md-6 p-4">
                            <div class="card p-2">
                                <div class="card-header">
                                    <h3 class="card-title">bar graph</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col" style="width: 150px; height:400px;">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-4">
                            <div class="card p-2">
                                <div class="card-header">
                                    <h3 class="card-title">Total Sale per Day</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col" style="width: 150px; height:400px;">
                                            <canvas id="myChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card p-4 mt-4">
                        {{-- <div class="row">
                            <div class="col col-md-2 mb-4">
                                <select name="my_status" id="my_status" class="form-control form-control-md">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col col-md-1 mb-2">
                                <select name="my_status" id="my_status_day" class="form-control form-control-md">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="col col-md-2 mb-2">
                                <select name="my_status" id="my_status_year" class="form-control form-control-md">
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                            <div class="col col-md-5 mb-2">
                                <a id="apply-filter" href="#" class="btn btn-md btn-success"
                                    style="background-color: #35C496">Apply
                                    Filter</a>
                            </div>

                        </div> --}}
                        <div class="card-header">
                            <h3 class="card-title">Item Sale</h3>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th class="col col-md-3">
                                            <h4>Item List</h4>
                                        </th>
                                        <th class="col">
                                            <h4>Status</h4>
                                        </th>
                                        <th class="col">
                                            <h4>Quantity</h4>
                                        </th>
                                        <th class="col">
                                            <h4>Date of purchase</h4>
                                        </th>
                                        <th class="col">
                                            <h4>Time of purchase</h4>
                                        </th>
                                        <th class="col">
                                            <h4>Price</h4>
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

            <div class="loader-wrapper">
                <span class="loader"><span class="loader-inner"></span></span>
            </div>
        </div>
    </section>
    <!-- Navbar -->
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

            //global variable

            var tableIndex = 0;
            //check if user is login
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    // User is signed in, see docs for a list of available properties
                    // https://firebase.google.com/docs/reference/js/firebase.User
                    userID = user.uid;
                    var userEmail = user.email;

                    var starCountRef = firebase.database().ref('Users/' + userID +
                        '/name');
                    starCountRef.on('value', (snapshot) => {
                        const data = snapshot.val();
                        var name = $('#name').text(data);
                        var email = $('#myEmail').text(user.email);
                    });

                    var name;
                    var starCountRef1 = firebase.database().ref('Users/' + userID);
                    starCountRef1.on('value', (snapshot) => {
                        const data = snapshot.val();
                        name = data.name;

                        firebase.database().ref('UsersLogs/' + userID).set({
                            UID: userID,
                            UserEmail: userEmail,
                            UserName: name,
                            Date_of_login: current_date,
                            Hours_of_login: current_time,
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

                    var starCountRef1 = firebase.database().ref('UsersLogs/' + userID);
                    starCountRef1.on('value', (snapshot) => {
                        const data = snapshot.val();

                        firebase.database().ref('UsersLogs/' + userID).update({
                            UID: data.UID,
                            UserEmail: data.UserEmail,
                            UserName: data.UserName,
                            Date_of_login: data.Date_of_login,
                            Hours_of_login: data.Hours_of_login,
                            Date_of_logout: current_date,
                            Hours_of_logout: current_time,
                        });
                    });
                }
            });

            //throw ajax error
            var today = new Date();
            var month = today.getMonth();
            var year = today.getFullYear();
            var date = today.getDate();
            var monthArray = new Array("January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December");
            console.log(month);

            var current_date = `${monthArray[month]} ${date}, ${year}`;

            var hours = today.getHours();
            var minutes = today.getMinutes();
            var seconds = today.getSeconds();
            var current_time = `${hours}:${minutes}:${seconds}`;

            console.log(current_date + " " + current_time);
            $.fn.dataTable.ext.errMode = 'throw';

            const DATA_COUNT = 7;
            const NUMBER_CFG = {
                count: DATA_COUNT,
                min: -100,
                max: 100
            };

            const labels = [
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31',
            ];

            var ctx = document.getElementById('myChart1').getContext('2d');
            var myChart1 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: monthArray[month],
                        data: [],
                        backgroundColor: ['#F56769', '#35C496', '#26fae8'],
                        borderColor: [
                            '#F56769',
                            '#35C496',
                            '#26fae8'
                        ],
                        borderWidth: 1
                    }]
                }
            });

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    datasets: [{
                        label: 'Analytics Graph',
                        data: [],
                        backgroundColor: ['#F56769', '#35C496', '#26fae8'],
                        borderColor: [
                            '#F56769',
                            '#35C496',
                            '#26fae8'
                        ],
                        borderWidth: 1
                    }]
                }
            });

            function addData(chart, label, data) {
                chart.data.labels.push(label);
                chart.data.datasets.forEach((dataset) => {
                    dataset.data.push(data);
                });
                chart.update();
            }

            function addData1(chart, data) {
                chart.data.datasets.forEach((dataset) => {
                    dataset.data.push(data);
                });
                chart.update();
            }

            function addTotal(totalQuantitySold) {
                var totalItems = 0;
                var totalItem = 0;
                var valueRef = firebase.database().ref('Products');
                valueRef.on('value', (snapshot) => {
                    snapshot.forEach((childSnapshot) => {
                        var childData = childSnapshot.val();
                        totalItem += parseFloat(childData.quantity);
                        totalItems = totalItem + totalQuantitySold;
                    })
                    $('#totalNumberOfItems').text(totalItems);
                    addData(myChart, 'Total Number of Items', totalItems);
                });
            }

            //get the graph of price
            var totalsoldinmarch = 0;
            var totalsoldinmarch1 = 0;
            var totalsoldinmarch2 = 0;
            var totalsoldinmarch3 = 0;
            var totalsoldinmarch4 = 0;
            var totalsoldinmarch5 = 0;
            var totalsoldinmarch6 = 0;
            var totalsoldinmarch7 = 0;
            var totalsoldinmarch8 = 0;
            var totalsoldinmarch9 = 0;
            var totalsoldinmarch10 = 0;
            var totalsoldinmarch11 = 0;
            var totalsoldinmarch12 = 0;
            var totalsoldinmarch13 = 0;
            var totalsoldinmarch14 = 0;
            var totalsoldinmarch15 = 0;
            var totalsoldinmarch16 = 0;
            var totalsoldinmarch17 = 0;
            var totalsoldinmarch18 = 0;
            var totalsoldinmarch19 = 0;
            var totalsoldinmarch20 = 0;
            var totalsoldinmarch21 = 0;
            var totalsoldinmarch22 = 0;
            var totalsoldinmarch23 = 0;
            var totalsoldinmarch24 = 0;
            var totalsoldinmarch25 = 0;
            var totalsoldinmarch26 = 0;
            var totalsoldinmarch27 = 0;
            var totalsoldinmarch28 = 0;
            var totalsoldinmarch29 = 0;
            var totalsoldinmarch30 = 0;
            var totalsoldinmarch31 = 0;
            var myref = firebase.database().ref('ItemSell');
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '1' + ', ' + year).endAt(
                monthArray[month] + ' ' + '1' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch += childData.price;
                })
                addData1(myChart1, totalsoldinmarch);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '2' + ', ' + year).endAt(
                monthArray[month] + ' ' + '2' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch1 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch1);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '3' + ', ' + year).endAt(
                monthArray[month] + ' ' + '3' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch2 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch2);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '4' + ', ' + year).endAt(
                monthArray[month] + ' ' + '4' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch3 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch3);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '5' + ', ' + year).endAt(
                monthArray[month] + ' ' + '5' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch4 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch4);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '6' + ', ' + year).endAt(
                monthArray[month] + ' ' + '6' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch5 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch5);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '7' + ', ' + year).endAt(
                monthArray[month] + ' ' + '7' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch6 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch6);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '8' + ', ' + year).endAt(
                monthArray[month] + ' ' + '8' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch7 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch7);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '9' + ', ' + year).endAt(
                monthArray[month] + ' ' + '9' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch8 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch8);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '10' + ', ' + year).endAt(
                monthArray[month] + ' ' + '10' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch9 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch9);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '11' + ', ' + year).endAt(
                monthArray[month] + ' ' + '11' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch10 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch10);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '12' + ', ' + year).endAt(
                monthArray[month] + ' ' + '12' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch11 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch11);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '13' + ', ' + year).endAt(
                monthArray[month] + ' ' + '13' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch12 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch12);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '14' + ', ' + year).endAt(
                monthArray[month] + ' ' + '14' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch13 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch13);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '15' + ', ' + year).endAt(
                monthArray[month] + ' ' + '15' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch14 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch14);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '16' + ', ' + year).endAt(
                monthArray[month] + ' ' + '16' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch15 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch15);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '17' + ', ' + year).endAt(
                monthArray[month] + ' ' + '17' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch16 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch16);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '18' + ', ' + year).endAt(
                monthArray[month] + ' ' + '18' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch17 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch17);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '19' + ', ' + year).endAt(
                monthArray[month] + ' ' + '19' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch18 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch18);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '20' + ', ' + year).endAt(
                monthArray[month] + ' ' + '20' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch19 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch19);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '21' + ', ' + year).endAt(
                monthArray[month] + ' ' + '21' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch20 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch20);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '22' + ', ' + year).endAt(
                monthArray[month] + ' ' + '22' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch21 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch21);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '23' + ', ' + year).endAt(
                monthArray[month] + ' ' + '23' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch22 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch22);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '24' + ', ' + year).endAt(
                monthArray[month] + ' ' + '24' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch23 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch23);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '25' + ', ' + year).endAt(
                monthArray[month] + ' ' + '25' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch24 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch24);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '26' + ', ' + year).endAt(
                monthArray[month] + ' ' + '26' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch25 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch25);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '27' + ', ' + year).endAt(
                monthArray[month] + ' ' + '27' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch26 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch26);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '28' + ', ' + year).endAt(
                monthArray[month] + ' ' + '28' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch27 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch27);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '29' + ', ' + year).endAt(
                monthArray[month] + ' ' + '29' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch28 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch28);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '30' + ', ' + year).endAt(
                monthArray[month] + ' ' + '30' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch29 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch29);
            });
            myref.orderByChild('date_of_purchase').startAt(monthArray[month] + ' ' + '31' + ', ' + year).endAt(
                monthArray[month] + ' ' + '31' + ', ' + year).on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalsoldinmarch30 += childData.price;

                })
                addData1(myChart1, totalsoldinmarch30);
            });

            var totalItem = 0;
            var totalSale = 0;
            var totalprice = 0;

            var valueRef = firebase.database().ref('Products');
            valueRef.on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalItem += parseFloat(childData.quantity);
                })
                $('#availableProducts').text(totalItem);
                addData(myChart, 'Available Items', totalItem);
            });

            var valueRef = firebase.database().ref('ItemSell');
            valueRef.on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalSale += parseFloat(childData.total_items);
                    totalprice += parseFloat(childData.price);
                })
                addData(myChart, 'Item Sold', totalSale);
                addTotal(totalSale);
            });

            //datatables
            var ref = firebase.database().ref('ItemSell');

            var dataset = [];
            var table = $('#myTable').DataTable({
                deferRender: true,
                scrollY: 230,
                scroller: {
                    loadingIndicator: true,
                    displayBuffer: 20
                },
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'All']
                ],
                data: dataset
            });

            //fetch data in datatables
            ref.on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    totalSale += childData.total_sale;
                    dataset = [childData.item_list, childData.status,
                        childData.total_items,
                        childData.date_of_purchase, childData
                        .time_of_purchase, childData.price
                    ];
                    table.rows.add([dataset]).draw();
                });
            })
            //year sorting
            var year;
            var year_sort = document.getElementById('my_status_year');

            //day sorting
            var day;
            var day_sort = document.getElementById('my_status_day');

            //date sorting
            var month;
            var date_sort = document.getElementById('my_status');

            var apply = document.getElementById('apply-filter');

            {{-- apply.addEventListener('click', () => {
                month = date_sort.value;
                day = day_sort.value;
                year = year_sort.value;

                ref.orderByChild('date_of_purchase').startAt(month + " " + day + ", " + year)
                    .endAt(month + " " + day + ", " + year + "\uf8ff").on('value', (snapshot) => {
                        snapshot.forEach((childSnapshot) => {
                            var childKey = childSnapshot.key;
                            var childData = childSnapshot.val();
                            dataset = [childData.item_list, childData.status, childData
                                .total_sale,
                                childData.date_of_purchase, childData.time_of_purchase,
                                childData.price
                            ];
                            table.rows.add([dataset]).draw();
                        });
                    })
            }); --}}

            //total sale

            var total = 0;
            ref.on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    total += childData.price;
                });
                $("#totalSale").text(total);
            });

            //total quantity sale
            var ref = firebase.database().ref('ItemSell');

            ref.on('value', (snapshot) => {
                var total = 0;
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    total += parseFloat(childData.total_items);
                });
                console.log(total);
                $("#totalQuantity").text(total);
            });

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

            {{-- //fetch product data
            firebase.database().ref('ItemSell/').orderByChild("time_of_purchase").limitToFirst(6).on('value', function(snapshot) {
                var productDATA = snapshot.val();

                var TableData = [];
                $.each(productDATA, function(index, value) {
                    //check if snapshot has data

                    if (value) {
                        if (value.status == "Available") {
                            TableData.push(
                                '<tr>\
                                    <td class="h6">' +
                                value
                                .item_list +
                                '</td>\
                                    <td><p class="stock text-center h6">' +
                                value
                                .status +
                                '</p></td>\
                                    <td><p class="h6 total">' +
                                value
                                .total_sale +
                                '</p></td>\
                                    <td><p class="h6 total1">' +
                                value.price +
                                '</p></td>\
                                    <td>\
                                    </tr>'
                            );
                        }
                    }
                })
                $('#ProductsData').html(TableData);

            })

            //session message
            function MsgSession(msg) {
                $('#msgID').css('display', 'block');
                $('#msgBody').text(msg);
                setTimeout(() => {
                    $('#msgID').css('display', 'none');
                    $('#msgBody').text('');
                }, 3000)
            } --}}

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
