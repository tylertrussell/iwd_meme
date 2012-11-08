function loadEntry(mode, id) {
	$.ajax({
		url: '/entries/load/' + mode + '/' + id,
		success: function(data) {
			data = $.parseJSON(data);
			currentEntryId = data.id
			$('.entry_wrapper').fadeOut(300,
				function() {
					$('#EntryDisplay').val(data.text);
					$('.entry_wrapper').fadeIn(300);
				}
			);
		}
	});
}

var currentEntryId = 0;
var playing = true;
var inAlternateView = false;
var htmlHolder = '';

$(document).ready(
	function() {
	
		$('#alternate_view_btn').click(
			function() {
				if(!inAlternateView) {
					playing = false;
					$('.prev_btn, .next_btn').hide();
					htmlHolder = $('.entries').html();
					$('.entries').html('');
					$.ajax({
						url: '/entries/json_index',
						success: function(data) {
							entries = $.parseJSON(data);
							for(var i=0; i<entries.length; i++) {
								var entryHtml = '';
								$.ajax({
									url: '/entries/entry/' + entries[i],
									success: function(data) {
										$('.entries').append(data);
									}
								});
							}
						}
					});	
				} else {
					$('.prev_btn', '.next_btn').show();
				}
				inAlternateView = !inAlternateView;
			}
		);
	
		$('.prev_btn').click( function() {
			loadEntry('prev', currentEntryId--);
			playing = false;
		});
		
		$('.next_btn').click( function() {
			loadEntry('next', currentEntryId++);
			playing = false;
		});
	
		loadEntry('next', 0);
		var slideshowInterval = setInterval(
			function() {
				if(playing)
					loadEntry('next', currentEntryId++);
			},
			5000
		);
	}
);