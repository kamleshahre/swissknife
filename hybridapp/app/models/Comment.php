<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Comment extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    protected $softDelete = true;

    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function photo()
    {
        return $this->belongsTo('Photo');
    }

    public function parent()
    {
        return $this->belongsTo('Comment','comment_parrent');
    }

    public function children()
    {
        return $this->hasMany('Comment');
    }
}
