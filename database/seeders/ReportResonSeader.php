<?php

namespace Database\Seeders;

use App\Models\ReportReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportResonSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'ar'=>'سبب تجريبى',
            'en'=>'test reason',
        ];
        $category = ReportReason::create();
        $locales = config('globals.locales');
        foreach ($locales as $locale) {
            $category->translateOrNew($locale)->name = $name[$locale];
        }
        $category->save();
    }
}
