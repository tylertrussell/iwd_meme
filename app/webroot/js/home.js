function loadEntry(mode, id) {
    
    $('.entry_wrapper').fadeOut(300,
        function() {
            $.ajax({
                url: '/entries/load/' + mode + '/' + id,
                success: function(data) {
                    data = $.parseJSON(data);
                    currentEntryId = data.id;
                    $('#EntryDisplay').val(data.text);
                    $('.entry_wrapper').fadeIn(300);
                }
            });
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
                    $('.entries').load('/entries/alternate_view');
                    $('.entries').css('text-align', 'center');
                    $('.entries').html('<h1>Loading...</h1>');
                    htmlHolder = $('.entries').html();
                } else {
                    $('.prev_btn', '.next_btn').show();
                    loadEntry('next', currentEntryId)
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
        
        /*
        
        
        
                    $.ajax({
                        url: '/entries/json_index',
                        dataType: 'json',
                        success: function(data) {
                            for(var i=0; i<data.length; i++) {
                                
                                console.log(data[i].id + ' , ' + data[i].text);
                                
                            }
                            //var x = $.parseJSON(data);
                            console.log(data);return;
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
        
        
        */