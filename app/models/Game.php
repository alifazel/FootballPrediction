<?php

class Game extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'games';

	public function users()
    {
        return $this->hasMany('User');
    }

    public function rounds()
    {
        return $this->hasMany('Round');
    }

    public function userPicks()
    {
        return $this->hasMany('UserPick');
    }

    public function getNumberOfPlayers() {
    	return DB::table('users')->where('game_id', '=', $this->id)->count();
    }

    public function getCurrentRound() {
    	return DB::table('rounds')
    		->where('completed', '=', 0)
    		->where('game_id', '=', $this->id)
    		->orderBy('id', 'asc')->first();
    }

    public function canUserJoin($userId) {
        $result = DB::table('user_picks')
            ->where('game_id', '=', $this->id)
            ->where('user_id', '=', $userId)
            ->count();

        return ($result > 0) ? false : true;
    }
}