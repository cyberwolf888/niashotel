@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('assets/backend') }}/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Check-in</div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Kelola Check-in</span>
                        <a class="waves-effect waves-light btn" href="{{ url(route('backend.checkin.create')) }}"><i class="material-icons left">open_in_new</i>Tambah Data Baru</a><br>
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tgl Check-in</th>
                                <th>Nama Tamu</th>
                                <th>No Kamar</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tgl Check-in</th>
                                <th>Nama Tamu</th>
                                <th>No Kamar</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($model as $row)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ date('d/m/Y',strtotime($row->tgl)) }}</td>
                                    <td>{{ $row->tamu->nama }}</td>
                                    <td>{{ $row->detail->kamar->no_kamar }}</td>
                                    <td>{{ number_format($row->detail->total,0,',','.') }}</td>
                                    <td>
                                        <a href="{{ url(route('backend.checkin.show', ['id' => $row->id])) }}" class="btn-floating blue" style="opacity: 1;"><i class="material-icons">subject</i></a>
                                        <a href="{{ url(route('backend.checkout.create_from_checkin', ['id' => $row->id])) }}" class="btn-floating yellow" style="opacity: 1;"><i class="material-icons">done</i></a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('plugin_scripts')
<script src="{{ url('assets/backend') }}/plugins/sweetalert/sweetalert.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables/js/jquery.dataTables.min.js"></script>
@endpush

@push('scripts')
<script src="{{ url('assets/backend') }}/js/pages/table-data.js"></script>
<script>
    @if (session('success'))
        $(document).ready(function () {
        swal("Success!", "{{ session('success') }}", "success");
    })
    @endif
</script>
@endpush