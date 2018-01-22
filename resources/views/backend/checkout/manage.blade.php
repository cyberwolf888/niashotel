@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('assets/backend') }}/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Check-out</div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Kelola Check-out</span>
                        <a class="waves-effect waves-light btn" href="{{ url(route('backend.checkout.create')) }}"><i class="material-icons left">open_in_new</i>Tambah Data Baru</a><br>
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th>Tgl Check-in</th>
                                <th>Tgl Check-out</th>
                                <th>Nama Tamu</th>
                                <th>No Kamar</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Tgl Check-in</th>
                                <th>Tgl Check-out</th>
                                <th>Nama Tamu</th>
                                <th>No Kamar</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($model as $row)
                                <tr>
                                    <td>{{ date('d/m/Y',strtotime($row->checkin->tgl)) }}</td>
                                    <td>{{ date('d/m/Y',strtotime($row->tgl)) }}</td>
                                    <td>{{ $row->checkin->tamu->nama }}</td>
                                    <td>{{ $row->checkin->detail->kamar->no_kamar }}</td>
                                    <td>{{ $row->total }}</td>
                                    <td>
                                        <a href="{{ url(route('backend.checkout.show', ['id' => $row->id])) }}" class="btn-floating blue" style="opacity: 1;"><i class="material-icons">subject</i></a>
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