<?php


class TopicAnswer extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'topics_answers';
	protected $primaryKey = "taid";

    protected $fillable = [
    	"author",
    	"message",
    ];

	public function topic(){
		return $this->hasOne('Topic', 'tid', 'tid');
	}
}
