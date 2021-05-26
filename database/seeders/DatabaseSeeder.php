<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application"s database.
     *
     * @return void
     */
    public function run()
    {
        $this->createUserAndProfile();
    }

    /**
     * Method create user & profile
     */
    private function createUserAndProfile() {

        // Create user data
        $user = User::create([
            "username" => "saifulakbar",
            "password" => Hash::make("adikaalfar"),
        ]);

        // create profile data
        Profile::create([
            "user_id"                => $user->id,
            "profile_avatar"         => "images/avatar/1.jpg",
            "profile_first_name"     => "Saiful",
            "profile_last_name"      => "Akbar",
            "profile_date_of_birth"  => 13,
            "profile_month_of_birth" => "April",
            "profile_year_of_birth"  => 1996,
            "profile_phone"          => "(+62) 813-8904-8009",
            "profile_street"         => "Jl. Arial Putra Kedaung, Pamulang, No 16",
            "profile_city"           => "Kota Tangerang Selatan",
            "profile_country"        => "Indonesia",
            "profile_website"        => "saifulakbar.com",
            "profile_email"          => "saifulakbar.job@gmail.com",
        ]);

        // Create sosmed data
        DB::table("sosmeds")->insert([
            [
                "user_id"     => $user->id,
                "sosmed_name" => "WhatsApp",
                "sosmed_url"  => "https://api.whatsapp.com/send/?phone=6289673662880",
                "sosmed_icon" => "bx bxl-whatsapp",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
            [
                "user_id"     => $user->id,
                "sosmed_name" => "Twitter",
                "sosmed_url"  => "https://twitter.com/Saiful_akbar13/",
                "sosmed_icon" => "bx bxl-twitter",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
            [
                "user_id"     => $user->id,
                "sosmed_name" => "Facebook",
                "sosmed_url"  => "https://web.facebook.com/ackbar.syaiful/",
                "sosmed_icon" => "bx bxl-facebook",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
            [
                "user_id"     => $user->id,
                "sosmed_name" => "Instagram",
                "sosmed_url"  => "https://www.instagram.com/saifulakbar13/",
                "sosmed_icon" => "bx bxl-instagram",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
            [
                "user_id"     => $user->id,
                "sosmed_name" => "Github",
                "sosmed_url"  => "https://github.com/saiful-akbar/",
                "sosmed_icon" => "bx bxl-github",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
        ]);

        // Create skills data
        DB::table("skills")->insert([
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('html'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('css'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('javascript'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('jquery'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('react js'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('php'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('laravel'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('mysql'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
            [
                "user_id"       => $user->id,
                "skill_name"    => strtoupper('git & github'),
                "skill_publish" => true,
                "created_at"    => now(),
                "updated_at"    => now()
            ],
        ]);
    }
}
