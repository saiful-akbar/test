<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $profile = $user->profile()->first();

        return view('pages.dashboard-profile.index', [
            'profile' => $profile,
            'user' => $user,
        ]);
    }

    /**
     * method untuk update user akun
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAccount(Request $request, User $user)
    {
        $request->validate(['username' => 'required|string|max:100']);

        if (isset($request->password) && !empty($request->password)) {
            $request->validate(['password' => 'min:6']);
            $user->password = Hash::make(htmlspecialchars($request->password));
        }

        $user->username = htmlspecialchars($request->username);
        $user->save();

        return redirect()->route('dashboard.profile')->with("account-updated", "Account updated successfully");
    }

    public function updateProfile(Request $request, Profile $profile)
    {
        $min_date = date('Y') - 100;
        $max_date = date('Y');

        $request->validate([
            'avatar'         => 'nullable|image|max:5000',
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'date_of_birth'  => 'required|numeric|max:31|min:1',
            'month_of_birth' => 'required|string',
            'year_of_birth'  => "required|numeric|max:{$max_date}|min:{$min_date}",
            'phone'          => "required|string|max:19|min:10",
            'street'         => "required|string|max:200",
            'city'           => "required|string|max:200",
            'country'        => "required|string|max:200",
            'website'        => "required|string|max:100",
            'email'          => "required|email:rfc,filter",
        ]);

        // Cek apakah avatar di upload atau tidak
        $avatar = $profile->profile_avatar;
        if ($request->hasFile('avatar')) {
            if ($avatar != null) {
                Storage::disk('public')->delete($profile->profile_avatar);
            }

            $avatar = $request->file('avatar')->storePublicly('images/avatar', 'public');
        }

        // Udah dan simpan di database
        Profile::where('id', $profile->id)->update([
            "user_id"                => Auth::user()->id,
            "profile_avatar"         => $avatar,
            "profile_first_name"     => htmlspecialchars(ucwords($request->first_name)),
            "profile_last_name"      => htmlspecialchars(ucwords($request->last_name)),
            "profile_date_of_birth"  => htmlspecialchars($request->date_of_birth),
            "profile_month_of_birth" => htmlspecialchars(ucwords($request->month_of_birth)),
            "profile_year_of_birth"  => htmlspecialchars($request->year_of_birth),
            "profile_phone"          => htmlspecialchars($request->phone),
            "profile_street"         => htmlspecialchars($request->street),
            "profile_city"           => htmlspecialchars(ucwords($request->city)),
            "profile_country"        => htmlspecialchars(ucwords($request->country)),
            "profile_website"        => htmlspecialchars($request->website),
            "profile_email"          => htmlspecialchars($request->email),
        ]);

        return redirect()->route('dashboard.profile')->with("profile-updated", "Profile updated successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
