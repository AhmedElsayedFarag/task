<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Ad
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $title
 * @property string|null $description
 * @property float $price
 * @property int $user_id
 * @property int $category_id
 * @property float|null $lat
 * @property float|null $lng
 * @property int $status
 * @property int $sold
 * @property int|null $buyer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdOption[] $ad_options
 * @property-read int|null $ad_options_count
 * @property-read \App\Models\User|null $buyer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdImage[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newQuery()
 * @method static \Illuminate\Database\Query\Builder|Ad onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Ad withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Ad withoutTrashed()
 */
	class Ad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdFavourite
 *
 * @property int $id
 * @property int $ad_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereUserId($value)
 */
	class AdFavourite extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdImage
 *
 * @property int $id
 * @property int $ad_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_cover
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereIsCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereUpdatedAt($value)
 */
	class AdImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdOption
 *
 * @property int $id
 * @property int $option_id
 * @property int $ad_id
 * @property string $option_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereOptionValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereUpdatedAt($value)
 */
	class AdOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdReport
 *
 * @property int $id
 * @property int $ad_id
 * @property int $report_reason_id
 * @property int $user_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereReportReasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereUserId($value)
 */
	class AdReport extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdView
 *
 * @property int $id
 * @property string|null $ip
 * @property int $user_id
 * @property int $ad_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdView query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereUserId($value)
 */
	class AdView extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string|null $image
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CategoryOption[] $category_options
 * @property-read int|null $category_options_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\Models\CategoryTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CategoryTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Category translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTranslation()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategoryOption
 *
 * @property int $id
 * @property int $category_id
 * @property int $option_id
 * @property int $required
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereUpdatedAt($value)
 */
	class CategoryOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategoryTranslation
 *
 * @property int $id
 * @property int $category_id
 * @property string $locale
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereUpdatedAt($value)
 */
	class CategoryTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Chat
 *
 * @property int $id
 * @property int $owner_id
 * @property int $sender_id
 * @property int $ad_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $last_message_at
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereLastMessageAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChatMessage
 *
 * @property int $id
 * @property int $chat_id
 * @property int $sender_id
 * @property string $message
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $read_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUpdatedAt($value)
 */
	class ChatMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FaqTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FaqTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faq listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq withTranslation()
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FaqTranslation
 *
 * @property int $id
 * @property int $faq_id
 * @property string $locale
 * @property string $name
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereFaqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereUpdatedAt($value)
 */
	class FaqTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Option
 *
 * @property int $id
 * @property string $input_type
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OptionTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionTranslation[] $translations
 * @property-read int|null $translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionValue[] $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|Option listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|Option translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Option translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option withTranslation()
 */
	class Option extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OptionTranslation
 *
 * @property int $id
 * @property int $option_id
 * @property string $locale
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereUpdatedAt($value)
 */
	class OptionTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OptionValue
 *
 * @property int $id
 * @property int $option_id
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OptionValueTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionValueTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue translated()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue withTranslation()
 */
	class OptionValue extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OptionValueTranslation
 *
 * @property int $id
 * @property int $option_value_id
 * @property string $locale
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereOptionValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereUpdatedAt($value)
 */
	class OptionValueTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PhoneCode
 *
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $data
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereUserId($value)
 */
	class PhoneCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReportReason
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ReportReasonTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReportReasonTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason translated()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason withTranslation()
 */
	class ReportReason extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReportReasonTranslation
 *
 * @property int $id
 * @property int $report_reason_id
 * @property string $locale
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereReportReasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereUpdatedAt($value)
 */
	class ReportReasonTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $display_name
 * @property string $key
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SettingTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SettingTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Setting listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withTranslation()
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SettingTranslation
 *
 * @property int $id
 * @property int $setting_id
 * @property string $locale
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereValue($value)
 */
	class SettingTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SocialUser
 *
 * @property int $id
 * @property int $user_id
 * @property string $social_id
 * @property string $social_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereSocialType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereUserId($value)
 */
	class SocialUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $phone
 * @property string|null $device_token
 * @property string $image
 * @property string|null $phone_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $birth_date
 * @property int $blocked
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ad[] $ads
 * @property-read int|null $ads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ad[] $favAds
 * @property-read int|null $fav_ads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $followers
 * @property-read int|null $followers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $followings
 * @property-read int|null $followings_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserRating[] $rating
 * @property-read int|null $rating_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserFollow
 *
 * @property int $id
 * @property int $follower_id
 * @property int $followed_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereFollowedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereFollowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereUpdatedAt($value)
 */
	class UserFollow extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserRating
 *
 * @property int $id
 * @property int $user_id
 * @property int $stars
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $reviewer_id
 * @property int $ad_id
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereReviewerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereStars($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereUserId($value)
 */
	class UserRating extends \Eloquent {}
}

