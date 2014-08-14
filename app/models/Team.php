<?php

class Team extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teams';


    public function fixtures()
    {
        return $this->belongsTo('Fixture');
    }

}
