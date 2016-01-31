<?php


class Topic extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'topics';


	public function answers(){
		return $this->hasMany('TopicAnswer', 'tid', 'tid');
	}

	public function last_answer(){
		if($this->answers->count()==0) return null;

		return $this->answers()->orderBy('updated_at', 'desc')->first()->updated_at;
	}

	public function count_answers(){
		return $this->answers->count();
	}
}
