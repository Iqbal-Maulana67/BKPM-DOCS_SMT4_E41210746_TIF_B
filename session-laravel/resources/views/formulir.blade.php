<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center"> Form Validation dengan Laravel </h1>
                <form action="{{ route('form-proses') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama" class="control-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                        @if ($errors->has('nama'))
                            <span class="text-danger small">
                                <p> {{ $errors->first('nama') }}</p>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="control-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="Alamat" value="{{ old('alamat') }}">
                        @if ($errors->has('alamat'))
                            <span class="text-danger small">
                                <p> {{ $errors->first('alamat') }}</p>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Enter</button>
                </form>
            </div>
        </div>

    </div>
    
</body>
</html>