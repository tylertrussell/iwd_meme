<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		tyjcg | things you just can't google
	</title>
	<?php
		$this->Html->meta('icon');
		echo $this->Html->css(array('reset', '960', '960_12_col', 'bootstrap', 'font-awesome'), null, array('inline' => true));
		echo $this->Html->css(array('generic.less?'), 'stylesheet/less', array('inline' => true));
		echo $this->Html->script(array('//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', 'bootstrap'), array('inline' => true));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script(array('less.js'), array('inline' => true));
	?>
</head>
<body>
	<div class="darkspace">
		<div class="container_12">
			<div class="grid_6">
				<div class="menu_wrapper">
					<? echo $this->fetch('left_top_menu'); ?>
				</div>
			</div>
			<div class="grid_6 ralign">
				<div class="menu_wrapper">
					<a href="/entries/create">Submit</a>
					<a href="/pages/contact">Contact</a>
				</div>
			</div><div class="clear"></div>
		</div>
	</div>
	<div class="lightspace">
		<div class="container_12">
			<div class="grid_12 calign google_logo_wrapper">
				<div class="grid_6 prefix_3 suffix_3 alpha omega calign">
					<div class="title">
						things you just
						<span class="red">
							can't
						</span>
					</div>
				</div><div class="clear"></div>
				<a href="/"><img src="/img/google_logo.png" /></a>
			</div><div class="clear"></div>
			<? echo $content_for_layout; ?>
		</div>
	</div>
</body>
</html>
