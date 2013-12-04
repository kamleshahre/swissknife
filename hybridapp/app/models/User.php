<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * De attributen die niet in de Array- of JSON-versie van het model komen.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * Get Roles from Users
     *
     */
    public function roles()
    {
        return $this->belongsToMany('Role', 'users_has_roles');
    }

    /**
     * Get Likes (Artists) from Users
     *
     */
    public function likes()
    {
        return $this->belongsToMany('Artist', 'likes');
    }

    /**
     * Get Friends from Users
     *
     */
    public function friends()
    {
        return $this->belongsToMany('User', 'users_has_friends', 'user_id', 'user_friend_id');
    }

    /**
     * Get Comments
     */
    public function comments()
    {
        return $this->hasMany('Comment');
    }

    /**
     * Get Notifications
     */
    public function notifications()
    {
        return $this->hasMany('Notification');
    }

    /**
     * Get Ticket
     */
    public function ticket()
    {
        return $this->belongsTo('Ticket');
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public static function boot()
    {
        parent::boot();

        /**
         * Hook die aangesproken wordt als het model voor de eerste keer naar de database weggeschreven wordt.
         * Zie: http://laravel.com/docs/eloquent#model-events
         */
        self::creating(function ($user) {
            $user->user_password = Hash::make($user->user_password);
        });
    }

}
