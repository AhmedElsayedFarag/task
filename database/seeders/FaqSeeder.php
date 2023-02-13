<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question_en'=>'q1',
                'answer_en'=>'answer1',
                'question_ar'=>'سؤال 1',
                'answer_ar'=>'اجابة 1',
            ],
            [
                'question_en'=>'q2',
                'answer_en'=>'answer2',
                'question_ar'=>'سؤال 2',
                'answer_ar'=>'اجابة 2',
            ],
            [
                'question_en'=>'q3',
                'answer_en'=>'answer3',
                'question_ar'=>'سؤال 3',
                'answer_ar'=>'اجابة 3',
            ],
        ];
        foreach ($questions as $question){
            $q = new Faq();
            $q->save();
            $locales = config('globals.locales');
            foreach ($locales as $locale) {
                $q->translateOrNew($locale)->name = $question["question_$locale"];
                $q->translateOrNew($locale)->answer = $question["answer_$locale"];
            }
            $q->save();
        }
    }
}
