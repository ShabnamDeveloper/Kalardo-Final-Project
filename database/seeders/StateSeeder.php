<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $states = ['آذربایجان شرقی',
        'آذربایجان غربی',
        'اردبیل',
        'اصفهان',
        'البرز',
        'ایلام',
        ' بوشهر',
        ' تهران',
        ' چهارمحال و بختیاری',
        'خراسان جنوبی',
        'خراسان رضوی',
        'خراسان شمالی',
        'خوزستان',
        'زنجان',
        'سمنان',
        'سیستان و بلوچستان',
        'فارس',
        'قزوین',
        'قم',
        'کردستان',
        'کرمان',
        ' کرمانشاه',
        'کهگیلویه و بویراحمد',
        ' گلستان',
        'گیلان',
        'لرستان',
        ' مازندران',
        'مرکزی',
        'هرمزگان',
        'همدان',
        'یزد'];
        foreach ($states as $state) {
            State::create([
                'name' => $state,
            ]);
        }
    }
}


