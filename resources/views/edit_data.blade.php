<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>


    <div class="container">
        <a href="{{url('/')}}" class="btn btn-primary">Show Data</a>
        <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->

        @if(Session::has('msg'))
        <p class="alert alert-success">{{Session::get('msg') }}</p>
        @endif
        <form action="{{url('/update-data/'.$editData->id )}}" method="post">
            @csrf
            <div class=" mb-3">
                <label for="exampleInputname" class="form-label"> Name</label>
                <input type="text" class="form-control" name="name" value="{{$editData->name}}" id="exampleInputname" aria-describedby="nameHelp"
                    placeholder="Enter the Name">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputemail" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{$editData->email}}" id="exampleInputemail"
                    placeholder="Enter the Email">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary my-3" value="update">
        </form>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>