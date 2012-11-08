<? $this->Html->css(array('create.less?'), 'stylesheet/less', array('inline' => false)); ?>
<? $this->Html->script(array('entries.js'), array('inline' => false)); ?>
<div class="grid_8 prefix_2 suffix_2 calign" id="EntryCreateWrapper">
	<?
		echo $this->Form->create('Entry',
			array(
				'inputDefaults' => array(
					'label' => false,
					'div' => false
				)
			)
		);
		echo $this->Form->input('text', array('type' => 'text', 'value' => 'write something funny'));
		echo $this->Form->submit('Submit', array('class' => 'google-button', 'id' => 'EntryCreateSubmit', 'div' => false));
		echo $this->Form->submit('I feel like Donating', array('class' => 'google-button', 'id' => 'EntryCreateSubmit', 'div' => false));
	?>
</div>