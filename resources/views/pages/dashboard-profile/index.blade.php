@extends('layouts.dashboard.index')

@section('title', 'Account & profile')

@section('breadcrumb')
    <li class="breadcrumb-item active">Account & Profile</li>
@endsection

@section('content')

    {{-- Form update account --}}
    <div class="row mb-3">
        <div class="col-lg-12">
            <form action="{{ route('dashboard.account.update', ['user' => $user->id]) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="card mb-3">
                    <h4 class="card-header">Account</h4>

                    <div class="card-body">
                        @if (session('account-updated'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-dark-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session('account-updated') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="form-group col-md-6 @error('username') position-relative mb-5 @enderror">
                                <label for="username" class="form-label">Username *</label>
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
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group col-md-6 @error('password') position-relative mb-5 @enderror">
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
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round">
                            <i class="feather icon-edit-2"></i>  Update Account
                        </button>
                        <button type="reset" class="btn btn-outline-secondary btn-round ml-2">
                            <i class="feather icon-x-circle"></i>  Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- End form update account --}}

    {{-- Form update profile --}}
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('dashboard.profile.update', ['profile' => $profile->id]) }}" method="post" id="form-profile" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card">
                    <h4 class="card-header">Profile</h4>

                    <div class="card-body">

                        @if (session('profile-updated'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-dark-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session('profile-updated') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row mb-5">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="media align-items-center">
                                        <img src="{{ asset('storage/'.$profile->profile_avatar) }}" id="view-avatar" alt="Avatar" class="d-block ui-w-120 shadow">
                                        <div class="media-body ml-3">
                                            <label class="form-label d-block mb-2">Avatar</label>
                                            <label class="btn btn-outline-primary waves-effect">
                                                Change
                                                <input
                                                    type="file"
                                                    name="avatar"
                                                    id="avatar"
                                                    accept="image/*"
                                                    class="user-edit-fileinput is-invalid"
                                                    style="display: none;"
                                                >
                                            </label>
                                        </div>
                                    </div>

                                    @error('avatar')
                                        <small class="form-text text-danger mt-2">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="form-row">

                            {{-- Form nama awal --}}
                            <div class="form-group col-md-4 @error('first_name') position-relaive mb-5 @enderror">
                                <label for="first-name" class="form-label">First Name *</label>
                                <input
                                    type="text"
                                    name="first_name"
                                    id="first-name"
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    placeholder="First Name"
                                    value="{{ $profile->profile_first_name }}"
                                    required
                                />

                                @error('first_name')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- Akhir form nama awal --}}

                            {{-- form nama akhir --}}
                            <div class="form-group col-md-4 @error('first_name') position-relaive mb-5 @enderror">
                                <label for="last-name" class="form-label">Last Name *</label>
                                <input
                                    type="text"
                                    name="last_name"
                                    id="last-name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    placeholder="Last Name"
                                    value="{{ $profile->profile_last_name }}"
                                    required
                                />

                                @error('last_name')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form nama akhir --}}

                            {{-- form email --}}
                            <div class="form-group col-md-4 @error('email') position-relaive mb-5 @enderror">
                                <label for="email" class="form-label">Email *</label>
                                <input
                                    type="text"
                                    name="email"
                                    id="email"
                                    placeholder="Email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $profile->profile_email }}"
                                    required
                                />

                                @error('email')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form email --}}

                        </div>

                        <div class="form-row">

                            {{-- Form tanggal lahir --}}
                            <div class="form-group col-md-4 @error('date_of_birth') position-relative mb-5 @enderror">
                                <label for="date-of-birth" class="form-label">Date Of Birth *</label>
                                <select name="date_of_birth" id="date-of-birth" class="form-control @error('date_of_birth') is-invalid @enderror" required>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" @if ($i == $profile->profile_date_of_birth) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>

                                @error('date_of_birth')<div class="invalid-tooltip">{{ $message }}</div>@enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form tanggal lahir --}}

                            {{-- form bulan lahir --}}
                            <div class="form-group col-md-4 @error('month_of_birth') position-relative mb-5 @enderror">
                                <label for="month-of-birth" class="form-label">Month Of Birth *</label>
                                <select name="month_of_birth" id="month-of-birth" class="form-control @error('month_of_birth') is-invalid @enderror" required>
                                    <option value="January" @if ($profile->profile_month_of_birth == 'January') selected @endif>January</option>
                                    <option value="February" @if ($profile->profile_month_of_birth == 'February') selected @endif>February</option>
                                    <option value="March" @if ($profile->profile_month_of_birth == 'March') selected @endif>March</option>
                                    <option value="April" @if ($profile->profile_month_of_birth == 'April') selected @endif>April</option>
                                    <option value="May" @if ($profile->profile_month_of_birth == 'May') selected @endif>May</option>
                                    <option value="Juny" @if ($profile->profile_month_of_birth == 'Juny') selected @endif>Juny</option>
                                    <option value="July" @if ($profile->profile_month_of_birth == 'July') selected @endif>July</option>
                                    <option value="August" @if ($profile->profile_month_of_birth == 'August') selected @endif>August</option>
                                    <option value="September" @if ($profile->profile_month_of_birth == 'September') selected @endif>September</option>
                                    <option value="October" @if ($profile->profile_month_of_birth == 'October') selected @endif>October</option>
                                    <option value="November" @if ($profile->profile_month_of_birth == 'November') selected @endif>November</option>
                                    <option value="December" @if ($profile->profile_month_of_birth == 'December') selected @endif>December</option>
                                </select>

                                @error('month_of_birth')<div class="invalid-tooltip">{{ $message }}</div>@enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form bulan lahir --}}

                            {{-- form tahun lahir --}}
                            <div class="form-group col-md-4 @error('year_of_birth') position-relative mb-5 @enderror">
                                <label for="year-of-birth" class="form-label">Year Of Birth *</label>
                                <select name="year_of_birth" id="year-of-birth" class="form-control @error('year_of_birth') is-invalid @enderror" required>
                                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                        <option value="{{ $i }}" @if ($i == $profile->profile_year_of_birth) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>

                                @error('year_of_birth')<div class="invalid-tooltip">{{ $message }}</div>@enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form tahun lahir --}}

                        </div>

                        <div class="form-row">

                            {{-- form nomer telepon --}}
                            <div class="form-group col-md-4 @error('phone') position-relaive mb-5 @enderror">
                                <label for="phone" class="form-label">Phone *</label>
                                <input
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ $profile->profile_phone }}"
                                    placeholder="(+__) ___-____"
                                    required
                                />

                                @error('phone')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form nomer telepon --}}

                            {{-- form email --}}
                            <div class="form-group col-md-4 @error('website') position-relaive mb-5 @enderror">
                                <label for="website" class="form-label">Website *</label>
                                <input
                                    type="text"
                                    name="website"
                                    id="website"
                                    placeholder="Website"
                                    class="form-control @error('website') is-invalid @enderror"
                                    value="{{ $profile->profile_website }}"
                                    required
                                />

                                @error('website')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form email --}}

                        </div>

                        <div class="form-row">

                            {{-- form kota --}}
                            <div class="form-group col-md-4 @error('city') position-relaive mb-5 @enderror">
                                <label for="city" class="form-label">City *</label>
                                <input
                                    type="text"
                                    name="city"
                                    id="city"
                                    placeholder="City"
                                    class="form-control @error('city') is-invalid @enderror"
                                    value="{{ $profile->profile_city }}"
                                    required
                                />

                                @error('city')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form kota --}}

                            {{-- Form negara --}}
                            <div class="form-group col-md-4 @error('country') position-relaive mb-5 @enderror">
                                <label for="country" class="form-label">country *</label>
                                <input
                                    type="text"
                                    name="country"
                                    id="country"
                                    placeholder="country"
                                    class="form-control @error('country') is-invalid @enderror"
                                    value="{{ $profile->profile_country }}"
                                    required
                                />

                                @error('country')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir Form negara --}}

                        </div>

                        <div class="form-row">

                            {{-- form nama jalan / alamat --}}
                            <div class="form-group col-sm-8 @error('street') position-relative mb-5 @enderror">
                                <label for="street" class="form-label">Address *</label>
                                <textarea
                                    name="street"
                                    id="street"
                                    placeholder="Address"
                                    rows="4"
                                    required
                                    class="form-control @error('street') is-invalid @enderror"
                                >{{ $profile->profile_street }}</textarea>

                                @error('street')
                                    <div class="invalid-tooltip">{{ $message }}</div>
                                @enderror

                                <div class="clearfix"></div>
                            </div>
                            {{-- akhir form nama jalan / alamat --}}
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round">
                            <i class="feather icon-edit-2"></i>  Update Profile
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-round ml-2" id="reset-form-profile">
                            <i class="feather icon-x-circle"></i>  Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- End form update profile --}}

@endsection

@section('script')
    <script>
        $(function () {
            vanillaTextMask.maskInput({
                inputElement: $("#phone")[0],
                mask: [
                    "(",
                    "+",
                    /\d/,
                    /\d/,
                    ")",
                    " ",
                    /\d/,
                    /\d/,
                    /\d/,
                    "-",
                    /\d/,
                    /\d/,
                    /\d/,
                    /\d/,
                    "-",
                    /\d/,
                    /\d/,
                    /\d/,
                    /\d/
                ]
            });
        });

        // Merubah foto avatar sesuai dengan file foto yang di upload
        document.querySelector('#avatar').addEventListener('change', function(e) {
            e.preventDefault();

            const file = e.target.files[0];
            const viewAvatar = document.querySelector('#view-avatar');

            viewAvatar.src = URL.createObjectURL(file);

        });

        // Mereset semua value form profile menjadi semula termasuk avatar
        document.querySelector('#reset-form-profile').addEventListener('click', function(e) {
            e.preventDefault();

            const formProfile = document.querySelector('#form-profile');
            const viewAvatar = document.querySelector('#view-avatar');

            formProfile.reset();
            viewAvatar.src = "{{ asset($profile->profile_avatar) }}";
        });

    </script>
@endsection
