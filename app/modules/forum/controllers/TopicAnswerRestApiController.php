<?php

class TopicAnswerRestApiController extends RestApiController {
	private $place='api';

	private $required=[
		'tid'=>true,
		'author'=>3,
		'message'=>5
	];


	public function index(){
		return Redirect::to('/forum_rest_api.md');
	}

	public function show($taid='all')
	{
		if($taid == 'all'){
    		$topics = TopicAnswer::all()->toArray();
	    	return Response::make(['success'=>true, 'data' =>$topics ]);
	    }else{
			try {
	    		$answer = TopicAnswer::findOrFail($taid);
	    		$answer->topic->toArray();
				return Response::make(['success'=>true, 'data' =>$answer ]);
			} catch (Exception $e) {
				return Response::make(['error'=>true, 'message' =>'Sorry but that topic cannot be found!', 'data' =>null ],404);
			}
	    }
	}

	public function create(){
		foreach ($this->required as $required=>$strlen ) {
			if(!Input::has('tid')) return Response::make(['error'=>'You must introduce a topic id to answer' ], 404);

			if( !Input::has($required) || strlen( Input::get($required) ) < $strlen ){
				return Response::make(['error'=>'You must introduce a ' . $required . ' with '. $strlen . ' of length...' ], 404);
			}
		}

		$tid = Input::get('tid');
		try {
    		$topic = Topic::findOrFail($tid);
		} catch (Exception $e) {
			return Response::make(['error'=>true, 'message' =>'Sorry but that topic cannot be found!', 'data' =>null ],404);
		}

	    $new  = new TopicAnswer();
	    $new->tid=$tid;
	    $new->fill(Input::only(['author','message'])); 
	    $new->place = $this->place;
	    $new->save();

		return Response::make([
				'success'=>'You just created a new answer!',
				'answer'=>$new->toArray(),
				'topic'=>$new->topic->toArray(),
		], 404);
	}
}
