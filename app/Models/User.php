<?php

namespace Gallery\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email', 
        'password',
        'first_name',
        'last_name',
        'location',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function getUsername(){
        if($this->username){
            return $this->username;
        }

        return Null;
    }

        public function getName(){
        if($this->first_name && $this->first_name){
            return "{$this->first_name} {$this->last_name}";
        }

        if($this->first_name){
            return $this->first_name;
        }

        return Null;
    }

     public function getNameOrUsername(){
        return $this->getName() ?:$this->getUsername();
    }

    public function getAvatarUrl(){
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }} ? d=mm&s=40";
    }

    public function statuses(){
        return $this->hasMany('Gallery\Models\Status', 'user_id' );
    }
    
    public function friendsOfMine(){
        return $this->belongsToMany('Gallery\Models\User', 'watchers', 'user_id', 'watcher_id');
    }

    public function friendOf(){
        return $this->belongsToMany('Gallery\Models\User', 'watchers', 'watcher_id', 'user_id');
    }

    public function friend(){
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()->
        merge($this->friendOf()->wherePivot('accepted', true)->get());
    }

    public function friendRequest(){
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestsPending(){
        return $this->friendOf()->wherePivot('accepted',false)->get();
    }

    public function hasFriendRequestPending(User $user){
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestRecived(User $user){
        return (bool) $this->friendRequest()->where('id', $user->id)->count();
    }

    public function addFriend(User $user){
        $this->friendOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user){
        $this->friendRequest()->where('id', $user->id)->first()->pivot->update([
            'accepted' =>true,
        ]);
    }

    public function isFriendsWith(User $user){
        return (bool) $this->friend()->where('id', '$user->id')->count();
    }
}
