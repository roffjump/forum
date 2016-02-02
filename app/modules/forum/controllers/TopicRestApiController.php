<?php

class TopicRestApiController extends RestApiController {
	private $place='api';

	private $required=[
		'title'=>5,
		'author'=>3,
		'message'=>5
	];


	public function index(){
		return Redirect::to('/forum_rest_api.md');
	}

	public function show($tid='all')
	{
	    if($tid == 'all'){
	    	if(Input::has('answers')){
	    		$topics = Topic::with('answers')->get()->toArray();
	    	}else{
	    		$topics = Topic::all();
	    	}

	    	return Response::make(['success'=>true, 'data' =>$topics ]);
	    }else{
			try {
	    		$topic = Topic::findOrFail($tid);
	    		$topic->answers = $topic->answers->toArray();
				return Response::make(['success'=>true, 'data' =>$topic ]);
			} catch (Exception $e) {
				return Response::make(['error'=>true, 'message' =>'Sorry but that topic cannot be found!', 'data' =>null ],404);
			}
	    }
	}
	public function create(){
		foreach ($this->required as $required=>$strlen ) {
			if( !Input::has($required) || strlen( Input::get($required) ) < $strlen ){
				return Response::make(['error'=>'You must introduce a ' . $required . ' with '. $strlen . ' of length...' ], 404);
			}
		}
	    $new  = new Topic();
	    $new->fill(Input::only(['title','author','message'])); 
	    $new->place = $this->place;
	    $new->save();

		return Response::make([
				'success'=>'You just created a new topic!',
				'topic'=>$new->toArray(),
		], 404);
	}
}
