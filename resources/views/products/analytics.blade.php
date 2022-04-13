@include('products.addToCartModal')
@extends('layouts.app')
@section('content')
    <!-- Navbar -->
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
                    <h1 class="mt-2 font-weight-bold">Point of Sale</h1>
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
            {{-- <div class="row mt-5">
                <div class="col col-md-2">
                    <label for="Search">Product Name</label>
                    <div class="input-group rounded mb-2">
                        <input id="searchName" type="search" class="form-control rounded" placeholder="Search"
                            aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
                <div class="col col-md-2">
                    <label for="search-item-no">Item No.</label>
                    <div class="input-group rounded mb-2">
                        <input id="search-item-no" type="search" class="form-control rounded" placeholder="Search"
                            aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
                <div class="col col-md-2">
                    <a id="apply-filter" href="#" class="btn btn-success mt-4" style="background-color: #35C496">Apply
                        Filter</a>
                </div>
            </div> --}}
            <div class="row">
                <div class="col">
                    <div class="alert alert-success" id="msgID" style="display: none">
                        <h4 id="msgBody" class="text-white"></h4>
                    </div>
                    <div class="card p-4 mt-4">
                        <h4>List of Available Products</h4>
                        <div class="card-body">
                            <table id="dataTable" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <h5>Product ID</h5>
                                        </th>
                                        <th scope="col">
                                            <h5>Product Name</h5>
                                        </th>
                                        <th scope="col">
                                            <h5>Price</h5>
                                        </th>
                                        <th scope="col">
                                            <h5>Quantity</h5>
                                        </th>
                                        <th scope="col">
                                            <h5>Status</h5>
                                        </th>
                                        <th scope="col">
                                            <h5>Actions</h5>
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
            <div class="row">
                <div class="col mt-4">
                    <div class="card p-4">
                        <h4>Cart Items</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col col-md-3" scope="col">
                                        <h5>Product Name</h5>
                                    </th>
                                    <th class="col" scope="col">
                                        <h5>Item Code</h5>
                                    </th>
                                    <th class="col" scope="col">
                                        <h5>Price</h5>
                                    </th>
                                    <th class="col" scope="col">
                                        <h5>Quantity</h5>
                                    </th>
                                    <th class="col" scope="col">
                                        <h5>Status</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="cartData">

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col col-md-8">
                                <button id="buyBtn" class="btn btn-success mt-4"
                                    style="background-color: #35C496">Buy</button>
                            </div>
                            <div class="col mt-4">
                                <h3>Total : <i class="fa-solid fa-peso-sign"></i> <span id="totalItemSold"></span></h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-solid fa-circle-info"></i>
                        &nbsp;&nbsp;
                        <strong class="me-auto">Product is out</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Successfully added to Sale stocks.
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
        var reload = $(window).on("load", function() {
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

            //datatables
            var fileEdit;
            var ref = firebase.database().ref('Products');

            var dataset = [];
            var table = $('#dataTable').DataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'All']
                ],
                data: dataset,
                columnDefs: [{
                        targets: [0],
                        visible: false,
                    },
                    {
                        targets: -1,
                        defaultContent: '<div class="wrapper text-center"><div class="btn-group"><button id="buyProduct" class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button></div></div>'
                    }
                ]
            });

            //fetch data in datatables
            ref.once('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var childData = childSnapshot.val();
                    dataset = [
                        childSnapshot.key,
                        childSnapshot.child('product_name').val(),
                        childSnapshot.child('price').val(),
                        childSnapshot.child('quantity').val(),
                        childSnapshot.child('status').val()
                    ];
                    table.rows.add([dataset]).draw();
                });
            });


            //global variable

            var tableIndex = 0;

            var myName;
            var uid;
            console.log(myName);
            //check if user is login
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    // User is signed in, see docs for a list of available properties
                    // https://firebase.google.com/docs/reference/js/firebase.User
                    uid = user.uid;

                    var starCountRef = firebase.database().ref('Users/' + uid + '/name');
                    starCountRef.on('value', (snapshot) => {
                        const data = snapshot.val();
                        myName = data;
                        var name = $('#name').text(data);
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
                }
            });

            {{-- $('#apply-filter').on('click', function() {
                var search_name = document.getElementById('searchName').value;
                firebase.database().ref('Products/').orderByChild('product_name').startAt(search_name)
                    .endAt(search_name + "\uf8ff").on('value', function(snapshot) {
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
                                        .product_name +
                                        '</td>\
                                                                                                                                                                                                                                                                                        <td class="h6">' +
                                        index +
                                        '</td>\
                                                                                                                                                                                                                                                                                        <td class="h6">' +
                                        value
                                        .price +
                                        '</td>\
                                                                                                                                                                                                                                                                                        <td class="h6">' +
                                        value
                                        .quantity +
                                        '</td>\
                                                                                                                                                                                                                                                                                        <td class="h6">' +
                                        value
                                        .status +
                                        '</td>\
                                                                                                                                                                                                                                                                                        <td class="h6">\
                                                                                                                                                                                                                                                                                            <h4 class="m" style="cursor: pointer">\
                                                                                                                                                                                                                                                                                                <i class="fa-solid fa-cart-shopping" id="buyProduct" data-id="' +
                                        index +
                                        '"></i>\
                                                                                                                                                                                                                                                                                                </h4>\
                                                                                                                                                                                                                                                                                        </td>\
                                                                                                                                                                                                                                                                                        </tr>'
                                    );
                                }
                            }
                            tableIndex = index;
                        })

                        $('#ProductsData').html(TableData);

                    })
            }); --}}

            firebase.database().ref('Cart/').on('value', function(snapshot) {
                var productDATA = snapshot.val();

                var TableData = [];
                $.each(productDATA, function(index, value) {
                    //check if snapshot has data

                    if (value) {
                        TableData.push(
                            '<tr>\
                                                                                                            <td class="h6">' +
                            value
                            .item_list +
                            '</td>\
                                                                                                            <td class="h6">' +
                            value.item_code +
                            '</td>\
                                                                                                            <td class="h6">' +
                            value
                            .price +
                            '</td>\
                                                                                                            <td class="h6">' +
                            value
                            .total_items +
                            '</td>\
                                                                                                            <td class="h6">' +
                            value
                            .status +
                            '</td>\
                                                                                                            <td class="h6">\
                                                                                                            <h4 class="m" style="cursor: pointer">\
                                                                                                            <i class="fa-solid fa-trash" id="deleteCartItem" data-id="' +
                            index +
                            '"></i>\
                                                                                                            </h4>\
                                                                                                            </td>\
                                                                                                            </tr>'
                        );
                    }
                    tableIndex = index;
                })
                $('#cartData').html(TableData);
            })

            //delete cart item
            $('body').on('click', '#deleteCartItem', function() {
                buy_button.disabled = true;
                productID = $(this).attr('data-id');
                console.log(productID);
                firebase.database().ref('Cart/' + productID).remove();
                $('#productPrice').text(myPrice);
            });

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

            //get the total of items buy
            var totalItemSold = 0;
            var valueRef = firebase.database().ref('Cart/');
            valueRef.on('value', (snapshot) => {
                snapshot.forEach((childSnapshot) => {
                    var child = childSnapshot.val();
                    totalItemSold += child.price;
                })
                console.log(totalItemSold);
                $('#totalItemSold').text(totalItemSold);
            });

            var totalPurchase = 0;
            var myPrice;
            var buy_button = document.getElementById('buyBtn');
            const dbRef = firebase.database().ref('Cart/');
            dbRef.get().then((snapshot) => {
                if (snapshot.exists()) {
                    buy_button.disabled = false;
                } else {
                    buy_button.disabled = true;
                }
            }).catch((error) => {
                console.error(error);
            });

            //toast
            var toastLiveExample = document.getElementById('liveToast');
            //buy function
            $('#buyBtn').on('click', function(e) {
                buy_button.disabled = true;
                productID = $(this).attr('data-id');
                var valueRef = firebase.database().ref('Cart/');
                valueRef.on('value', (snapshot) => {
                    snapshot.forEach((childSnapshot) => {
                        var childData = childSnapshot.val();
                        totalPurchase += parseFloat(childData.price);
                        console.log(childData);
                        firebase.database().ref('ItemSell/' + childData.item_list +
                            current_time).set({
                            item_list: childData.item_list,
                            price: childData.price,
                            total_items: childData.total_items,
                            status: "Sold",
                            date_of_purchase: childData.date_of_purchase,
                            time_of_purchase: childData.time_of_purchase,
                            user_out: myName,
                            UID: uid,
                        });
                        valueRef.remove();
                        var toast = new bootstrap.Toast(toastLiveExample);
                        toast.show();
                        $('#totalItemSold').text("0");
                    })
                    console.log(totalPurchase);
                });
            });

            //close cart modal
            $('body').on('click', '#btnClose', function() {
                $('#addToCartModal').modal('hide');
            });

            var myTotalPrice = 0;
            var id;
            //cart function
            $("body").on('click', '#buyProduct', function(e) {
                $('#addToCartModal').modal('show');
                var file = $('#dataTable').dataTable().fnGetData($(this).closest(
                    'tr'));
                id = file[0];
                console.log(id);
                firebase.database().ref('Products/' + id).on('value', function(snapshot) {
                    var productDATA = snapshot.val();
                    var pricevalues;
                    var product_name = $('#product_name').text(productDATA.product_name);
                    var myprice = $('#productPrice').text(productDATA.price);
                    var status = $('#my_status').text(productDATA.status);
                    var my_quantity = document.getElementById('productQuantity');
                    my_quantity.addEventListener('input', () => {
                        //total price
                        var quantity = document.getElementById(
                            'productQuantity').value;
                        var quantity = document.getElementById(
                            'productQuantity').value;
                        pricevalues = parseFloat(myprice);
                        pricevalues = isNaN(pricevalues) ? productDATA.price :
                            pricevalues;
                        myTotalPrice = pricevalues * quantity;
                        var totalPrice = $('#total_price').text(myTotalPrice);
                    });

                    //total quantity
                    $('#buyProductButton').on('click', function(e) {
                        buy_button.disabled = false;
                        var quantity = document.getElementById('productQuantity').value;
                        var total = productDATA.quantity - quantity;
                        var totals = parseFloat(total);
                        if (quantity == "") {
                            alert("quantity required!");
                        } else {
                            if (productDATA.quantity >= quantity) {
                                //update data into firebase
                                firebase.database().ref('Cart/' + id).set({
                                    item_list: productDATA.product_name,
                                    item_code: productDATA.item_code,
                                    price: myTotalPrice,
                                    total_items: quantity,
                                    status: productDATA.status,
                                    date_of_purchase: current_date,
                                    time_of_purchase: current_time,
                                });
                                firebase.database().ref('Products/' + id).update({
                                    product_name: productDATA.product_name,
                                    item_code: productDATA.item_code,
                                    price: productDATA.price,
                                    quantity: totals,
                                    status: productDATA.status,
                                    date: current_date,
                                    time: current_time,
                                });
                                $('#addToCartModal').modal('hide');
                            } else {
                                alert("invalid");
                                return false
                            }
                        }

                    });

                    if (productDATA.quantity == 0) {
                        var updateProductsData = {
                            product_name: productDATA.product_name,
                            price: productDATA.price,
                            quantity: productDATA.quantity,
                            status: "Not-Available",
                            date_of_update: current_date,
                            time_of_update: current_time,
                        };
                        var UpdatingProductData = {};
                        UpdatingProductData['/Products/' + id] =
                            updateProductsData;
                        //insert data into FIREBASE

                        firebase.database().ref().update(UpdatingProductData);
                        $('#buy_card').css("display", "none");
                    }
                });
            });

            //edit function


            //delete function



            //session message


            //clear inpupt

            function btnLogoutShow() {
                $('#logout_btn').css("display", "block");
                $('#login_btn').css("display", "none");
                $('#signup_btn').css("display", "none");
                $('#myEmail').css("display", "block");
            }

            function btnLoginShow() {
                $('#logout_btn').css("display", "none");
                $('#login_btn').css("display", "block");
                $('#signup_btn').css("display", "block");
                $('#myEmail').css("display", "none");
            }

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
