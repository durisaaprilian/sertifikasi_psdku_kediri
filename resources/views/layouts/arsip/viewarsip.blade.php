@extends('layouts.master') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <p>
                Nomor : {{ $data->no_surat }}<br> Kategori : {{ $data->kategori }}<br> Judul : {{ $data->judul }}<br> Waktu Unggah : {{ $data->created_at }}
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p style="text-align:center; vertical-align:middle"><iframe src="/dokument/{{ $data->dokumen }}"></iframe></p>
        </div>
    </div><br>
    <a href="/arsip" class="btn btn-success">Kembali</a>
</div>
@endsection