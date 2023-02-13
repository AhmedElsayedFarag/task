<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = config('globals.locales');

        $settings = [

//            [
//                'display_name' => 'About Us',
//                'key' => 'about_us',
//                'type' => 'textarea',
//                'values' => [
//                    'ar'=>'<div style="max-width: 40rem; margin: 0 auto;">
//<h2 style="margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: right; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">ما فائدته ؟</h2>
//<p dir="rtl" style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.</p>
//</div>' ,
//                    'en'=>'<div style="max-width: 40rem; margin: 0 auto;">
//<h2 style="margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: left; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">What is Lorem Ipsum?</h2>
//<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
//</div>'
//                ],
//            ],
//            [
//                'display_name' => 'Privacy Policy',
//                'key' => 'privacy_policy',
//                'type' => 'textarea',
//                'values' => [
//                    'ar'=>'<div style="max-width: 40rem; margin: 0 auto;">
//<h2 style="margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: right; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">ما فائدته ؟</h2>
//<p dir="rtl" style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.</p>
//</div>' ,
//                    'en'=>'<div style="max-width: 40rem; margin: 0 auto;">
//<h2 style="margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: left; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">What is Lorem Ipsum?</h2>
//<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
//</div>'
//                ],
//            ],
//            [
//                'display_name' => 'Terms Of Use',
//                'key' => 'terms_of_use',
//                'type' => 'textarea',
//                'values' => [
//                    'ar'=>'<div style="max-width: 40rem; margin: 0 auto;">
//<h2 style="margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: right; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">ما فائدته ؟</h2>
//<p dir="rtl" style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.</p>
//</div>' ,
//                    'en'=>'<div style="max-width: 40rem; margin: 0 auto;">
//<h2 style="margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: left; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">What is Lorem Ipsum?</h2>
//<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
//</div>'
//                ],
//            ],
//
//            [
//                'display_name' => 'FAQ',
//                'key' => 'faq',
//                'type' => 'textarea',
//                'values' => [
//                    'ar'=>'<div style="max-width: 40rem; margin: 0 auto;">
//<h2 style="margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: right; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">ما فائدته ؟</h2>
//<p dir="rtl" style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.</p>
//</div>' ,
//                    'en'=>'<div style="max-width: 40rem; margin: 0 auto;">
//<h2 style="margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: left; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">What is Lorem Ipsum?</h2>
//<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
//</div>'
//                ],
//            ],


            [
                'display_name' => 'Free items',
                'key' => 'free_items',
                'type' => 'number',
                'values' => [
                    'ar' => 100,
                    'en' => 100
                ],
            ],


        ];

        foreach ($settings as $se) {
            $setting = new Setting();
            $setting->display_name = $se['display_name'];
            $setting->key = $se['key'];
            $setting->type = $se['type'];
            $setting->save();
            foreach ($locales as $locale) {
                $setting->translateOrNew($locale)->value = $se['values'][$locale];
            }
            $setting->save();
        }//endforeach
    }
}
