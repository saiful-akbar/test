@extends('layouts.dashboard.index')


@section('title', 'Add Education')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.education') }}">Education</a></li>
    <li class="breadcrumb-item active">Add Education</li>
@endsection


@section('back')
    <a href="{{ route('dashboard.education') }}" class="btn btn-default btn-round">
        <span class="fas fa-angle-left"></span> Back
    </a>
@endsection


@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <form action="">
                @csrf @method('POST')

                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12 @error('education_level') position-relative mb-5 @enderror">
                                <label for="education_level" class="form-label">Education Level</label>
                                <select
                                    name="education_level"
                                    id="education_level"
                                    data-allow-clear="true"
                                    style="width: 100%"
                                    class="form-control select2 @error('education_level') is-invalid @enderror"
                                >
                                    <option disabled selected></option>
                                    <option value="Elementary School" >Elementary School</option>
                                    <option value="Junior High School" >Junior High School</option>
                                    <option value="Senior High School" >Senior High School</option>
                                    <option value="Bachelor Degree" >Bachelor Degree</option>
                                    <option value="Masters" >Masters</option>
                                    <option value="Doctor" >Doctor</option>
                                </select>

                                @error('education_level')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group col-md-6 col-sm-12 @error('education_school') position-relative mb-5 @enderror">
                                <label for="education_school" class="form-label">Department and School Name</label>
                                <input
                                    type="text"
                                    name="education_school"
                                    id="education_school"
                                    placeholder="Enter Department and school name..."
                                    class="form-control @error('education_school') is-invalid @enderror"
                                />

                                @error('education_school')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12 @error('education_from') position-relative mb-5 @enderror">
                                <label for="education_from" class="form-label">From Period</label>
                                <select
                                    name="education_from"
                                    id="education_from"
                                    data-allow-clear="true"
                                    style="width: 100%"
                                    class="form-control select2 @error('education_from') is-invalid @enderror"
                                >
                                    <option selected></option>

                                    @for ($i = date('Y'); $i > date('Y') - 100; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>

                                @error('education_from')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group col-md-6 col-sm-12 @error('education_to') position-relative mb-5 @enderror">
                                <label for="education_to" class="form-label">To Period</label>
                                <select
                                    name="education_to"
                                    id="education_to"
                                    data-allow-clear="true"
                                    style="width: 100%"
                                    class="form-control select2 @error('education_to') is-invalid @enderror"
                                    disabled
                                >
                                    <option selected></option>
                                </select>

                                @error('education_to')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-round btn-primary">
                            <i class="feather icon-plus-circle"></i> Add Education
                        </button>

                        <button type="reset" class="btn btn-round btn-outline-secondary ml-2">
                            <i class="feather icon-x-circle"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function () {

            // Event saat form select education_form dipilih
            $('#education_from').change(function (e) {
                e.preventDefault();

                // remove child element
                $('#education_to option').remove();

                // Get data
                const selected = $(this).val();
                const thisYear = new Date().getFullYear();
                const diff = thisYear - selected;

                if (selected.trim() === "Select..." || selected === "") { // cek value
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
@endsection
