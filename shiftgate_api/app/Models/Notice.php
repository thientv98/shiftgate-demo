<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $content
 * @property string $link_url
 * @property string $published_date
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Notice extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notices';

    /**
     * @var array
     */
    protected $fillable = ['content', 'link_url', 'published_date', 'created_at', 'updated_at', 'deleted_at'];

    public function getPublishedDateYmdAttribute($value)
    {
        return date('Y/m/d', strtotime($value));
    }
}
