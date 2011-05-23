$(function(){
	// Make checkboxes buttons with an x
	$('input:checkbox.delete').button({
			icons: {primary: 'ui-icon-circle-close'}
			,text: false
	})
	.change(function(e){
		// If checked post message to server and remove element
		if(this.checked){
			var id = $(e.target).attr('name').match(/(\d+)/)[1];
			$.post(document.location.href, {id: id}, function(response){
				$(e.target).closest('li').fadeOut('fast', function(){
					$(this).remove();
				});
			});
		}
	});

	$('input[type="submit"]').button();

	$('form').submit(function(e){
		e.preventDefault();
		var error = false;
		$(this).find('input[type="text"]').each(function(i,e){
			if($(e).val() === ''){
				error = true;
				// Check to see if there is an error already
				var el = $(e).next('.error');
				if (el.length === 0){
					el = $('<span class="error">This field can\'t be empty</span>').insertAfter(e);
				}
			}
			else{
				// Remove old errors
				$(e).next('.error').remove();
			}
		});

		if (error === false){
			$.post(document.location.href,$(this).serializeArray(),function(e){
				$('<span />').text('Form Saved').insertAfter($('form input[type="submit"]'))
				.fadeOut(2000, function(){
					$(this).remove();
				});
			});
		}
	});
});