<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">

    @include('admin.head')

    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
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

                <div class="div_center">

                    <h1 class="font_size">Edit Product</h1>

                    <form action="{{ url("/update_product_confirm/{$product->id}") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="div_design">
                            <label for="">Product Title : </label>
                            <input type="text" class="text_color" name="title" placeholder="Write a title" value="{{ $product->title }}"
                                required>
                        </div>

                        <div class="div_design">
                            <label for="">Product Description : </label>
                            <input type="text" class="text_color" name="description"
                                placeholder="Write a description" value="{{ $product->description }}" required>
                        </div>

                        <div class="div_design">
                            <label for="">Product Price : </label>
                            <input type="number" class="text_color" name="price" placeholder="Write a product price" value="{{ $product->price }}"
                                required>
                        </div>

                        <div class="div_design">
                            <label for="">Discount Price : </label>
                            <input type="text" class="text_color" name="dis_price" value="{{ $product->discount_price }}"
                                placeholder="Write a discount price">
                        </div>

                        <div class="div_design">
                            <label for="">Product Quantity : </label>
                            <input type="number" class="text_color" name="quantity" min="0" value="{{ $product->quantity }}"
                                placeholder="Write a discount is apply" required>
                        </div>

                        <div class="div_design">
                            <label for="">Product Category : </label>
                            <select name="category" id="" class="text_color" required>
                                <option value="{{ $product->category }}">{{ $product->category }}</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="div_design">
                            <label for="">Current Product Image Here : </label>
                            <img style="margin:auto;" class="img_size" src="{{ asset('storage/product/' . $product->image) }}" height="100" width="100"
                            alt="">
                        </div>

                        <div class="div_design">
                            <label for="">Change Product Image Here : </label>
                            <input type="file" name="image" placeholder="Write a title">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
