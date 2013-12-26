<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Artist extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'artists';
    protected $primaryKey = 'artist_id';
    protected $softDelete = true;

    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get Likes (Users) from Artists
     *
     */
    public function likes()
    {
        return $this->belongsToMany('User', 'likes');
    }

    /**
     * Get Comments
     */
    public function lineups()
    {
        return $this->hasMany('Lineup');
    }
}
