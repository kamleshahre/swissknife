<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Photo extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photos';
    protected $primaryKey = 'photo_id';
    protected $softDelete = true;

    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'url',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function stage()
    {
        return $this->belongsTo('Stage');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag', 'photos_has_tags');
    }
}
