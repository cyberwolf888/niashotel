@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    {!! Form::open(['route' => isset($update) ? ['backend.checkin.update', $model->id] :'backend.checkin.store', 'method' => 'post']) !!}
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Check-in</div>
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
                                    {!! Form::select('tamu_id', \App\Models\Tamu::pluck('nama','id'), $model->tamu_id) !!}
                                    {!! Form::label('tamu_id', 'Tamu') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::select('kamar_id', \App\Models\Kamar::where('status','1')->pluck('no_kamar','id'), $model->kamar_id,['id'=>'kamar_id']) !!}
                                    {!! Form::label('kamar_id', 'Kamar') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::select('extra', [1=>'Ya',0=>'Tidak'], 0,['id'=>'extra']) !!}
                                    {!! Form::label('extra', 'Extra Bed') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('total', 0,['id'=>'total','readonly'=>'', 'min'=>'0']) !!}
                                    {!! Form::label('total', 'Total', ['data-error' => 'wrong','data-success'=>'right']) !!}
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
    <script>
        var _token = $("input[name='_token']").val();

        function check_harga(no_kamar) {
            var extrabed = $("#extra").val();
            $.ajax({
                url: "<?= route('backend.checkin.check_harga') ?>",
                type:'POST',
                data: {_token:_token, no_kamar:no_kamar, extrabed:extrabed},
                success: function(data) {
                    $("#total").val(data);
                }
            });
        }
        $(document).ready(function () {
            var no_kamar = $("#kamar_id").val();
            check_harga(no_kamar);
        });
        $("#kamar_id").change(function () {
            var no_kamar = $("#kamar_id").val();
            check_harga(no_kamar);
        });
        $("#extra").change(function () {
            var no_kamar = $("#kamar_id").val();
            check_harga(no_kamar);
        });
    </script>
@endpush