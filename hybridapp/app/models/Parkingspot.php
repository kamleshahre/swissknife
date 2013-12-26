<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Parkingspot extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parkingspots';
    protected $primaryKey = 'parkingspot_id';
    protected $softDelete = true;

    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'places',
        'available',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function location()
    {
        return $this->belongsTo('Location');
    }
}
