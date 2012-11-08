<?
	$this->Html->css('contact.less?', 'stylesheet/less', array('inline' => false));
?>
<div class="grid_8 prefix_2 suffix_2 contact_wrapper">
	<?
		echo $this->Form->create('ContactForm');
		echo $this->Form->input('name', array('type' => 'text', 'label' => 'Name'));
		echo $this->Form->input('email', array('type' => 'text', 'label' => 'E-mail Address'));
		echo $this->Form->input('body', array('type' => 'textarea', 'label' => 'Message'));
	?>
	<div class="submit_wrapper ralign">
		<input type="submit" value="Submit" class="google-button" />
	</div>
</div>