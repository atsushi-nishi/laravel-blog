<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlogComment
 *
 */
class BlogComment extends Base
{
    use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_comments';

    /*
     * API Presentation
     */

    public function toAPIArray()
    {
      /*
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
      */
    }
}
