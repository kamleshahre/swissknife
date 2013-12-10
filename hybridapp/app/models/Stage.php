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
    protected $primaryKey = 'stage_id';

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
        'updated_at',
        'deleted_at',
    ];

    public function location()
    {
        return $this->belongsTo('Location');
    }

    public function lineups()
    {
        return $this->belongsTo('Lineup');
    }

    public function photos()
    {
        return $this->hasMany('Photo');
    }
}
