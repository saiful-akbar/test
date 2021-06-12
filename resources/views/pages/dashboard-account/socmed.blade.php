@section('css.libs')
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/libs/datatables/datatables.css') }}"/>
@endsection

@section('script.libs')
    <script src="{{ asset('assets/dashboard-layouts/libs/datatables/datatables.js') }}"></script>
@endsection



<div class="card">
    <div class="card-header with-elements">
        <div class="card-header-elements">
            <button class="btn btn-primary btn-round">
                <i class="feather icon-plus-circle"></i> Add Social Media
            </button>
        </div>
    </div>

    <div class="card-body">
        <table id="table-socmed" class="table table-hover" width="100%"></table>
    </div>
</div>



@section('script')
    <script>

        /* Inisialisasi dataTable */
        const dataTable = $("#table-socmed").DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            lengthChange: false,
            pageLength: 10,
            ajax: url("api/app/account/socmed"),
            language: {info: "Rows _START_ - _END_ of _TOTAL_"},
            columns: [
                {
                    data: "socmed_name",
                    title: "Social Media",
                },
                {
                    data: "socmed_publish",
                    title: "Publish",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return `<i class="font-weight-bold feather ${data == 1 ? "icon-check-circle text-success" : "icon-x-circle text-danger"}"></i>`;
                    },
                },
                {
                    data: "created_at",
                    title: "Created",
                },
                {
                    data: "updated_at",
                    title: "Updated",
                },
                {
                    data: "action",
                    title: "Action",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                },
            ],
        });
    </script>
@endsection
