<?php


class TopicAnswer extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'topics_answers';
	protected $primaryKey = "taid";
	protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
    	"author",
    	"message",
    ];

	public function topic(){
		return $this->hasOne('Topic', 'tid', 'tid');
	}
}
