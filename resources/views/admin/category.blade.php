<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <style type="">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color:black
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 1px solid white;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="category" placeholder="Write category name">

                        <input type="submit" class="btn btn-primary" class="submit" value="Add Category">
                    </form>
                </div>

                <table class="center">
                    
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>

                    @foreach ($datas as $data)
                        
                    <tr>
                        <td>{{ $data->category_name }}</td>
                        <td><a class="btn btn-danger">Delete</a></td>
                    </tr>

                    @endforeach

                </table>
            </div>
        </div>
        <!-- partial -->
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
