<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Tag extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';
    protected $primaryKey = 'tag_id';

    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function photos()
    {
        return $this->belongsToMany('Photo', 'photos_has_tags','photo_id','tag_id');
    }
}
