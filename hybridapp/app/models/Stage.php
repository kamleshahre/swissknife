<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Stage extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stages';


    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function location()
    {
        return $this->hasOne('Location');
    }

    public function lineups()
    {
        return $this->hasMany('Lineup');
    }

    public function photos()
    {
        return $this->hasMany('Photo');
    }
}
