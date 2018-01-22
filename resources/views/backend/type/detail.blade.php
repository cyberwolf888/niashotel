@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Detail Tipe Kamar</div>
            </div>

            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <ul class="collection">
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Nama</span><br>
                                    <b>{{ $model->name }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Fasilitas</span><br>
                                    <b>{{ $model->fasilitas }}</b>
                                </li>
                                <li class="collection-item">
                                    <span class="grey-text text-lighten-1">Status</span><br>
                                    <b>{{ $model->status == 1 ? 'Active':'Deactive' }}</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($model->foto as $image)
                <div class="col s12 m6 l3">
                    <div class="card white">
                        <div class="card-content center">
                            <img style="width: 100%;" src="{{ url('assets/img/foto/'.$model->id.'/'.$image->foto) }}" alt="{{ $image->keterangan }}"><br>
                            {{ $image->keterangan }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush