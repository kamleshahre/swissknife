<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Location extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';
    protected $primaryKey = 'location_id';

    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'lat',
        'long',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function parkingspot()
    {
        return $this->belongsTo('Parkingspot');
    }

    public function quiteplace()
    {
        return $this->belongsTo('Quiteplace');
    }

    public function stage()
    {
        return $this->belongsTo('Stage');
    }
}
