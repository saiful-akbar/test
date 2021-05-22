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
        $this->createArticle();
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
            "profile_avatar"         => "img/avatar/avatar.jpg",
            "profile_first_name"     => "Saiful",
            "profile_last_name"      => "Akbar",
            "profile_date_of_birth"  => "13",
            "profile_month_of_birth" => "April",
            "profile_year_of_birth"  => "1996",
            "profile_phone"          => "(+62) 813-8904-8009",
            "profile_street"         => "Jl. Arial Putra Kedaung, No 16",
            "profile_city"           => "Kedaung, Pamulang, Kota Tangerang Selatan, Banten",
            "profile_country"        => "Indonesia",
            "profile_website"        => "https://saifulakbar.com",
            "profile_email"          => "saifulakbar.job@gmail.com",
        ]);

        // Create sosmed data
        DB::table("sosmeds")->insert([
            [
                "user_id"     => $user->id,
                "sosmed_name" => "WhatsApp",
                "sosmed_url"  => "https://api.whatsapp.com/send/?phone=6289673662880",
                "sosmed_icon" => "fa-whatsapp",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
            [
                "user_id"     => $user->id,
                "sosmed_name" => "Twitter",
                "sosmed_url"  => "https://twitter.com/Saiful_akbar13/",
                "sosmed_icon" => "fa-twitter",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
            [
                "user_id"     => $user->id,
                "sosmed_name" => "Facebook",
                "sosmed_url"  => "https://web.facebook.com/ackbar.syaiful/",
                "sosmed_icon" => "fa-facebook-f",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
            [
                "user_id"     => $user->id,
                "sosmed_name" => "Instagram",
                "sosmed_url"  => "https://www.instagram.com/saifulakbar13/",
                "sosmed_icon" => "fa-instagram",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
            [
                "user_id"     => $user->id,
                "sosmed_name" => "Github",
                "sosmed_url"  => "https://github.com/saiful-akbar/",
                "sosmed_icon" => "fa-github",
                "created_at"  => now(),
                "updated_at"  => now()
            ],
        ]);
    }

    /**
     * Method create article
     */
    public function createArticle()
    {
        DB::table("articles")->insert([
            [
                "article_background" => "/storage/images/articles/banner-profile.jpg",
                "article_url"        => "/profile",
                "article_title"      => "Profile",
                "article_subtitle"   => "Look at my profile",
                "article_publish"    => true,
                "created_at"         => now(),
                "updated_at"         => now(),
            ],
            [
                "article_background" => "/storage/images/articles/banner-about.jpg",
                "article_url"        => "/about",
                "article_title"      => "About",
                "article_subtitle"   => "See details about me",
                "article_publish"    => true,
                "created_at"         => now(),
                "updated_at"         => now(),
            ],
            [
                "article_background" => "/storage/images/articles/banner-project.jpg",
                "article_url"        => "/project",
                "article_title"      => "Project",
                "article_subtitle"   => "See all projects",
                "article_publish"    => true,
                "created_at"         => now(),
                "updated_at"         => now(),
            ],
            [
                "article_background" => "/storage/images/articles/banner-galery.jpg",
                "article_url"        => "/galery",
                "article_title"      => "Galery",
                "article_subtitle"   => "View all gallery content",
                "article_publish"    => true,
                "created_at"         => now(),
                "updated_at"         => now(),
            ],
        ]);
    }
}
