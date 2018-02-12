@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Detail Check-in</div>
            </div>

            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <ul class="collection">
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Tgl Check-in</span><br>
                                    <b>{{ date('d/m/Y',strtotime($model->tgl)) }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No. Kamar</span><br>
                                    <b>{{ $model->detail->kamar->no_kamar }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Jumlah Tamu</span><br>
                                    <b>{{ $model->detail->jumlah_tamu }} orang</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Extra Bed</span><br>
                                    <b>{{ $model->detail->extra_bed == 1 ? number_format($model->detail->kamar->extra_bed,0,',','.') : '0' }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Harga per hari</span><br>
                                    <b>{{ number_format($model->detail->total,0,',','.') }}</b>
                                </li>
                            </ul>
                            <a class="waves-effect waves-light btn red" href="{{ route('backend.checkin.manage') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <ul class="collection">
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Nama</span><br>
                                    <b>{{ $model->tamu->nama }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Alamat</span><br>
                                    <b>{{ $model->tamu->alamat }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No. HP</span><br>
                                    <b>{{ $model->tamu->hp }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Email</span><br>
                                    <b>{{ $model->tamu->email }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No. Identitas</span><br>
                                    <b>{{ $model->tamu->no_identitas }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Jenis Kelamin</span><br>
                                    <b>{{ $model->tamu->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</b>
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