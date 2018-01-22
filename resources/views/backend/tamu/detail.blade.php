@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Detail Tamu</div>
            </div>

            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <ul class="collection">
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Nama</span><br>
                                    <b>{{ $model->nama }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Alamat</span><br>
                                    <b>{{ $model->alamat }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No. HP</span><br>
                                    <b>{{ $model->hp }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Email</span><br>
                                    <b>{{ $model->email }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No. Identitas</span><br>
                                    <b>{{ $model->no_identitas }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Jenis Kelamin</span><br>
                                    <b>{{ $model->status == 1 ? 'Laki-laki' : 'Perempuan' }}</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush