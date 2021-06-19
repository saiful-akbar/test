@section('css.libs')
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/libs/datatables/datatables.css') }}"/>
@endsection

@section('script.libs')
    <script src="{{ asset('assets/dashboard-layouts/libs/datatables/datatables.js') }}"></script>
@endsection



<div class="card">
    <div class="card-header with-elements">
        <div class="card-header-elements">
            <button class="btn btn-primary btn-round" onclick="handleOpenModalForm('Add')">
                <i class="feather icon-plus-circle"></i> Add Social Media
            </button>
        </div>
    </div>

    <div class="card-body">
        <table id="table-socmed" class="table" width="100%"></table>
    </div>
</div>


{{-- Modal form --}}
<div class="modal fade" id="modal-form" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" method="post" name="add" action="{{ route('api.socmed.store') }}" autocomplete="off">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" onclick="handleCloseModalForm()">×</button>
            </div>

            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12 mb-4">
                        <label class="form-label">Social Media Name <small class="text-danger">*</small></label>
                        <input id="socmed_name" name="socmed_name" class="form-control" placeholder="Enter social media name..." autofocus required>
                        <small class="invalid-feedback" data-error="socmed_name"></small>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12 mb-4">
                        <label class="form-label">Icon <small class="text-danger">*</small></label>
                        <input id="socmed_icon" name="socmed_icon" class="form-control" placeholder="Enter url..." autofocus required>
                        <small class="form-text text-muted">Use font awesome icons</small>
                        <small class="invalid-feedback" data-error="socmed_icon"></small>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12 mb-4">
                        <label class="form-label">Url <small class="text-danger">*</small></label>
                        <input id="socmed_url" name="socmed_url" class="form-control" placeholder="Enter url..." autofocus required>
                        <small class="invalid-feedback" data-error="socmed_url"></small>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12 mb-4">
                        <label class="switcher">
                            <input type="checkbox" name="publish" id="publish" class="switcher-input" checked>
                            <span class="switcher-indicator">
                                <span class="switcher-yes"></span>
                                <span class="switcher-no"></span>
                            </span>
                            <span class="switcher-label">Publish</span>
                        </label>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="spinner-border text-primary mr-2 hide" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <button type="submit" class="btn btn-primary btn-round"></button>
                <button type="button" class="btn btn-outline-secondary btn-round" onclick="handleCloseModalForm()">Close</button>
            </div>
        </form>
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
            language: {
                info: "Rows _START_ - _END_ of _TOTAL_"
            },
            ajax: url("api/app/socmed"),
            columns: [
                {
                    data: "socmed_name",
                    name: "socmed_name",
                    title: "Social Media",
                },
                {
                    data: "socmed_icon",
                    name: "socmed_icon",
                    title: "Icon",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return `<i class="font-weight-bold ${data}"></i>`;
                    },
                },
                {
                    data: "socmed_publish",
                    name: "socmed_publish",
                    title: "Publish",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return `
                            <i class="font-weight-bold feather ${
                                data == 1
                                ? "icon-check-circle text-success"
                                : "icon-x-circle text-danger"
                            }"></i>
                        `;
                    },
                },
                {
                    data: "socmed_url",
                    name: "socmed_url",
                    title: "Url",
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        return `<a href="${data}" target="_blank">${data}</a>`;
                    }
                },
                {
                    data: "action",
                    name: "action",
                    title: "Action",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                },
            ],
        });

        /* Fungsi handle close modal form */
        function handleCloseModalForm() {
            $("#modal-form").modal("hide"); // close modal
            $("#modal-form form")[0].reset(); // reset form
            $("#publish").attr("checked", true); // set publish menjadi true
            $("#modal-form form :input").removeClass("is-invalid"); // remove invalid class pada form
        }

        /* Fungsi disable form */
        function isDissableForm(value = false) {
            const button = $("#modal-form button");
            const input = $("#modal-form form :input");
            const spinner = $("#modal-form .spinner-border");

            button.attr("disabled", value);
            input.attr("readonly", value);
            value ? spinner.show() : spinner.hide();
        }

        /* Fungsi handle open modal form */
        function handleOpenModalForm(type = 'Add', id = null) {
            const modal = $("#modal-form");
            const title = $("#modal-form .modal-title");
            const form = $("#modal-form form");
            const btnSubmit = $("#modal-form button[type=submit]");
            const actionType = type.trim().toLowerCase();

            // Set title, button submit
            title.text(actionType == 'add' ? 'Add Social Media' : 'Edit Social Media');
            btnSubmit.html(`
                <i class="feather ${
                    actionType == 'add'
                        ? 'icon-plus-circle'
                        : 'icon-edit-1'
                }"></i> ${actionType == "add" ? "Add" : "Update"}
            `);

            if (actionType == 'add') {
                $('#modal-form').modal('show');
            } else {
                alert('Edit')
            }
        }

    </script>
@endsection
