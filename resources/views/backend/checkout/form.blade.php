@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    {!! Form::open(['route' => isset($update) ? ['backend.checkout.update', $model->id] :'backend.checkout.store', 'method' => 'post']) !!}
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Check-out</div>
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
                                    {!! Form::select('checkin_id', \App\Models\Checkin::where('status','0')->join('transaksi_detail','transaksi_detail.checkin_id','=','checkin.id')->pluck('kamar_id','checkin_id'), $kamar_id,['id'=>'checkin_id']) !!}
                                    {!! Form::label('checkin_id', 'Kamar') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('harga', 0,['id'=>'harga','readonly'=>'', 'min'=>'0']) !!}
                                    {!! Form::label('harga', 'Rate per hari', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('tgl_checkin', '-',['id'=>'tgl_checkin','readonly'=>'', 'min'=>'0']) !!}
                                    {!! Form::label('tgl_checkin', 'Tanggal Checkin', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('durasi', 0,['id'=>'durasi','readonly'=>'', 'min'=>'0']) !!}
                                    {!! Form::label('durasi', 'Durasi Menginap (hari)', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('subtotal', 0,['id'=>'subtotal','readonly'=>'', 'min'=>'0']) !!}
                                    {!! Form::label('subtotal', 'Sub Total', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('tax', 0,['id'=>'tax','readonly'=>'', 'min'=>'0']) !!}
                                    {!! Form::label('tax', 'Pajak (10%)', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('service', 0,['id'=>'service','readonly'=>'', 'min'=>'0']) !!}
                                    {!! Form::label('service', 'Service (7%)', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('diskon', 0,['id'=>'diskon', 'min'=>'0']) !!}
                                    {!! Form::label('diskon', 'Diskon (%)', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::number('total', 0,['id'=>'total','readonly'=>'', 'min'=>'0']) !!}
                                    {!! Form::label('total', 'Total', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('keterangan', null,['id'=>'keterangan']) !!}
                                    {!! Form::label('keterangan', 'Keterangan', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('nama', '-',['id'=>'nama','readonly'=>'']) !!}
                                    {!! Form::label('nama', 'Nama Tamu', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('alamat', '-',['id'=>'alamat','readonly'=>'']) !!}
                                    {!! Form::label('alamat', 'Alamat', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('hp', '-',['id'=>'hp','readonly'=>'']) !!}
                                    {!! Form::label('hp', 'No. HP', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('email', '-',['id'=>'email','readonly'=>'']) !!}
                                    {!! Form::label('email', 'Alamat Email', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('no_identitas', '-',['id'=>'no_identitas','readonly'=>'']) !!}
                                    {!! Form::label('no_identitas', 'No. Identitas', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::text('jenis_kelamin', '-',['id'=>'jenis_kelamin','readonly'=>'']) !!}
                                    {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['data-error' => 'wrong','data-success'=>'right']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l12">
                {!! Form::submit('Simpan',['class'=>'waves-effect waves-light btn']) !!}
                <a class="waves-effect waves-light btn red" href="{{ route('backend.checkout.manage') }}">Back</a>
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
        var total = parseInt($("#total").val());
        function get_total(checkin_id) {
            $.ajax({
                url: "<?= route('backend.checkout.get_total') ?>",
                type:'POST',
                data: {_token:_token, checkin_id:checkin_id},
                success: function(data) {
                    console.log(data);
                    $("#harga").val(data.harga);
                    $("#tgl_checkin").val(data.tgl_checkin);
                    $("#durasi").val(data.durasi);
                    $("#subtotal").val(data.total);
                    $("#tax").val(data.total*15/100);
                    $("#service").val(data.total*7/100);
                    $("#total").val(parseInt($("#subtotal").val())+parseInt($("#tax").val())+parseInt($("#service").val()));
                    total = parseInt($("#total").val());

                    $("#nama").val(data.tamu.nama);
                    $("#alamat").val(data.tamu.alamat);
                    $("#hp").val(data.tamu.hp);
                    $("#email").val(data.tamu.email);
                    $("#no_identitas").val(data.tamu.no_identitas);
                    $("#jenis_kelamin").val(data.tamu.jenis_kelamin);
                }
            });
        }
        $("#diskon").change(function () {
            var diskon = parseInt($("#diskon").val());
            if(diskon != ""){
                var _diskon = total*diskon/100;
                $("#total").val(total-_diskon);
            }

        });
        $(document).ready(function () {
            var checkin_id = $("#checkin_id").val();
            get_total(checkin_id);
        });
        $("#checkin_id").change(function () {
            var checkin_id = $("#checkin_id").val();
            get_total(checkin_id);
        });
    </script>
@endpush