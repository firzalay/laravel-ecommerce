<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: white;
            color: black;
        }

        .font_size {
            text-align: center;
            font-size: 35px;
            padding-bottom: 10px;
        }

        .img_size {
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <h2 class="font_size">All Products</h2>

                <table class="center">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount_price }}</td>
                            <td>

                                <img class="img_size" src="{{ asset('storage/product/' . $product->image) }}"
                                    alt="">
                            </td>
                            <td><a class="btn btn-danger"
                                    onclick="return confirm('are you sure want to delete this product?')"
                                    href="{{ url("/delete_product/{$product->id}") }}">Delete</a></td>
                            <td><a class="btn btn-success" href="{{ url("/update_product/{$product->id}") }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
