<?php

// welcome
Breadcrumbs::for('/', function ($trail) {
   $trail->push(__('app.home'), route('/'));
});

// welcome > course > [course]
Breadcrumbs::for('course', function ($trail, $course) {
	$trail->parent('/');
   $trail->push(__('app.course'), route('course', $course->id));
});

// welcome > course > module [course]
Breadcrumbs::for('module', function ($trail, $course) {
	$trail->parent('course', $course);
	$trail->push($course->title, route('module', $course->id));
});

// welcome > course > module > training > [course]
Breadcrumbs::for('training', function ($trail, $training) {
	$trail->parent('module', $training->lesson->module->course);
	$trail->push($training->title, route('training', [$training->lesson->module->course->id, $training->id]));
});

// welcome > profile
Breadcrumbs::for('home', function ($trail) {
	$trail->parent('/');
   $trail->push(__('app.profile'));
});

// welcome > my-courses
Breadcrumbs::for('my_course', function ($trail) {
	$trail->parent('/');
   $trail->push(__('app.my.courses'));
});

	
