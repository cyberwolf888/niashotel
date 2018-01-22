@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Detail Kamar</div>
            </div>

            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <ul class="collection">
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Type</span><br>
                                    <b>{{ $model->type->name }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">No Kamar</span><br>
                                    <b>{{ $model->no_kamar }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Harga</span><br>
                                    <b>Rp {{ number_format($model->harga,0,',','.') }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Harga Extra Bed</span><br>
                                    <b>Rp {{ number_format($model->extra_bed,0,',','.') }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">status</span><br>
                                    <b>{{ $model->status == 1 ? 'Available' : 'Unavailable' }}</b>
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