@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    {!! Form::open(['route' => isset($update) ? ['backend.kamar.update', $model->id] :'backend.kamar.store', 'method' => 'post']) !!}
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Kamar</div>
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
                                    {!! Form::select('type_id', \App\Models\Type::where('status','1')->pluck('name','id'), $model->type_id) !!}
                                    {!! Form::label('type_id', 'Tipe Kamar') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('no_kamar', $model->no_kamar,['class'=>'validate','required'=>'','aria-required'=>'true','min'=>'1']) !!}
                                    {!! Form::label('no_kamar', 'No Kamar', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('harga', $model->harga,['class'=>'validate','required'=>'','aria-required'=>'true','min'=>'1']) !!}
                                    {!! Form::label('harga', 'Harga', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('extra_bed', $model->extra_bed,['class'=>'validate','required'=>'','aria-required'=>'true','min'=>'1']) !!}
                                    {!! Form::label('extra_bed', 'Harga Extra Bed', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::select('status', ['1'=>'Available','0'=>'Unavailable'], $model->status) !!}
                                    {!! Form::label('status', 'Status') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l12">
                {!! Form::submit('Simpan',['class'=>'waves-effect waves-light btn']) !!}
                <a class="waves-effect waves-light btn red" href="{{ route('backend.kamar.manage') }}">Back</a>
            </div>

        </div>
    </main>
    {!! Form::close() !!}
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush