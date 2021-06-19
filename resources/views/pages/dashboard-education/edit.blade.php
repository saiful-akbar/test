@extends('layouts.dashboard.index')


@section('title', 'Edit Education')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.education') }}">Education</a></li>
    <li class="breadcrumb-item active">Edit Education</li>
@endsection


@section('back')
    <a href="{{ route('dashboard.education') }}" class="btn btn-default btn-round">
        <span class="fas fa-angle-left"></span> Back
    </a>
@endsection


@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <form action="{{ route('dashboard.education.update', ["education" => $education->id]) }}" method="POST">
                @csrf @method('PATCH')

                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="education_level" class="form-label">Education Level *</label>
                                <div class="@error('education_level') is-invalid @enderror">
                                    <select
                                        name="education_level"
                                        id="education_level"
                                        data-allow-clear="true"
                                        style="width: 100%"
                                        class="form-control select2"
                                        required
                                    >
                                        <option disabled selected></option>
                                        <option value="Elementary School" {{ $education->education_level == "Elementary School" ? "selected" : null }} >Elementary School</option>
                                        <option value="Junior High School" {{ $education->education_level == "Junior High School" ? "selected" : null }} >Junior High School</option>
                                        <option value="Senior High School" {{ $education->education_level == "Senior High School" ? "selected" : null }} >Senior High School</option>
                                        <option value="Bachelor Degree" {{ $education->education_level == "Bachelor Degree" ? "selected" : null }} >Bachelor Degree</option>
                                        <option value="Masters" {{ $education->education_level == "Masters" ? "selected" : null }} >Masters</option>
                                        <option value="Doctor" {{ $education->education_level == "Doctor" ? "selected" : null }} >Doctor</option>
                                    </select>
                                </div>

                                @error('education_level')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="education_school" class="form-label">Department and School Name *</label>
                                <input
                                    type="text"
                                    name="education_school"
                                    id="education_school"
                                    placeholder="Enter Department and school name..."
                                    class="form-control @error('education_school') is-invalid @enderror"
                                    value="{{ $education->education_school }}"
                                    required
                                />

                                @error('education_school')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="education_from" class="form-label">From Period *</label>
                                <div class="@error('education_from') is-invalid  @enderror">
                                    <select
                                        name="education_from"
                                        id="education_from"
                                        data-allow-clear="true"
                                        style="width: 100%"
                                        class="form-control select2"
                                        required
                                    >
                                        <option selected></option>

                                        @for ($i = date('Y'); $i > date('Y') - 100; $i--)
                                            <option value="{{ $i }}" {{ $education->education_from == $i ? "selected" : null }} >{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                @error('education_from')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="education_to" class="form-label">To Period *</label>
                                <div class="@error('education_to') is-invalid  @enderror">
                                    <select
                                        name="education_to"
                                        id="education_to"
                                        data-allow-clear="true"
                                        style="width: 100%"
                                        class="form-control select2"
                                        data-value="{{ $education->education_to }}"
                                        required
                                    >
                                        <option selected></option>
                                    </select>
                                </div>

                                @error('education_to')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="education_desc" class="form-label">Education Description</label>
                                <textarea name="education_desc" id="education_desc" class="form-control @error('education_desc') is-invalid @enderror" rows="3" placeholder="Enter description...">{{ $education->education_desc }}</textarea>

                                @error('education_desc')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="switcher">
                                    <input type="checkbox" name="education_publish" id="education_publish" class="switcher-input @error('education_publish') is-invalid @enderror" {{ $education->education_publish == 1 ? "checked" : null }}>
                                    <span class="switcher-indicator">
                                        <span class="switcher-yes"></span>
                                        <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Publish</span>
                                </label>

                                @error('education_publish')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-round btn-primary">
                            <i class="feather icon-edit-1"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('css.libs')
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/libs/select2/select2.css') }}">
@endpush


@push('script.libs')
    <script src="{{ asset('assets/dashboard-layouts/libs/select2/select2.js') }}"></script>
@endpush


@push('script')
    <script>
        $(document).ready(function () {

            // Ambil value form select education_from
            const fromSelected = $('#education_from').val();

            // Cek value
            if (fromSelected.trim().toLowerCase() != "") {
                const thisYear = new Date().getFullYear();
                const diff = thisYear - fromSelected;
                const value = $('#education_to').data('value');

                for (let i = fromSelected; i <= thisYear; i++) {
                    $('#education_to').prepend(`<option value="${i}" ${value == i ? "selected" : ""}>${i}</option>`);
                }
            }


            // Event saat form select education_form dipilih
            $('#education_from').change(function (e) {
                e.preventDefault();

                // remove child element
                $('#education_to option').remove();

                // Get data
                const selected = $(this).val();
                const thisYear = new Date().getFullYear();
                const diff = thisYear - selected;

                // cek value
                if (selected.trim() === "Select..." || selected === "") {
                    $('#education_to').attr('disabled', true);
                } else {
                    $("#education_to").removeAttr('disabled');
                    $('#education_to').html(`<option selected="selected"></option>`);

                    for (let i = selected; i <= thisYear; i++) {
                        $('#education_to').prepend(`<option value"${i}">${i}</option>`);
                    }
                }
            });
        });
    </script>
@endpush
