@extends('backend/layouts.template');

@section('content')
<main id="main" class="main">
    <section id="main-content">
        <div class="wrapper">
            <div class="row">
                <h3 class="page-header"><i class="icon_document_alt"></i>Riwayat Hidup</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><i class="icon_document_alt"></i><a href="">Riwayat Hidup</a></li>
                    <li class="breadcrumb-item"><i class="fa fa-files-o"></i><a href="">Pengalaman Kerja</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Pengalaman Kerja
                    </header>
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <a href="{{ route('pengalaman_kerja.create')}}">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-plus"> Tambah </i> 
                            </button>
                            <br><br>
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Tahun Masuk</th>
                                        <th>Tahun Selesai</th>
                                        <th> Action </th>
                                    </tr>
                                    @foreach ($pengalaman_kerja as $item)
                                        <tr>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->jabatan}}</td>
                                            <td>{{$item->tahun_masuk}}</td>
                                            <td>{{$item->tahun_keluar}}</td>
                                            <td>
                                                <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}" method="POST">
                                                    <div class="btn-group">
                                                    <a class="btn btn-warning" href="{{ route('pengalaman_kerja.edit', $item->id) }}"><i class="bi bi-pencil-square"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
@endsection