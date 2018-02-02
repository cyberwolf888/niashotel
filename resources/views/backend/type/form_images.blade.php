@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    {!! Form::open(['route' => ['backend.type.gallery.store',$id], 'method' => 'post', 'files'=>true]) !!}
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Product Image</div>
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
                                    <div class="file-field input-field">
                                        <div class="btn teal lighten-1">
                                            <span>File</span>
                                            <input type="file">
                                            {!! Form::file('image') !!}
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('keterangan', $model->keterangan,['class'=>'validate','required'=>'','aria-required'=>'true']) !!}
                                    {!! Form::label('keterangan', 'Keterangan', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l12">
                {!! Form::submit('Simpan',['class'=>'waves-effect waves-light btn']) !!}
                <a class="waves-effect waves-light btn red" href="{{ route('backend.type.manage') }}">Back</a>
            </div>

        </div>
    </main>
    {!! Form::close() !!}
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush