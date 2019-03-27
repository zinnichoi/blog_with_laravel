<?php

namespace App\Models;

use App\Scopes\DeleteScope;

/**
 * @property mixed user_id
 */
class Blog extends BaseModel
{

    protected $table = 'blogs';
    protected $fillable =
        ['id', 'user_id', 'title', 'content', 'blog_thumbnail', 'age_limit', 'gender_limit', 'is_delete', 'is_active'];

    /**
     * Relational user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new DeleteScope);
    }
}
