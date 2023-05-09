<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center"> Upload File dengan Laravel </h1>
                <form action="{{ route('upload.resize') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
                            {{  session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">&times;</a>
                            {{  session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="gambar" class="control-label">File Gambar</label>
                        <input type="file" name="file">
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="control-label">keterangan</label>
                        <textarea class="form-control" name="keterangan">

                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>

    </div>
    
</body>
</html>