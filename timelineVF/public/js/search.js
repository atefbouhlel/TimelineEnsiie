$(document).ready( function () {
	var init=$('tbody').html();
	$('input#keywords').keyup(function (event) {
		var keywords= $(this).val();

		if ( ( event.keyCode==8 || event.keyCode==46) && keywords.length == 0 )
			$("tbody").html(init);		
 
		if(keywords.length > 0){			
					$.ajax({
						type:'post',
						url:searchPath,
						data:"keywords="+keywords,
						statusCode: {
							404: function() {
								$("tbody").html('Could not contact server.');
							},
							500: function() {
								 $("tbody").html('A server-side error has occurred.');
							}
						},
						error: function() {
							$("tbody").html('Veuillez réessayer');
						},
						success:function(result){
							$("tbody").html(result);
						}
							});
						}
					});
				
			});

