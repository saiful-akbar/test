@extends('layouts.dashboard.index')

@section('title', 'Skill')

@section('css.libs')
    <link rel="stylesheet" href="{{ asset('assets/dashboard-layouts/libs/datatables/datatables.css') }}"/>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Skill</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header with-elements d-flex justify-content-between">
                    <h4 class="card-header-title mr-2">Skill List</h4>
                    <div class="card-header-elements">
                        <button onclick="handleOpenModalForm('Add')" class="btn btn-primary btn-round">
                            <i class="feather icon-plus-circle"></i> Add Skill
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center loading">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table-skill" class="table table-hover content-show" width="100%"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Detail --}}
    <div class="modal fade" id="modal-form">
        <div class="modal-dialog">
            <form class="modal-content" method="post" name="add" action="{{ route('api.skill.store') }}" autocomplete="off">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" onclick="handleCloseModalForm()">×</button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-12 mb-4">
                            <label class="form-label">Skill Name *</label>
                            <input id="skill_name" name="skill_name" class="form-control" placeholder="Enter skill name..." autofocus required>
                            <small class="invalid-feedback" data-error="skill_name"></small>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
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
@endsection

@section('script.libs')
    <script src="{{ asset('assets/dashboard-layouts/libs/datatables/datatables.js') }}"></script>
@endsection

@section('script')
    <script src="{{ asset('assets/dashboard-layouts/pages/skill.js') }}"></script>
@endsection
