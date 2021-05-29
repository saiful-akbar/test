@extends('layouts.dashboard.index')

@section('title', 'Education')

@section('breadcrumb')
    <li class="breadcrumb-item">Resume</li>
    <li class="breadcrumb-item active">Education</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">Educational List</h4>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                    <tr>
                                        <td>{{ $education->education_level }}</td>
                                        <td>{{ $education->education_school }}</td>
                                        <td>{{ $education->education_from }} - {{ $education->education_to }}</td>
                                        <td class="text-center">
                                            @if ($education->education_publish == 1)
                                                <i class="feather icon-check-circle text-success font-weight-bold"></i>
                                            @else
                                                <i class="feather feather icon-x-circle text-danger font-weight-bold"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-info btn-sm btn-round mr-2 btn-detail" data-id="{{ $education->id }}">Detail</button>
                                            <button class="btn btn-outline-success btn-sm btn-round mr-2">Edit</button>
                                            <button class="btn btn-outline-danger btn-round btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal template -->
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
                            <input id="education-level" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">School</label>
                            <input id="education-school" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Period</label>
                            <input id="education-period" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Publish</label>
                            <input id="education-publish" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Created At</label>
                            <input id="education-created" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label class="form-label">Updated At</label>
                            <input id="education-updated" class="form-control" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="form-label">Description</label>
                            <textarea id="education-desc" rows="3" class="form-control" disabled></textarea>
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
        $(document).ready(function () {
            $('.btn-detail').click(function (e) {
                e.preventDefault();

                const id = $(this).data('id');
                const baseUrl = $('meta[name=base-url]').attr('content');
                const url = `${baseUrl}/app/resume/education/${id}`;

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
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
                        $('#education-level').val(education_level);
                        $('#education-school').val(education_school);
                        $('#education-period').val(`${education_from} - ${education_to}`);
                        $('#education-publish').val(education_publish === 1 ? 'Yes' : 'No');
                        $('#education-created').val(created_at);
                        $('#education-updated').val(updated_at);
                        $('#education-desc').val(education_desc);

                        // show modal detail
                        $('#modal-detail').modal('show');
                    },
                    error: function(err) { // failed
                        const {message} = err.responseJSON;
                        bootbox.alert({
                            title: `Error ${err.status}`,
                            message: message
                        });
                    }
                });
            });
        });
    </script>
@endsection
