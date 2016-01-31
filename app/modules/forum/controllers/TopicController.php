<?php

class TopicController extends BaseController {


	public function all(){
		$topics = Topic::all();
		if(empty($topics)) return array();

		foreach ($topics as $topic) {
			$topic->last_answer = (string)$topic->last_answer();
			$topic->count_answers = $topic->count_answers();
		}
		return $topics->toArray();
	}
}
