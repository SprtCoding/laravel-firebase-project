@include('products.delete')
@extends('layouts.app')
@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="https://mdbgo.com/">
                <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="16" alt="MDB Logo"
                    loading="lazy" style="margin-top: -1px;" />
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample"
                aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Dashboard</a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <button id="login_btn" type="button" class="btn btn-link text-decoration-none">
                        <a class="nav-link" href="/login">Login</a>
                    </button>
                    <button id="signup_btn" type="button" class="btn btn-link text-decoration-none">
                        <a class="nav-link" href="/registration">Sign up for free</a>
                    </button>
                    <p id="myEmail" class="mt-3"></p>
                    <button id="logout_btn" type="button" class="btn btn-link text-decoration-none">
                        Logout
                    </button>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <div class="container">
        <main class="mx-auto m-4">
            <div class="">
                <h4 class="text-uppercase mb-4 mt-5">laravel Crud with realtime database</h4>
            </div>
            <div class="row">
                <div class="col col-md-8">
                    <div class="alert alert-success" id="msgID" style="display: none">
                        <h4 id="msgBody" class="text-white"></h4>
                    </div>
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4>Product List</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover border-dark">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ProductsData">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Products Add form --}}

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h4>Add Products</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" id="createProductForm" autocapitalize="off">
                                <div class="mb-3">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name">
                                </div>
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Price</label>
                                    <input type="text" class="form-control" name="productPrice" id="productPrice">
                                </div>
                                <div class="mb-3">
                                    <label for="productQuantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="productQuantity" id="productQuantity">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="my_status" id="my_status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Available">Available</option>
                                        <option value="Not-Available">Not-Available</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button id="createProductButton" type="submit" class="btn btn-success btn-block">Add</button>
                            <button id="updateProductButton" type="submit" class="btn btn-primary btn-block"
                                style="display: none">Update</button>
                            <button id="cancelProductButton" type="submit" class="btn btn-default btn-block"
                                style="display: none">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@push('script')
    <script>
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
                    var uid = user.uid;
                    btnLogoutShow();
                    var email = $('#myEmail').text(user.email);
                    $('#logout_btn').on('click', function() {
                        firebase.auth().signOut().then(() => {
                            // Sign-out successful.
                            MsgSession("Logout successfully");
                            var email = $('#myEmail').text("");
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

            //create function
            $("#createProductButton").on('click', function() {
                var productRowData = $('#createProductForm').serializeArray();
                var product_name = document.getElementById('product_name').value;
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
                    price: price,
                    quantity: quantity,
                    status: status,
                });

                tableIndex = ProductId;
                MsgSession("Product Created Successfully");

                cancelUpdate();

                console.log(productRowData)

                return false
            })

            //fetch product data

            firebase.database().ref('Products/').on('value', function(snapshot) {
                var productDATA = snapshot.val();

                var TableData = [];
                $.each(productDATA, function(index, value) {
                    //check if snapshot has data

                    if (value) {
                        TableData.push(
                            '<tr>\
                                                                                                                                                                                    <td>' +
                            index +
                            '</td>\
                                                                                                                                                                                    <td>' +
                            value
                            .product_name +
                            '</td>\
                                                                                                                                                                                    <td>' +
                            value
                            .price +
                            '</td>\
                                                                                                                                                                                    <td>' +
                            value
                            .quantity +
                            '</td>\
                                                                                                                                                                                    <td>' +
                            value
                            .status +
                            '</td>\
                                                                                                                                                                                    <td>\
                                                                                                                                                                                        <button id="editProduct" class="btn btn-success btn-sm" data-id="' +
                            index +
                            '">Edit</button>&nbsp;&nbsp;\
                                                                                                                                                                                        <button id="openDeleteProductModal" class="btn btn-danger btn-sm" data-id="' +
                            index +
                            '" data-name="' + value.product_name +
                            '">Delete</button>\
                                                                                                                                                                                    </td>\
                                                                                                                                                                                </tr>'
                        );
                    }
                    tableIndex = index;
                })
                $('#ProductsData').html(TableData);
            })

            //update function
            $("#updateProductButton").on('click', function(e) {
                var productRowData = $('#createProductForm').serializeArray();
                var product_name = $('#productName').val(productRowData.product_name);
                var price = $('#productPrice').val(productRowData.price);
                var quantity = $('#productQuantity').val(productRowData.quantity);
                var status = $('#my_status').val(productRowData.status);


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

                //update data into firebase
                var updateProductsData = {
                    product_name: productRowData[0].value,
                    price: productRowData[1].value,
                    quantity: productRowData[2].value,
                    status: productRowData[3].value,
                };

                var UpdatingProductData = {};
                UpdatingProductData['/Products/' + productID] = updateProductsData;

                //insert data into FIREBASE

                firebase.database().ref().update(UpdatingProductData);

                cancelUpdate();
                MsgSession("Product Updated Successfully");
            })

            //edit function
            var productID = 0;
            $("body").on('click', '#editProduct', function(e) {

                productID = $(this).attr('data-id');
                firebase.database().ref('Products/' + productID).on('value', function(snapshot) {
                    var productDATA = snapshot.val();
                    var product_name = $('#product_name').val(productDATA.product_name);
                    var price = $('#productPrice').val(productDATA.price);
                    var quantity = $('#productQuantity').val(productDATA.quantity);
                    var status = $('#my_status').val(productDATA.status);


                    $('#createProductButton').css("display", "none");
                    $('#updateProductButton').css("display", "block");
                    $('#cancelProductButton').css("display", "block");
                });


            })

            //delete function
            $("body").on('click', '#openDeleteProductModal', function() {
                $('#deleteProductModal').modal('show');
                var productId = $(this).attr('data-id');
                $('#productName').text($(this).attr('data-name'));
                //append data inside the modal
                $('body').find('#product_id').val(productId)
            });

            $('#deleteProductData').on('click', function() {
                var productId = $('#product_id').val()
                console.log(productId);
                firebase.database().ref('Products/' + productId).remove();
                $('#deleteProductModal').modal('hide');

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
