<?php  
	$dataFile = __DIR__ . '/../data.json'; 
	$entries = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
	$questions = array(
		'q1' => array(
			'title' => 'Using 3 adjectives, who are you?',
			'label' => 'I am...',
		),
		'q2' => array(
			'title' => 'Where do you go when you walk?',
			'label' => 'I walk...',
		),
		'q3' => array(
			'title' => 'How do you feel climate change? Do you taste it, hear it, see it?',
			'label' => 'I feel it...'
		),
		'q4' => array(
			'title' => 'How would you make the climate healthy for us, our children, and our seniors?',
			'label' => 'I would...'
		)
	);
?>
