@extends('backend/layouts.template')

@section('content')
<main id="main" class="main">
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="{{ url('dashboard') }}"></a></li>
                        <li class="breadcrumb-item"><i class="icon_document_alt"></i>Riwayat Hidup</li>
                        <li class="breadcrumb-item"><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Pengalaman Kerja
                        </header>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There we some problems with your input. <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="pengalaman_kerjan_form" method="POST" action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store')}}">
                                @csrf
                                {!! isset($pengalaman_kerja) ? method_field('PUT') : '' !!}0
                                <input type="hidden" name="id" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->id : '' }}">

                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2"> Nama Perusahaan <span>*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="nama" name="nama" minlength="5" type="text" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->nama : '' }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2"> Jabatan <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="jabatan" name="jabatan" minlength="2" type="text" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->jabatan : '' }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2"> Tahun masuk <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="tahun_masuk" name="tahun_masuk" type="text" maxlength="4" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_masuk : '' }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2"> Tahun Selesai <span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="tahun_keluar" name="tahun_keluar" minlength="2" type="text" maxlength="4" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_keluar : '' }}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{ route('pengalaman_kerja.index') }}"><button class="btn btn-default" type="button">Cancel</button></a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
</main>
@endsection

@push('content-css')
<link rel="stylesheet" href="{{ asset('backend/asset/css/bootstrap-datepicker.css')}}">
@endpush

@push('content-js')
<script src="{{ asset('backend/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
    $('#tahun_masuk').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
    $('#tahun_keluar').datepicker({
        format: "yyyy"
        viewMode: "years",
        minViewMode: "years"
    })
</script>
    
@endpush