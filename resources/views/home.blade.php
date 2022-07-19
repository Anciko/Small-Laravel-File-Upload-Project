<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel File Upload</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="">
    <div class="container my-5">
        <div class="col-md-6 mx-auto">
            <h3 class="text-center text-primary mb-4">Laravel File Upload</h3>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $error }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('file-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="images[]" id="upload" multiple>
                    <button class="btn btn-primary input-group-text" for="upload">Upload</button>
                </div>
            </form>
        </div>

        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-md-4">
                    <div class="card m-3 shadow-sm p-2">
                        <div class="card-header p-0">
                            <img class="img-fluid" src="{{ $gallery->image_link }}" alt="">
                        </div>
                        <div class="card-footer px-1 bg-light">
                            <a href="{{ $gallery->image_link }}" class="btn btn-info btn-sm" target="_blank">View</a>
                            <a href="{{ route('file-download', $gallery->id) }}"
                                class="btn btn-success btn-sm">Download</a>
                            <a href="{{ route('file-destroy', $gallery->id) }}"
                                class="btn btn-danger btn-sm float-end">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>
