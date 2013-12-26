<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Role extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';
    protected $primaryKey = 'role_id';
    protected $softDelete = true;

    /**
     * De attributen die toegekend mogen worden aan het model via Mass Assignment (zie: http://laravel.com/docs/eloquent#mass-assignment ).
     *
     * @var array
     */
    protected $fillable = [
        'role_title',
        'role_description',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function users()
    {
        return $this->belongsToMany('User', 'users_has_roles');
    }
}
