<?
	$this->Html->css(array('home.less?'), 'stylesheet/less', array('inline' => false));
	$this->Html->script(array('home.js'), array('inline' => false));
?>
<div class="line_wrapper">
	<div class="arrow grid_2 calign">
		<div class="clickable prev_btn"><img src="/img/arrow-left.png" /></div>
	</div>
	<div class="grid_8 entries">
		<? echo $this->element('entry'); ?>
	</div>
	<div class="arrow grid_2 calign">
		<div class="clickable next_btn"><img src="/img/arrow-right.png" /></div>
	</div>
</div>
<? $this->start('left_top_menu'); ?>
<a href='#' id="alternate_view_btn">Alternate View</a>
<? $this->end(); ?>