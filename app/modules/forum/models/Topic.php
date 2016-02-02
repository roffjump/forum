<?php


class Topic extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'topics';
	protected $primaryKey = "tid";
	protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
    	"title",
    	"author",
    	"message",
    ];

	public function answers(){
		return $this->hasMany('TopicAnswer', 'tid', 'tid');
	}

	public function last_answer(){
		if($this->answers->count()==0) return null;

		return $this->answers()->orderBy('updated_at', 'desc')->first()->updated_at;
	}

	public function count_answers(){
		// sd($this->answers);
		return $this->answers()->count();
	}
}
