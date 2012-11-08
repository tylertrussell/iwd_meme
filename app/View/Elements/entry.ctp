<?
	$text = isset($entry['Entry']['text']) ? $entry['Entry']['text'] : '';
?>

<div class="grid_8 calign entry_wrapper">
	<div class="text_wrapper">
		<input type="text" id="EntryDisplay" value="<? echo $text; ?>" disabled />
	</div>
	<div class="opts_bar ralign">
		<a href="#"><i class="icon-thumbs-up icon-large"></i></a>
		<a href="#"><i class="icon-thumbs-down icon-large"></i></a>
	</div>
</div>