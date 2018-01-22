@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('assets/backend') }}/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Kamar</div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Kelola Kamar</span>
                        <a class="waves-effect waves-light btn" href="{{ url(route('backend.kamar.create')) }}"><i class="material-icons left">open_in_new</i>Tambah Data Baru</a><br>
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe Kamar</th>
                                <th>Harga</th>
                                <th>Extra Ded</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tipe Kamar</th>
                                <th>Harga</th>
                                <th>Extra Ded</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($model as $row)
                                <tr>
                                    <td>{{ $row->no_kamar }}</td>
                                    <td>{{ $row->type->name }}</td>
                                    <td>Rp. {{ number_format($row->harga,0,',','.') }}</td>
                                    <td>Rp. {{ number_format($row->extra_bed,0,',','.') }}</td>
                                    <td>{{ $row->status == 1 ? 'Available':'Unavailable' }}</td>
                                    <td>
                                        <a href="{{ url(route('backend.kamar.show', ['id' => $row->id])) }}" class="btn-floating blue" style="opacity: 1;"><i class="material-icons">subject</i></a>
                                        <a href="{{ url(route('backend.kamar.edit', ['id' => $row->id])) }}" class="btn-floating orange" style="opacity: 1;"><i class="material-icons">mode_edit</i></a>
                                    </td>
                                </tr>
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