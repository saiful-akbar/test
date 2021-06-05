@extends('layouts.dashboard.index')

@section('title', 'Work Experience')

@section('css.libs')
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/libs/datatables/datatables.css') }}"/>
@endsection

@section('script.libs')
    <script src="{{ asset('assets/dashboard-layouts/libs/datatables/datatables.js') }}"></script>
@endsection


@section('breadcrumb')
<li class="breadcrumb-item active">Work Experience</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.work-experience.create') }}" class="btn btn-primary btn-round" >
                        <i class="feather icon-plus-circle"></i> Add Work Experience
                    </a>
                </div>
                <div class="card-body">
                    <div class="text-center loading">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table-work-experience" class="table table-hover content-show" width="100%"></table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Detail --}}
    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-lg">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Detailed
                        <span class="font-weight-light">work experience information</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Field Of Work</label>
                            <input id="detail_field_of_work" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Company</label>
                            <input id="detail_company" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Period</label>
                            <input id="detail_period" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Publish</label>
                            <input id="detail_publish" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Created At</label>
                            <input id="detail_created_at" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Updated At</label>
                            <input id="detail_updated_at" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="form-label">Description</label>
                            <textarea id="detail_desc" rows="3" class="form-control" disabled></textarea>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-round" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    <script>

        // inisilisasi datatable
        const dataTable = $('#table-work-experience').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            lengthChange: false,
            pageLength: 10,
            ajax: url('api/app/work-experience'),
            language: {
                info: "_START_-_END_ of _TOTAL_"
            },
            columns: [
                {
                    data: 'we_company',
                    title: 'Company'
                },
                {
                    data: 'we_field_of_work',
                    title: 'Field Of Work'
                },
                {
                    data: 'period',
                    title: 'Period'
                },
                {
                    data: 'we_publish',
                    title: 'Publish',
                    className: 'text-center',
                    orderable: false,
                    searchable: false,
                    render: function ( data, type, row, meta ) {
                        return `<i class="font-weight-bold feather ${data == 1 ? 'icon-check-circle text-success' : 'icon-x-circle text-danger'}"></i>`;
                    }
                },
                {
                    data: 'action',
                    title: 'Action',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                }
            ],
        });

        function reloadTable() {
            dataTable.ajax.reload();
        }


        // fungsi view detail dengan request api untuk mengabil data by id
        function openModalDetail(id) {
            $.ajax({
                type: "GET",
                url: url(`api/app/work-experience/${id}`),
                dataType: "json",
                success: function (res) {

                    // tampilkan modal detail
                    $('#modal-detail').modal('show');

                    // set value pada detail
                    $('#detail_field_of_work').val(res.data.we_field_of_work);
                    $('#detail_company').val(res.data.we_company);
                    $('#detail_period').val(`${res.data.we_from} - ${res.data.we_to}`);
                    $('#detail_created_at').val(res.data.created_at);
                    $('#detail_updated_at').val(res.data.updated_at);
                    $('#detail_desc').val(res.data.we_desc);
                    $('#detail_publish').val(res.data.we_publish == 1 ? "Yes" : "No");
                },
                error: function(err) {
                    toast("Error", err.status + ": " + err.statusText);
                }
            });
        }

        // Fungsi delete
        function destroy(id) {
            bootbox.confirm({
                title: "Delete",
                message: "Are you sure you want to permanently delete this data?",
                buttons: {
                    confirm: {
                        label: 'Delete',
                        className: 'btn-danger btn-round'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-outline-secondary btn-round'
                    }
                },
                callback: result => {
                    if (result) { // jika pesan dihapus
                        const token = $('meta[name=csrf-token]').attr('content');

                        $.ajax({
                            type: "DELETE",
                            url: url(`api/app/work-experience/${id}`),
                            data: { _token: token },
                            dataType: "json",
                            success: function (res) {
                                toast("Success", res.message);
                                reloadTable();
                            },
                            error: function(err) {
                                toast("Error", err.status + " : " + err.responseJSON.message);
                            }
                        });
                    }
                }
            });
        }
    </script>
@endsection
