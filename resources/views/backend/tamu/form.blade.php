@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    {!! Form::open(['route' => isset($update) ? ['backend.tamu.update', $model->id] :'backend.tamu.store', 'method' => 'post']) !!}
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Tamu</div>
            </div>
            @if (count($errors) > 0)
                <div class="col m12">
                    <div class="card-panel red lighten-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('nama', $model->nama,['class'=>'validate','required'=>'','aria-required'=>'true','min'=>'0']) !!}
                                    {!! Form::label('nama', 'Nama Lengkap', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('alamat', $model->alamat,['class'=>'validate','required'=>'','aria-required'=>'true','min'=>'0']) !!}
                                    {!! Form::label('alamat', 'Alamat', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('hp', $model->hp,['class'=>'validate','required'=>'','aria-required'=>'true','min'=>'0']) !!}
                                    {!! Form::label('hp', 'No. HP', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::email('email', $model->email,['class'=>'validate','required'=>'','aria-required'=>'true','min'=>'0']) !!}
                                    {!! Form::label('email', 'Alamat Email', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('no_identitas', $model->no_identitas,['class'=>'validate','required'=>'','aria-required'=>'true','min'=>'0']) !!}
                                    {!! Form::label('no_identitas', 'No. Identitas', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::select('jenis_kelamin', ['1'=>'Laki-laki','2'=>'Perempuan'], $model->available) !!}
                                    {!! Form::label('jenis_kelamin', 'Jenis Kelamain') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l12">
                {!! Form::submit('Simpan',['class'=>'waves-effect waves-light btn']) !!}
            </div>

        </div>
    </main>
    {!! Form::close() !!}
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush