{{-- Form update account --}}
<form action="{{ route('dashboard.account.update', ['user' => $user->id]) }}" method="post">
    @csrf
    @method('PATCH')

    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username" class="form-label">Username <small class="text-danger">*</small></label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="form-control @error('username') is-invalid @enderror"
                        placeholder="Username"
                        value="{{ $user->username }}"
                        required
                    />

                    @error('username')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="password"
                    />

                    <small class="form-text text-muted">
                        Kosongkan password jika tidak ingin merubanhnya
                    </small>

                    @error('password')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-round">
                <i class="feather icon-edit-1"></i>  Update Account
            </button>
        </div>
    </div>
</form>
{{-- End form update account --}}
