<?php

namespace SON\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SON\Notifications\UserCreated;

class User extends Authenticatable implements TableInterface
{
    use Notifiable;
    // Criando constantes referentes aos tipos de usuários - adicionar abaixo da trait Notifiable
    const ROLE_ADMIN = 1;
    const ROLE_TEACHER = 2;
    const ROLE_STUDENT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','enrolment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return mixed
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class)->withDefault();

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID','Matricula','Name','Email'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        // TODO: Implement getValueForHeader() method.
        switch ($header){
            CASE 'ID':
                return $this->id;
            CASE 'Matricula':
                return $this->enrolment;
            CASE 'Name':
                return $this->name;
            CASE 'Email':
                return $this->email;

        }
    }

    // Criando classe createFully - Criar acima do método getTableHeaders

    /**
     * @param $data
     * @return mixed
     */
    public static function createFully($data)
    {
        $password = str_random(6);
        $data['password'] = bcrypt($password);
        $user = parent::create($data+['enrolment' => str_random(6)]);
        self::assignEnrolment($user, self::ROLE_ADMIN);
        self::assignRole($user, $data['type']);
        $user->save();
        if(isset($data['send_mail'])){
            /* Cria o token para resete de senha */
            $token = \Password::broker()->createToken($user);
            $user->notify(new UserCreated($token));
        }
        return compact('user','password');
    }

    // Criando classe assignEnrolment  - Criar acima do método getTableHeaders
    public static function assignEnrolment(User $user, $type)
    {
        $types = [
            self::ROLE_ADMIN => 100000,
            self::ROLE_TEACHER => 400000,
            self::ROLE_STUDENT => 700000,
        ];
        $user->enrolment = $types[$type] + $user->id;
        return $user->enrolment;
    }

    public static function assignRole(User $user, $type)
    {
        $types = [
            self::ROLE_ADMIN => Admin::class,
            self::ROLE_TEACHER => Teacher::class,
            self::ROLE_STUDENT => Student::class,
        ];

        $model = $types[$type];
        $model = $model::create([]);
        $user->userable()->associate($model);
    }
}
