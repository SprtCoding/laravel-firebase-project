@include('products.delete')
@include('products.addProductModal')
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
            <main class="mx-auto">
                <div class="row">
                    <div class="col col-md-9">
                        <h1 class="mt-2 font-weight-bold">Inventory List</h1>
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
                    <div class="col col-md-2">
                        <label for="search-product-name">Product Name</label>
                        <div class="input-group rounded mb-2">
                            <input id="searchName" type="search" class="form-control rounded" placeholder="Search"
                                aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <label for="search-item-no">Item Code.</label>
                        <div class="input-group rounded mb-2">
                            <input id="itemCode" type="search" class="form-control rounded" placeholder="Search"
                                aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col col-md-10">
                                <h3 class="mt-2 font-weight-bold mt-4">In Stock</h3>
                            </div>
                            <div class="col">
                                <a id="openAddProductModal" href="#" class="btn btn-success mt-4"
                                    style="background-color: #35C496"><i class="fa-solid fa-plus"></i> Add Items</a>
                            </div>
                        </div>
                        <div class="card mt-4 p-4 my-card">
                            <table class="table my-table">
                                <thead class="table-head">
                                    <tr>
                                        <th class="col col-md-4" scope="col">
                                            <h5>Product Name</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Item Code</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Price (per box)</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Quantity</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Status</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Actions</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="ProductsData" class="table-body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="mt-2 font-weight-bold mt-4">Out of Stock</h3>
                        <div class="card mt-4 p-4 my-card">
                            <table class="table my-table">
                                <thead class="table-head">
                                    <tr>
                                        <th class="col col-md-4" scope="col">
                                            <h5>Product Name</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Item Code</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Price (per box)</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Quantity</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Status</h5>
                                        </th>
                                        <th class="col" scope="col">
                                            <h5>Actions</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="ProductsDataNotAvailable" class="table-body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="fa-solid fa-circle-info"></i>
                            &nbsp;&nbsp;
                            <strong class="me-auto">Deleted</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Deleted Successfully!
                        </div>
                    </div>
                </div>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToastAdd" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="fa-solid fa-circle-info"></i>
                            &nbsp;&nbsp;
                            <strong class="me-auto">Create Product</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Product Created Successfully!
                        </div>
                    </div>
                </div>
                <div class="loader-wrapper">
                    <span class="loader"><span class="loader-inner"></span></span>
                </div>
            </main>
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
                }
            });

            //search code of item
            var search_item_code = document.getElementById('itemCode');
            search_item_code.addEventListener('input', () => {
                var search_item_code = document.getElementById('itemCode').value;
                firebase.database().ref('Products/').orderByChild('item_code').startAt(search_item_code)
                    .endAt(search_item_code + "\uf8ff").on('value', function(snapshot) {
                        var productDATA = snapshot.val();

                        var TableData = [];
                        $.each(productDATA, function(index, value) {
                            //check if snapshot has data

                            if (value) {
                                if (value) {
                                    TableData.push(
                                        '<tr>\
                                         <td class="h6">' +
                                        value
                                        .product_name +
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
                                        .quantity +
                                        '</td>\
                                         <td class="h6">' +
                                        value
                                        .status +
                                        '</td>\
                                         <td class="h6">\
                                         <i class="fa-solid fa-pen-to-square" id="editProduct" data-id="' +
                                        index +
                                        '"></i>&nbsp;&nbsp;&nbsp;\
                                         <i class="fa-solid fa-trash" id="openDeleteProductModal" data-id="' +
                                        index +
                                        '" data-name="' + value.product_name +
                                        '"></i>\
                                         </td>\
                                         </tr>'
                                    );
                                }
                            }
                            tableIndex = index;
                        })
                        $('#ProductsData').html(TableData);
                    })
            });

            //search name of item
            var search_name = document.getElementById('searchName');
            search_name.addEventListener('input', () => {
                var search_name = document.getElementById('searchName').value;
                firebase.database().ref('Products/').orderByChild('product_name').startAt(search_name)
                    .endAt(search_name + "\uf8ff").on('value', function(snapshot) {
                        var productDATA = snapshot.val();
                        var TableData = [];
                        $.each(productDATA, function(index, value) {
                            //check if snapshot has data

                            if (value) {
                                if (value) {
                                    TableData.push(
                                        '<tr>\
                                                                                                                    <td class="h6">' +
                                        value.product_name +
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
                                        .quantity +
                                        '</td>\
                                                                                                                    <td class="h6">' +
                                        value
                                        .status +
                                        '</td>\
                                                                                                                    <td class="h6">\
                                                                                                                    <i class="fa-solid fa-pen-to-square" id="editProduct" data-id="' +
                                        index +
                                        '"></i>&nbsp;&nbsp;&nbsp;\
                                                                                                                    <i class="fa-solid fa-trash" id="openDeleteProductModal" data-id="' +
                                        index +
                                        '" data-name="' + value.product_name +
                                        '"></i>\
                                                                                                                    </td>\
                                                                                                                    </tr>'
                                    );
                                }
                            }
                            tableIndex = index;
                        })
                        $('#ProductsData').html(TableData);
                    })

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

            console.log(current_date);

            //toast
            var toastLiveExampleAdd = document.getElementById('liveToastAdd');

            //create function
            $("#createProductButton").on('click', function() {
                var productRowData = $('#createProductForm').serializeArray();
                var product_name = document.getElementById('product_name').value;
                var item_code = document.getElementById('item_code').value;
                var price = document.getElementById('productPrice').value;
                var quantity = document.getElementById('productQuantity').value;
                var status = document.getElementById('my_status').value;

                //create product id
                var ProductId = tableIndex + 1

                //validation
                if (product_name == '') {
                    alert("Product Name is required!");
                    $('#productName').focus();
                    return false
                } else if (price == '') {
                    alert("Price is required!");
                    $('#productPrice').focus();
                    return false
                } else if (quantity == '') {
                    alert("Quantity is required!");
                    $('#productQuantity').focus();
                    return false
                } else if (status == '') {
                    alert("Status is required!");
                    $('#my_status').focus();
                    return false
                }

                //insert data into FIREBASE

                firebase.database().ref('Products/' + ProductId).set({
                    product_name: product_name,
                    item_code: item_code,
                    price: price,
                    quantity: quantity,
                    status: status,
                    date: current_date,
                    time: current_time,
                });

                tableIndex = ProductId;
                var toast = new bootstrap.Toast(toastLiveExampleAdd);
                toast.show();
                MsgSession("Product Created Successfully");

                cancelUpdate();

                console.log(productRowData)

                return false
            })

            //fetch product data not-available

            firebase.database().ref('NotAvailableProducts/').on('value', function(snapshot) {
                var productDATA = snapshot.val();

                var TableData = [];
                $.each(productDATA, function(index, value) {
                    //check if snapshot has data

                    if (value) {
                        if (value.status == "Not-Available") {
                            TableData.push(
                                '<tr>\
                                <td class="h6">' +
                                value
                                .product_name +
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
                                .quantity +
                                '</td>\
                                <td class="h6">' +
                                value
                                .status +
                                '</td>\
                                <td class="h6">\
                                <i class="fa-solid fa-pen-to-square" id="editProduct" data-id="' +
                                index + '"data-status="' + value.status +
                                '"></i>&nbsp;&nbsp;&nbsp;\
                                <i class="fa-solid fa-trash" id="openDeleteProductModal" data-id="' +
                                index +
                                '" data-name="' + value.product_name + '"data-status="' + value
                                .status +
                                '"></i>\
                                </td>\
                                </tr>'
                            );
                        }

                        if (value.status == "Available") {
                            firebase.database().ref('Products/' + index).update({
                                item_number: index,
                                product_name: value.product_name,
                                price: value.price,
                                quantity: value.quantity,
                                status: value.status,
                                date_of_update: current_date,
                                time_of_update: current_time,
                            });
                            firebase.database().ref('NotAvailableProducts/' + index).remove();
                        }

                    }

                    tableIndex = index;
                })
                $('#ProductsDataNotAvailable').html(TableData);
            })

            //fetch product data available

            firebase.database().ref('Products/').on('value', function(snapshot) {
                var productDATA = snapshot.val();

                var TableData = [];
                $.each(productDATA, function(index, value) {
                    //check if snapshot has data

                    if (value) {
                        if (value.status == "Available") {
                            TableData.push(
                                '<tr class="mytable">\
                                <td class="h6">' +
                                value
                                .product_name +
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
                                .quantity +
                                '</td>\
                                <td class="h6">' +
                                value
                                .status +
                                '</td>\
                                <td class="h6">\
                                <i class="fa-solid fa-pen-to-square" id="editProduct" data-id="' +
                                index + '"data-status="' + value.status +
                                '"></i>&nbsp;&nbsp;&nbsp;\
                                <i class="fa-solid fa-trash" id="openDeleteProductModal" data-id="' +
                                index +
                                '" data-name="' + value.product_name + '"data-status="' + value
                                .status +
                                '"></i>\
                                </td>\
                                </tr>'
                            );
                        }

                        if (value.status == "Not-Available") {
                            firebase.database().ref('NotAvailableProducts/' + index).set({
                                item_number: index,
                                product_name: value.product_name,
                                item_code: value.item_code,
                                price: value.price,
                                quantity: value.quantity,
                                status: value.status,
                                date_of_out_of_stock: current_date,
                                time_of_out_of_stock: current_time,
                            });
                            firebase.database().ref('Products/' + index).remove();
                        }


                        if (value.quantity <= 5) {
                            alert(value.product_name + " need to add more items. Thank you!");
                            return false
                        }

                    }

                    tableIndex = index;
                })
                $('#ProductsData').html(TableData);
            })

            //update function
            $("#updateProductButton").on('click', function(e) {
                var productRowData = $('#createProductForm').serializeArray();
                var product_name = $('#productName').val(productRowData.product_name);
                var item_code = $('#item_code').val(productRowData.item_code);
                var price = $('#productPrice').val(productRowData.price);
                var quantity = $('#productQuantity').val(productRowData.quantity);
                var status = $('#my_status').val(productRowData.status);


                if (product_name == '') {
                    alert("Product Name is required!");
                    $('#productName').focus();
                    return false
                } else if (item_code == '') {
                    alert("item code is required!");
                    $('#productPrice').focus();
                    return false
                } else if (price == '') {
                    alert("Price is required!");
                    $('#productPrice').focus();
                    return false
                } else if (quantity == '') {
                    alert("Quantity is required!");
                    $('#productQuantity').focus();
                    return false
                } else if (status == '') {
                    alert("Status is required!");
                    $('#my_status').focus();
                    return false
                }
                //update data into firebase
                var updateProductsData = {
                    product_name: productRowData[0].value,
                    item_code: productRowData[1].value,
                    price: productRowData[2].value,
                    quantity: productRowData[3].value,
                    status: productRowData[4].value,
                    date_of_update: current_date,
                    time_of_update: current_time,
                };

                var UpdatingProductData = {};
                UpdatingProductData['/Products/' + productID] = updateProductsData;
                var UpdatingProductDataNotAvailable = {};
                UpdatingProductData['/NotAvailableProducts/' + productID] = updateProductsData;

                //insert data into FIREBASE

                firebase.database().ref().update(UpdatingProductData);
                firebase.database().ref().update(UpdatingProductDataNotAvailable);

                cancelUpdate();
                MsgSession("Product Updated Successfully");
            })

            //edit function
            var productID = 0;
            var productStatus;
            $("body").on('click', '#editProduct', function(e) {

                $('#addProductModal').modal('show');
                productID = $(this).attr('data-id');
                productStatus = $(this).attr('data-status');
                console.log(productID);
                $('#productPricePoint').css('display', 'none');
                if (productStatus == "Available") {
                    firebase.database().ref('Products/' + productID).on('value', function(snapshot) {
                        var productDATA = snapshot.val();
                        var product_name = $('#product_name').val(productDATA.product_name);
                        var item_code = $('#item_code').val(productDATA.item_code);
                        var price = $('#productPrice').val(productDATA.price);
                        var quantity = $('#productQuantity').val(productDATA.quantity);
                        var status = $('#my_status').val(productDATA.status);

                        $('#createProductButton').css("display", "none");
                        $('#updateProductButton').css("display", "block");
                        $('#cancelProductButton').css("display", "block");
                    });
                }
                if (productStatus == "Not-Available") {
                    firebase.database().ref('NotAvailableProducts/' + productID).on('value', function(
                        snapshot) {
                        var productDATA = snapshot.val();
                        var product_name = $('#product_name').val(productDATA.product_name);
                        var item_code = $('#item_code').val(productDATA.item_code);
                        var price = $('#productPrice').val(productDATA.price);
                        var quantity = $('#productQuantity').val(productDATA.quantity);
                        var status = $('#my_status').val(productDATA.status);

                        $('#createProductButton').css("display", "none");
                        $('#updateProductButton').css("display", "block");
                        $('#cancelProductButton').css("display", "block");
                    });
                }
            })

            //add function
            $("body").on('click', '#openAddProductModal', function() {
                $('#addProductModal').modal('show');
            });

            //btn add close
            $("#btnAdd").on('click', function() {
                cancelUpdate();
            });

            //btn delete close
            $("#btn-close-delete").on('click', function() {
                $('#deleteProductModal').modal('hide');
            });

            //btn delete close
            $("#btn-success").on('click', function() {
                $('#deleteProductModal').modal('hide');
            });

            var productStatus;
            //delete function
            $("body").on('click', '#openDeleteProductModal', function() {
                $('#deleteProductModal').modal('show');
                var productId = $(this).attr('data-id');
                productStatus = $(this).attr('data-status');
                console.log(productStatus);
                $('#productName').text($(this).attr('data-name'));
                //append data inside the modal
                $('body').find('#product_id').val(productId)
            });

            //toast
            var toastLiveExample = document.getElementById('liveToast');

            $('#deleteProductData').on('click', function() {
                var productId = $('#product_id').val()
                console.log(productId);
                if (productStatus == "Available") {
                    firebase.database().ref('Products/' + productId).remove();
                }
                if (productStatus == "Not-Available") {
                    firebase.database().ref('NotAvailableProducts/' + productId).remove();
                }
                $('#deleteProductModal').modal('hide');
                var toast = new bootstrap.Toast(toastLiveExample);
                toast.show();
                MsgSession("Product Delated Successfully");
            })

            //session message
            function MsgSession(msg) {
                $('#msgID').css('display', 'block');
                $('#msgBody').text(msg);
                setTimeout(() => {
                    $('#msgID').css('display', 'none');
                    $('#msgBody').text('');
                }, 3000)
            }

            //clear inpupt
            $("#cancelProductButton").on('click', function() {
                cancelUpdate();
            })

            function cancelUpdate() {
                $("#createProductForm, input, select").val("");
                $('#addProductModal').modal('hide');
                $('#productPricePoint').css('display', 'block');
                $('#createProductButton').css("display", "block");
                $('#updateProductButton').css("display", "none");
                $('#cancelProductButton').css("display", "none");
            }

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
            }
        })
    </script>
@endpush
