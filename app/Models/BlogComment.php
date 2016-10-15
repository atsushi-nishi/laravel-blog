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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_id',
        'comment_name',
        'comment_body',
        'deleted_at',
    ];

    /*
     * API Presentation
     */

    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'blog_id' => $this->blog_id,
            'comment_name' => $this->comment_name,
            'comment_body' => $this->comment_body,
        ];
    }
}
