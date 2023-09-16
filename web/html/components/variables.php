<?php  
	$dataFile = __DIR__ . '/../data.json'; 
	$data = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
	echo 'hello';
	$questions = [
		[
			'title' => 'In 3 words, who are you?',
			'label' => 'I am a',
			'separator' => ', and a ',
		],
		[
			'title' => 'Where do you go when you walk?',
			'label' => 'I walk to',
			'separator' => '. I walk to ',
		],
		[
			'title' => 'How do you feel climate change? Do you taste it, hear it, see it?',
			'label' => 'I feel climate change when',
			'separator' => '. I feel it when ',
		],
		[
			'title' => 'How would you make the climate healthy for us, our children, and our seniors?',
			'label' => 'To make a healthy climate, I would',
			'separator' => '. I would ',
		]
	]
?>
