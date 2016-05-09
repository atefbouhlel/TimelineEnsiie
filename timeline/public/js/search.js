$(document).ready( function () {

	$('input#keywords').keyup(function (event) {
		var keywords= $(this).val();

		//if ( ( event.keyCode==8 || event.keyCode==46) && keywords.length == 0 )
			//$("#searchResults").hide();

		
 
		if(keywords.length > 0){			
					$.ajax({
						type:'post',
						url:searchPath,
						data:"keywords="+keywords,
						statusCode: {
							404: function() {
								$("#searchResults").html('Could not contact server.');
							},
							500: function() {
								 $("#searchResults").html('A server-side error has occurred.');
							}
						},
						error: function() {
							$("#searchResults").html('Veuillez réessayer');
						},
						success:function(txt){
							$("#searchResults").show();
							$("#searchResults").html(txt);
						}
							});
						}
					});
				
			});

