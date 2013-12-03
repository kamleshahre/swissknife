<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Notification extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notifications';


    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function lineup()
    {
        return $this->hasOne('Lineup');
    }

    public function user()
    {
        return $this->hasOne('User');
    }
}
