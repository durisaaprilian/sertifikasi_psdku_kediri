@extends('layouts.master') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{url ('arsip')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="no_surat">No Surat</label>
                    <input type="text" class="form-control" name="no_surat" id="no_surat" value="{{ old('no_surat') }}" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}">
                        <option value="">Pilih...</option>
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Nota Dinas">Nota Dinas</option>
                        <option value="Pemberitahuan">Pemberitahuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul') }}" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="dokumen">Dokumen</label>
                    <input type="file" class="form-control" value="{{ old('dokumen') }}" name="dokumen">
                </div>
                <div class="mb-3">
                        <button class="btn btn btn-primary">Simpan</button>
                    </div>
                <div class="mb-3">
                    <a href="/arsip" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection