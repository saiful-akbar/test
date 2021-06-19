@extends('layouts.dashboard.index')

@section('title', 'Education')

@section('breadcrumb')
    <li class="breadcrumb-item active">Education</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-round btn-primary" href="{{ route('dashboard.education.create') }}">
                        <i class="feather icon-plus-circle"></i>
                        Add Education
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>School</th>
                                            <th>Periode</th>
                                            <th class="text-center">Publish</th>
                                            <th class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($educations as $education)
                                            <tr class=" {{ $education->education_publish == 0 ? 'alert-danger' : null}}">
                                                <td>{{ $education->education_level }}</td>
                                                <td>{{ $education->education_school }}</td>
                                                <td>{{ $education->education_from }} - {{ $education->education_to }}</td>
                                                <td class="text-center">
                                                    <i class="font-weight-bold feather {{ $education->education_publish == 1 ? 'icon-check-circle text-success' : 'icon-x-circle text-danger'}}"></i>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-outline-info btn-sm btn-round mr-2" onclick="showDetail({{ $education->id }})">Detail</button>
                                                    <a class="btn btn-outline-success btn-sm btn-round mr-2" href={{ route('dashboard.education.edit', ['education' => $education->id]) }}>Edit</a>
                                                    <button class="btn btn-outline-danger btn-round btn-sm" onclick="deleteEducation({{ $education->id }})">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-center pt-2">
                                <nav class="overflow-x-auto">
                                    @php
                                        $page = $educations->currentPage(); // halaman yang aktif
                                        $total_page = $educations->lastPage(); // jumlah halaman
                                        $total_number = 2; // jumlah link selebum dan sesudah page aktif
                                        $start_number = ($page > $total_number) ? $page - $total_number : 1; // untuk awal link number
                                        $end_number = ($page < ($total_page - $total_number)) ? $page + $total_number : $total_page; // untuk akhir link number
                                    @endphp

                                    <ul class="pagination">
                                        <li class="page-item {{ $educations->currentPage() <= 1 ? 'disabled' : null }}">
                                            <a class="page-link" href="{{ $educations->url(1) }}">
                                                <i class="feather icon-chevrons-left"></i>
                                            </a>
                                        </li>

                                        @for ($i = $start_number; $i <= $end_number; $i++)
                                            <li class="page-item {{ $educations->currentPage() == $i ? 'active disabled' : null }}">
                                                <a class="page-link" href="{{ $educations->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        <li class="page-item {{ $educations->currentPage() >= $educations->lastPage() ? 'disabled' : null }}">
                                            <a class="page-link" href="{{ $educations->url($educations->lastPage()) }}">
                                                <i class="feather icon-chevrons-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
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
                        <span class="font-weight-light">Educational Information</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Education Level</label>
                            <input id="detail-education-level" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">School</label>
                            <input id="detail-education-school" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Period</label>
                            <input id="detail-education-period" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Publish</label>
                            <input id="detail-education-publish" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Created At</label>
                            <input id="detail-education-created" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Updated At</label>
                            <input id="detail-education-updated" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="form-label">Description</label>
                            <textarea id="detail-education-desc" rows="3" class="form-control" disabled></textarea>
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

    {{-- Form delete --}}
    <form method="POST" id="form-delete-education">
        @csrf @method('DELETE')
    </form>
@endsection

@push('script')
    <script>

        // Fungsi menampilkan detail education
        function showDetail(id) {
            $.ajax({
                type: "GET", // method
                url: url(`/app/resume/education/${id}`), // url
                dataType: "json", // data type
                success: function(res) { // success

                    // get values
                    const {
                        id,
                        education_level,
                        education_school,
                        education_from,
                        education_to,
                        education_desc,
                        education_publish,
                        created_at,
                        updated_at
                    } = res.education;

                    // set values
                    $('#detail-education-level').val(education_level);
                    $('#detail-education-school').val(education_school);
                    $('#detail-education-period').val(`${education_from} - ${education_to}`);
                    $('#detail-education-publish').val(education_publish === 1 ? 'Yes' : 'No');
                    $('#detail-education-created').val(created_at);
                    $('#detail-education-updated').val(updated_at);
                    $('#detail-education-desc').val(education_desc);

                    // show modal detail
                    $('#modal-detail').modal('show');
                },
                error: function(err) { // failed & tampilkan pesan error
                    toast("Error", err.status + ": " + err.statusText);
                }
            });
        }

        // Fungsi delete education
        function deleteEducation(id) {
            bootbox.confirm({
                title: "Delete",
                message: "Are you sure you want to permanently delete this educational data?",
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
                        const formDelete = $('#form-delete-education'); // form

                        formDelete.attr('action', url(`/app/resume/education/${id}`)); // isikan url
                        formDelete.submit(); // submit form
                    }
                }
            });
        }
    </script>
@endpush
