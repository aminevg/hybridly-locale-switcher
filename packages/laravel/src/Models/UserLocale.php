<?php

namespace Aminevg\HybridlyLocaleSwitcher\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $user_id
 * @property classname $user_type
 * @property string $locale
 */
class UserLocale extends Model
{
    protected $fillable = ['user_id', 'user_type', 'locale'];

    public function getTable(): string
    {
        return config('hybridly-locale-switcher.database.table_name', parent::getTable());
    }

    /** @return MorphTo<Model,UserLocale> */
    public function user(): MorphTo
    {
        return $this->morphTo();
    }
}
