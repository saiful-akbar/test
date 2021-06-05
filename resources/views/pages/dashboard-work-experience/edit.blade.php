@extends('layouts.dashboard.index')


@section('title', 'Edit Work Experience')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.work-experience') }}">Work Experience</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection


@section('back')
    <a href="{{ route('dashboard.work-experience') }}" class="btn btn-default btn-round">
        <span class="fas fa-angle-left"></span> Back
    </a>
@endsection


@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <form action="{{ route('dashboard.work-experience.update', ['id' => $we->id]) }}" method="POST">
                @csrf @method('PATCH')

                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="field_of_work">Field Of Work *</label>
                                <input
                                    id="field_of_work"
                                    name="field_of_work"
                                    placeholder="Enter field of work..."
                                    class="form-control @error('field_of_work') is-invalid @enderror"
                                    value="{{ $we->we_field_of_work }}"
                                    required
                                />

                                @error('field_of_work')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label" for="company">Company *</label>
                                <input
                                    id="company"
                                    name="company"
                                    placeholder="Enter company name..."
                                    class="form-control @error('company') is-invalid @enderror"
                                    value="{{ $we->we_company }}"
                                    required
                                />

                                @error('company')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="from_period">From Period *</label>
                                <div class="@error('from_period') is-invalid @enderror">
                                    <select
                                        name="from_period"
                                        id="from_period"
                                        data-allow-clear="true"
                                        style="width: 100%"
                                        class="form-control select2"
                                        required
                                    >
                                        <option selected></option>

                                        @for ($i = date('Y'); $i > date('Y') - 100; $i--)
                                            <option value="{{ $i }}" {{ $we->we_from == $i ? 'selected' : null }} >{{ $i }}</option>
                                        @endfor
                                    </select>

                                    @error('from_period')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label" for="to_period">To Period *</label>
                                <div class="@error('to_period') is-invalid @enderror">
                                    <select
                                        name="to_period"
                                        id="to_period"
                                        data-allow-clear="true"
                                        style="width: 100%"
                                        class="form-control select2"
                                        data-value="{{ $we->we_to }}"
                                        required
                                    >
                                        <option selected></option>
                                    </select>

                                    @error('to_period')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea
                                    id="description"
                                    name="description"
                                    rows="4"
                                    placeholder="Enter description..."
                                    class="form-control @error('description') is-invalid @enderror"
                                >{{ $we->we_desc }}</textarea>

                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="switcher">
                                    <input type="checkbox" name="publish" id="publish" class="switcher-input" {{ $we->we_publish == 1 ? "checked" : null }}>
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


@section('script')
    <script>
        $(document).ready(function () {

            // Ambil value form select from_period
            const fromPeriodValue = $('#from_period').val();

            // Cek value
            if (fromPeriodValue.trim().toLowerCase() != "") {
                const thisYear = new Date().getFullYear();
                const diff = thisYear - fromPeriodValue;
                const toPeriodValue = $('#to_period').data('value');

                for (let i = fromPeriodValue; i <= thisYear; i++) {
                    $('#to_period').prepend(`<option value="${i}" ${toPeriodValue == i ? "selected" : ""}>${i}</option>`);
                }
            }

            // Event saat form select form dipilih
            $('#from_period').change(function (e) {
                e.preventDefault();

                // remove child element
                $('#to_period option').remove();

                // Get data
                const selected = $(this).val();
                const thisYear = new Date().getFullYear();
                const diff = thisYear - selected;

                // cek value
                $('#to_period').html(`<option selected></option>`);
                for (let i = selected; i <= thisYear; i++) {
                    $('#to_period').prepend(`<option value"${i}">${i}</option>`);
                }
            });
        });
    </script>
@endsection
