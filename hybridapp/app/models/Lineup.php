<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Lineup extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lineups';
    protected $primaryKey = 'lineup_id';
    protected $softDelete = true;

    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'start',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function artist()
    {
        return $this->belongsTo('Artist');
    }

    public function stage()
    {
        return $this->belongsTo('Stage');
    }

    public function notifications()
    {
        return $this->belongsToMany('Notification');
    }
}
