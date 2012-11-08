<?

	class Entry extends AppModel {
		
		var $validate = array(
		
			'text' => array(
				'rule' => 'notempty',
				'message' => 'You have to enter SOMETHING!'
			)
		
		);
		
	}