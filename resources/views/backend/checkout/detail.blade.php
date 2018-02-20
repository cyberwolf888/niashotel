@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Detail Check-out</div>
            </div>

            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <ul class="collection">
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Tgl Check-in</span><br>
                                    <b>{{ date('d/m/Y',strtotime($model->checkin->tgl)) }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Tgl Check-out</span><br>
                                    <b>{{ date('d/m/Y',strtotime($model->tgl)) }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No. Kamar</span><br>
                                    <b>{{ $model->checkin->detail->kamar->no_kamar }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Sub Total</span><br>
                                    <b>{{ number_format($model->subtotal,0,',','.') }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Pajak (15%)</span><br>
                                    <b>{{ number_format($model->tax,0,',','.') }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Service (7%)</span><br>
                                    <b>{{ number_format($model->service,0,',','.') }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Diskon</span><br>
                                    <b>{{ $model->diskon }} %</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Total</span><br>
                                    <b>{{ number_format($model->total,0,',','.') }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Keterangan</span><br>
                                    <b>{{ $model->keterangan }}</b>
                                </li>
                            </ul>
                            <a class="waves-effect waves-light btn red" href="{{ route('backend.checkout.manage') }}">Back</a>
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
                                    <b>{{ $model->checkin->tamu->nama }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Alamat</span><br>
                                    <b>{{ $model->checkin->tamu->alamat }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No. HP</span><br>
                                    <b>{{ $model->checkin->tamu->hp }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Email</span><br>
                                    <b>{{ $model->checkin->tamu->email }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No. Identitas</span><br>
                                    <b>{{ $model->checkin->tamu->no_identitas }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Jenis Kelamin</span><br>
                                    <b>{{ $model->checkin->tamu->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</b>
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