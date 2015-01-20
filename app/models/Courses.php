<?php

class Courses extends Eloquent{	
	protected $fillable = ['name, course_description'];
	public function users()
    {
        return $this->belongsToMany('User')->withPivot('mark');
    }
}