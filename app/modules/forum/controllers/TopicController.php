<?php

class TopicController extends BaseController {

	protected $layout = 'dashboard::layout.master';
	private $required=[
		'title'=>5,
		'author'=>3,
		'message'=>5
	];

	public function all(){
		$topics = Topic::all();
		if(empty($topics)) return array();

		foreach ($topics as $topic) {
			$topic->last_answer = (string)$topic->last_answer();
			$topic->count_answers = $topic->count_answers();
		}
		return $topics->toArray();
	}
	public static function count(){
		return Topic::all()->count();
	}

	public function create(){
		if (Request::isMethod('get') ){
			return View::make('forum::topic_create');
		}
		
		if (Request::isMethod('post')){
		    $new  = new Topic();
		    $new->fill(Input::only(['title','author','message'])); 
		    $new->place = Input::has('api')?'api':'web';
		    $new->save();

		    return Redirect::to('/forum');
		}
	}

	public function show($id=null){
		$data=[];
		$data['topic'] = Topic::find($id);
		$data['answers'] = $data['topic']->answers()->orderBy('created_at', 'desc')->get();
		return View::make('forum::topic_show', $data);
	}

	public function answer($tid=null){
		if(empty($tid)) return Response::json(['error'=>true,'message'=>'No topic id'], 404);

		try {
			$t = Topic::findOrFail($tid);
		} catch (Exception $e) {
			return Response::json(['error'=>true,'message'=>'Topic not found'], 404);
		}
		
		$data = Input::only(['author','message']);

		$new = new TopicAnswer;
	    $new->tid = $tid;
		$new->fill($data);
	    $new->place = Input::has('api')?'api':'web';
	    $new->save();
	    $new->created_at->format('d-m-Y');

	    return Response::json($new->toArray());
	}
}
