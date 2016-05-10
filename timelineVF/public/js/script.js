$.fn.imgdata = function(key){
	return this.find('.dataImg li:eq('+key+')').text();
}
$.fn.hdata = function(key){
	return this.find('.dataSet li:eq('+key+')').text();
}

//tableau des rubriques
var rubrics=new Array();
// options cookie 10 days
var options = { path: '/', expires: 10 };
var buttonActions = {
	'hide_menu':function(){
		$.cookie('hide_','1', options);
		$('#hide_menu').hide();	
		$('body').addClass('nobg');		
		$('#left_menu,#load_menu').animate({ left: "-213px" }, 200 );
		$('#show_menu').show();
		$('#shadowhead').css({ position: "fixed" });	
		$('#content').animate({ marginLeft: "40px" }, 200, function(){ imgRow(); $(window).trigger("resize");});
	},	
	  'show_menu':function(){		
		  $(this).hide();	
		  $.cookie('hide_','0', options);
		  $('#hide_menu').show();
		  $('#left_menu,#load_menu').animate({ left: "0px" }, 200 );
		  $('#content').animate({ marginLeft: "240px" }, 200,function(){
			$('body').removeClass('nobg').addClass('dashborad');		
			$('#shadowhead').css({ position: "absolute" });	
			imgRow(); 
			$(window).trigger("resize");
		   } );
	},
   	'show_menu_icon':function() { 
		 $(this).hide();	
		$.cookie('hide_','0', options);
		 $('#left_menu,#load_menu').animate({ left: "0px" }, 200 );
		  $('#content').animate({ marginLeft: "70px" }, 200, function(){ imgRow(); });
		  $('#hide_menu_icon').show();	
					$('#main_menu').removeClass('main_menu').addClass('iconmenu');
					$('#main_menu li').each(function() {	  
							var title=$(this).find('b').text();
							$(this).find('a').attr('title',title);		
					});
					$('#main_menu li a').find('b').hide();
					$('#main_menu li ').find('ul').hide();
	  },
	     'hide_menu_icon':function() { 
		 $(this).hide();	
		 $.cookie('hide_','1', options);	 
		 $('#left_menu,#load_menu').animate({ left: "-213px" }, 200 ,function(){
					$('#main_menu').removeClass('iconmenu ').addClass('main_menu');
					$('#main_menu li a').find('b').show();											  
		  });
		  $('#content').animate({ marginLeft: "20px" }, 200, function(){ imgRow(); });
		  $('#show_menu_icon').show();	
	  },
	  'close_windows':function(){
		  $.fancybox.close(); 
		  ResetForm();
	}	
}




$(document).ready(function(){
	//add rubric form
	$('#add_rubric').submit(function(){
		if($('#event').val()==''){
			alert('Veuillez choisir un évenement');
			return false;	
		}

		if($('#rubric').val()==''){
			alert('Veuillez choisir une rubrique');
			return false;	
		}		
		
	});

	//upload photos veriffffffffffff
	$('#add_photos').submit(function(){
		if($('#event').val()==''){
			alert('Veuillez choisir un évenement');
			return false;	
		}

		var filename = $("#file_input").val();

        var extension = filename.replace(/^.*\./, '');
        if (extension == filename) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }

        //Un test sur l'extension du dossier compressé
        if (extension!='zip' && extension!='gz'){
            alert("Le format du dossier n'est pas valide.(.zip OU .tar.gz)");
            return false;
        }

		
	});


	//Jaime
	if($('#jaime').attr('clicked')=='true')
	    $('#jaime').css('background-color','#ffcd4c'); 
	

	//Comments (ENSIIE)
	
    $("#cmt").click( function(){
    	
    	var text=$("#commentaire").val();
    	var id_photo=parseInt($('.comment').attr('data-idPhoto'));
    	var url =$('#photo').attr('src');

		$('.comment').append('<div>'+
			'<div class="avartar"><img src='+url+' alt="photoDeprofil" /></div>'+
	        ' <div class="msg">'+
	        '<span><b>Moi</b> :</span> '+
	        ' <div class="bodyMsg">'+text+'</div>'+
	        '</div>'+
	    '</div>');
		$("#commentaire").val('');
	    $.ajax({	
       	    type: "POST",
            url: addComment,
            data:"id_photo="+id_photo+"&text="+text,
            success : function(){
           	}
        });
	    
	});

	//jaime
	$("#jaime").click( function(){
		var clicked=$(this).attr('clicked');
		cnt=parseInt($("#count").text());
		var id_photo=parseInt($('.comment').attr('data-idPhoto'));
	    
	    if (clicked=='false'){	             
	        $(this).css('background-color','#ffcd4c');
	        cnt=cnt+1;
	        $("#count").text(cnt);
	        $(this).attr('clicked','true');

	        $.ajax({	
	       	    type: "POST",
	            url: addJaime,
	            data:"id_photo="+id_photo,
	            success : function(){
	           	}
        	});
	    }	               
	    else {
	        $(this).attr('clicked','false');
	        $(this).css('background-color','#d74543'); 
	        cnt=cnt-1;
	        $("#count").text(cnt);

	        $.ajax({	
	       	    type: "POST",
	            url: deleteJaime,
	            data:"id_photo="+id_photo,
	            success : function(){
	           	}
        	});
	    }
	}); 

	// tabs
	$("ul.tabs li").fadeIn(400); 
	$("ul.tabs li:first").addClass("active").fadeIn(400); 
	$(".tab_content:first").fadeIn(); 
	$("ul.tabs li").live('click',function() {
		  $("ul.tabs li").removeClass("active");						   
		  $(this).addClass("active");  
		  var activeTab = $(this).find("a").attr("href"); 
		  $('.tab_content').fadeOut();		
		  $(activeTab).delay(400).fadeIn();		
		  ResetForm();
		  return false;
	});
	
		$('.events div.external-event').each(function() {
			var eventObject = {
				title: $.trim($(this).text()) 
			};
			$(this).data('eventObject', eventObject);
			$(this).draggable({
				zIndex: 999,
				revert: true,      
				revertDuration: 0 
			});
			
		});
	
	
	//dataTable
	
	
	


});	

$(function() {		
	LResize();
	$(window).resize(function(){LResize(); });
    $(window).scroll(function (){ scrollmenu(); });
		
	  //close_windows,hide_menu,show_menu
	  $('.butAcc').live('click',function(e){				   
			  if(buttonActions[this.id]){
				  buttonActions[this.id].call(this);
			  }
			  e.preventDefault();
	  });
	 //exam ui slider element
	  $( "#slider-range-min" ).slider({
			range: "min",
			value: 212,
			min: 1,
			max: 700,
			slide: function( event, ui ) {
				$( "#amount" ).text( "$" + ui.value );
			}
		});
		$( "#amount" ).text( "$" + $( "#slider-range-min" ).slider( "value" ) );
		
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 75, 300 ],
			slide: function( event, ui ) {
				$( "#amount2" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount2" ).text( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		
		$( "#slider" ).slider({
			value:100,
			min: 0,
			max: 500,
			step: 50,
			slide: function( event, ui ) {
				$( "#amount3" ).text( "$" + ui.value );
			}
		});
	$( "#amount3" ).text( "$" + $( "#slider" ).slider( "value" ) );
	$( "#eq > span" ).each(function() {
		// read initial values from markup and remove that
		var value = parseInt( $( this ).text(), 10 );
		$( this ).empty().slider({
			value: value,
			range: "min",
			animate: true,
			orientation: "vertical"
		});
	});
	$( "#red, #green, #blue" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 255,
		value: 127,
		slide: refreshSwatch,
		change: refreshSwatch
	});
	$( "#red" ).slider( "value", 190 );
	$( "#green" ).slider( "value", 221 );
	$( "#blue" ).slider( "value", 23 );
	  
	  
  	//datepicker
	$("input.datepicker").datepicker({ 
		autoSize: true,
		appendText: '(dd-mm-yyyy)',
		dateFormat: 'dd-mm-yy'
	});
	$( "div.datepickerInline" ).datepicker({ 
		dateFormat: 'dd-mm-yy',
		numberOfMonths: 1
	});	

	$( "input.birthday" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'dd-mm-yy'
    });
	

	//datetimepicker
   $("#datetimepicker").datetimepicker();
   $('.timepicker').timepicker({});
   
	//button click
	$('.loading').live('click',function() { 
		  var str=$(this).attr('title'); 
		  var overlay=$(this).attr('rel'); 
		  loading(str,overlay);
		  setTimeout("unloading()",1500);
	  });
	$('#preloader').live('click',function(){
			unloading();
	 });
	
	// submit form 
	$('a.submit_form').live('click',function(){
		  var form_id=$(this).parents('form').attr('id');
		  $("#"+form_id).submit();
	});
	$('a#ajout_rubric').live('click',function(){
		  $("#new_rubric").show();
	});
	$('a.form_rubric').live('click',function(){
			var title=$('#title').val();
			var start=$('#timepicker1').val();
			var end=$('#timepicker2').val();

			$('#rubrics').append('<div class="row-fluid"><div class="span4"><div class="shoutcutBox" style="left: 0px;">  <strong>'+title+'</strong><em>'+start+'=>'+end+'</em></div></div></div>');
			$("#new_rubric").hide();
			$('#title').val('');
			$('#timepicker1').val('');
			$('#timepicker2').val('');

			rubrics.push(title);
			rubrics.push(start);
			rubrics.push(end);
	});

	$('a.finir').live('click',function(){
		alert('ok');
		var event_title=$('#event_title').val();alert('oui');
		//var start=$('#timepicker1').val();
		//var end=$('#timepicker2').val();
		//alert(event_title);
	});


	// logout  
	$('.logout').live('click',function() { 
		  var str="Logout"; 
		  var overlay="1"; 
		  loading(str,overlay);
		  setTimeout("unloading()",1500);
		  //setTimeout( "window.location.href='index.html'", 2000 );
	  });
		
	// wizard 
	 $('#wizard').smartWizard();
	 
	// fancybox 
	$(".pop_box").fancybox({ 'showCloseButton': false, 'hideOnOverlayClick'	:	false });	
	$('.albumImage').dblclick(function(){
		  $("a[rel=glr]").fancybox({  'showCloseButton': true,'centerOnScroll' : true, 'overlayOpacity' : 0.8,'padding' : 0 });
		  $(this).find('a').trigger('click');
	})
		function test(value){
                alert("This rating's value is "+value);
     }
	
	
	  
	  	// images  editor tranfer
		$('#reflect').click(function() {
						$('.animate').animate({"reflect": true});	 
		});
		$('#reflectX').click(function() {
						$('.animate').animate({"reflectX": true});	 
		});
		$('#reflectY').click(function() {
						$('.animate').animate({"reflectY": true});	 
		});
		$('#reflectXY').click(function() {
						$('.animate').animate({"reflectXY": true});	 
		});
		$('#reflectYX').click(function() {
						$('.animate').animate({"reflectYX": true});	 
		});
	    ///////////////////////////////////////////////////////////////////////////		
		
		

	// uploadButton  ( Add file )
		$('#uploadButton').hover(function(){
			$('#upload_b').addClass('hover');
		},function(){
			$('#upload_b').removeClass('hover');
		});		
	
	// upload
	   $("input.fileupload").filestyle();	
	
	
	// Sortable
	$("#picThumb").sortable({
		opacity: 0.6,handle : '.move', connectWith: '.picThumbUpload', items: '.picThumbUpload'
	});
	$("#main_menu").sortable({
		opacity: 0.6,connectWith: '.limenu',items: '.limenu'		
	});
	$( "#sortable" ).sortable({
		opacity: 0.6,revert: true,cursor: "move", zIndex:9000
	});
	

    // Effect 
	$('.SEclick, .SEmousedown, .SEclicktime,.SEremote,.SEremote2,.SEremote3,.SEremote4').jrumble();
	$('.SE').jrumble({
		x: 2,
		y: 2,
		rotation: 1
	});
	
	$('.alertMessage.error ').jrumble({
		x: 10,
		y: 10,
		rotation: 4
	});
	
	$('.alertMessage.success').jrumble({
		x: 4,
		y: 0,
		rotation: 0
	});
	
	$('.alertMessage.warning').jrumble({
		x: 0,
		y: 0,
		rotation: 5
	});

	$('.SE').hover(function(){
		$(this).trigger('startRumble');
	}, function(){
		$(this).trigger('stopRumble');
	});

	$('.SEclick').toggle(function(){
		$(this).trigger('startRumble');
	}, function(){
		$(this).trigger('stopRumble');
	});
	
	$('.SEmousedown').bind({
		'mousedown': function(){
			$(this).trigger('startRumble');
		},
		'mouseup': function(){
			$(this).trigger('stopRumble');
		}
	});
	
	$('.SEclicktime').click(function(){
		var demoTimeout;
		$this = $(this);
		clearTimeout(demoTimeout);
		$this.trigger('startRumble');
		demoTimeout = setTimeout(function(){$this.trigger('stopRumble');}, 1500)
	});
	$('.SEremote').hover(function(){
		$('.SEremote2').trigger('startRumble');
	}, function(){
		$('.SEremote2').trigger('stopRumble');
	});
	
	$('.SEremote2').hover(function(){
		$('.SEremote').trigger('startRumble');
	}, function(){
		$('.SEremote').trigger('stopRumble');
	})

	$('.SEremote3').hover(function(){
		$('.alertMessage').trigger('startRumble');
	}, function(){
		$('.alertMessage').trigger('stopRumble');
	})

	$('.SEremote4').hover(function(){
		$('.alertMessage.error').trigger('startRumble');
	}, function(){
		$('.alertMessage.error').trigger('stopRumble');
	})


	
	// select boxes
	/*$(function() {
        $(' select').not("select.chzn-select,select[multiple],select#box1Storage,select#box2Storage").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    });
	// Dual select boxes
	$.configureBoxes();*/
	
	$(".dataTables_wrapper .dataTables_length select").addClass("small");
	$("table tbody tr td:first-child .custom-checkbox:first-child").css("margin: 0px 3px 3px 3px");
	 // mutiselection
	$(".chzn-select").chosen(); 
	


	 // checkbox  All in Table
	$(".checkAll").live('click',function(){
		  var table=$(this).parents('table').attr('id');
		  var checkedStatus = this.checked;
		  var id= this.id;
		 $( "table#"+table+" tbody tr td:first-child input:checkbox").each(function() {
			this.checked = checkedStatus;
				if (this.checked) {
					$(this).attr('checked', $('.' + id).is(':checked'));
					$('label[for='+$(this).attr('id')+']').addClass('checked ');
				}else{
					$(this).attr('checked', $('.' + id).is(''));
					$('label[for='+$(this).attr('id')+']').removeClass('checked ');
					}
		});	 
	});		
	

	
	// icon  gray Hover
	$('.iconBox.gray').hover(function(){
		  var name=$(this).find('img').attr('alt');
		  $(this).find('img').animate({ opacity: 0.5 }, 0, function(){
			    $(this).attr('src','images/icon/color_18/'+name+'.png').animate({ opacity: 1 }, 700);									 
		 });
	},function(){
		  var name=$(this).find('img').attr('alt');
		  $(this).find('img').attr('src','images/icon/gray_18/'+name+'.png');
	 })
	// icon  Logout 
	$('div.logout').hover(function(){
		  var name=$(this).find('img').attr('alt');
		  $(this).find('img').animate({ opacity: 0.4 }, 200, function(){
			    $(this).attr('src','images/'+name+'.png').animate({ opacity: 1 }, 500);									 
		 });
	},function(){
		  var name=$(this).find('img').attr('name');
		  $(this).find('img').animate({ opacity: 0.5 }, 200, function(){
			    $(this).attr('src','images/'+name+'.png').animate({ opacity: 1 }, 500);									 
		 });
	 })
	// icon  setting 
	$('div.setting').hover(function(){
		$(this).find('img').addClass('gearhover');
	},function(){
		$(this).find('img').removeClass('gearhover');
	 })
	
	// shoutcutBox   Hover
	$('.shoutcutBox').hover(function(){
		  $(this).animate({ left: '+=15'}, 200);
	},function(){
		$(this).animate({ left: '0'}, 200);
	 })
	
	// mainmenu   Hover
/*	$('.main_menu li ul li a').live({
        mouseenter: function(){
		   $(this).animate({ paddingLeft: '35'}, 200);
           },
        mouseleave: function(){
		$(this).animate({ paddingLeft: '30'}, 200);
           }
       }
    );*/


	// hide notify  Message with click
	$('#alertMessage').live('click',function(){
	  $(this).stop(true,true).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });						 
	});
	
	// images hover
	$('.picHolder,.SEdemo').hover(
		  function() {
			  $(this).find('.picTitle').fadeTo(200, 1);
		  },function() {
			  $(this).find('.picTitle').fadeTo(200, 0);
		  }
	  )	
		  
				  
	//droppable 			   	
	// move images  to  news album
	$('.album').droppable({
		hoverClass: 'over',
		activeClass: 'dragging',
		drop:function(event,ui){
			
			 if($(this).hasClass('selected')) return false;
			loading('Moving');
			
			ui.helper.fadeOut(400);
			setTimeout("unloading()",1500); 		

		},
		tolerance:'pointer'
	});
	$('.picPreview').droppable({
		  hoverClass: 'picPreview-hover',
		  activeClass: 'picPreview-hover',
		   drop: function( event, ui ) { 
			   $('#image-albumPreview').attr('src',ui.draggable.find('img').attr('src'));
		   }
	});	
  	$('.deletezone').droppable({
		hoverClass: 'deletezoneover',
		activeClass: 'deletezonedragging',
		drop:function(event,ui){	

		   var data ='id='+ ui.draggable.imgdata(0); 
		   var name =ui.draggable.imgdata(1); 

		$.confirm({
		'title': 'DELETE DIALOG BOX','message': "<strong>YOU WANT TO DELETE </strong><br /><font color=red>' "+ name +" ' </font> ",'buttons': {'Yes': {'class': 'special',
		'action': function(){
					loading('Deleting',1);
						   ui.helper.fadeOut(function(){ ui.helper.remove(); 
						  setTimeout("unloading()",1500); 	
					});
			}},'No'	: {'class'	: ''}}});
		},
		tolerance:'pointer'
	});
	$('.album.load').live('click',function(e){
		  $('.album').removeClass('selected',1000);
		  var albumid=$(this).attr('id');
		  
		  $(this).addClass('selected',1000);
		  
		  loadalbum(albumid);
	})	
	$(".albumDelete").live('click',function() { 
		   var dataSet=$(this).parents('form');
		   var name = $(this).attr("name");
		   var data ='id='+ $(this).attr("id");   
		   albumDelete(data,name,dataSet);
	});
	$('#editAlbum.editOn').live('click',function(){
												   
	$('.album_edit').fadeIn(400);
	$('.boxtitle').css({'margin-left':'207px'});
	$('.boxtitle .texttip').hide();
		$(this).html('close edit').attr('title','Click here to Close edit  ').removeClass('editOn').addClass('editOff');
		imgRow();
	})
	$('#editAlbum.editOff').live('click',function(){			
												   
		$('.album_edit').fadeOut(400,function(){
		$('.boxtitle .texttip').show();
				 $('.boxtitle').css({'margin-left':'0'});
				 imgRow();
		});
		$(this).html('edit album').attr('title','Click here to edit  Album ').removeClass('editOff').addClass('editOn');
		 
	})
	
	// mouseenter Over album with  CSS3
	$(".preview").delegate('img', 'mouseenter', function() {
		  if ($(this).hasClass('stackphotos')) {
		  var $parent = $(this).parent();
		  $parent.find('img#photo1').addClass('rotate1');
		  $parent.find('img#photo2').addClass('rotate2');
		  $parent.find('img#photo3').addClass('rotate3');
		  }
	  }).delegate('img', 'mouseleave', function() {
		  $('img#photo1').removeClass('rotate1');
		  $('img#photo2').removeClass('rotate2');
		  $('img#photo3').removeClass('rotate3');
	});
	
	$('.msg').live({
        mouseenter: function(){
			$(this).find('.toolMsg').show();
           },mouseleave: function(){
			$(this).find('.toolMsg').hide();
           }
       }
    );
	});

	
		
	// check browser fixbug
	var mybrowser=navigator.userAgent;
	if(mybrowser.indexOf('MSIE')>0){$(function() {	
			   $('.formEl_b fieldset').css('padding-top', '0');
				$('div.section label small').css('font-size', '10px');
				$('div.section  div .select_box').css({'margin-left':'-5px'});
				$('.iPhoneCheckContainer label').css({'padding-top':'6px'});
				$('.uibutton').css({'padding-top':'6px'});
				$('.uibutton.icon:before').css({'top':'1px'});
				$('.dataTables_wrapper .dataTables_length ').css({'margin-bottom':'10px'});
		});
	}
	if(mybrowser.indexOf('Firefox')>0){ $(function() {	
			   $('.formEl_b fieldset  legend').css('margin-bottom', '0px');	
			   $('table .custom-checkbox label').css('left', '3px');
		  });
	}	
	if(mybrowser.indexOf('Presto')>0){
		$('select').css('padding-top', '8px');
	}
	if(mybrowser.indexOf('Chrome')>0){$(function() {	
				 $('div.tab_content  ul.uibutton-group').css('margin-top', '-40px');
				  $('div.section  div .select_box').css({'margin-top':'0px','margin-left':'-2px'});
				  $('select').css('padding', '6px');
				  $('table .custom-checkbox label').css('left', '3px');
		});
	}		
	if(mybrowser.indexOf('Safari')>0){}		



	  
	  
	  function fileDialogCallback(callback,type,input){
			$('<div id="finder_'+callback+'"/>').elfinder({
				 url : 'components/elfinder/connectors/php/connector-'+type+'.php', editorCallback : function(url) { $('#'+input).val(url);
				},closeOnEditorCallback : true, dialog : { title : 'File manager',modal : true,width : 700 }
			})							   
	  }
	  function fileDialog(callback,type){
			$('<div id="finder_'+callback+'"/>').elfinder({
				  url : 'components/elfinder/connectors/php/connector-'+type+'.php',dialog : { title : 'File manager',modal : true,width : 700 }
			})							   
	  }
		  
function Delete(data,name,row,type,dataSet){
		var loadpage = dataSet.hdata(0);
		var url = dataSet.hdata(1);
		var table = dataSet.hdata(2);
		var data = data+"&tabel="+table;
	}

	  function albumDelete(data,name,dataSet){
			  var loadpage = dataSet.hdata(0);
			  var row = dataSet.hdata(2);
			  $.confirm({
			  'title': '_DELETE DIALOG BOX','message': "<strong>YOU WANT TO DELETE </strong><br /><font color=red>' "+ name +" ' </font> ",'buttons': {'Yes': {'class': 'special',
			  'action': function(){
						  loading('Checking',1);
						  setTimeout("unloading()",1500); 	  
				}},'No'	: {'class'	: ''}}});
	  }
	  
	function ChargementPhoto(albumid){
	  	$.ajax({	
       	    type: "POST",
            url: chargement,
            data:"id="+albumid,
            success : function(txt){
            	$("#sortable").html(txt);
           	}
        });
	} 
	function loadalbum(albumid){
		loading('Chargement...');
		$('.albumImagePreview').show();
		imgRow()
	
		$(' .albumImagePreview').fadeOut(function(){ 	
	  		$('#uploadButtondisable').css({'display':'none'});
	  		$('.screen-msg').hide();  setTimeout("unloading()",500); 	 	
	  	}).delay(400).fadeIn();
	   	ChargementPhoto(albumid);	   
	}


	  function ResetForm(){
		  $('form').each(function(index) {	  
			var form_id=$('form:eq('+index+')').attr('id');
				  if(form_id){ 
					  $('#'+form_id).get(0).reset(); 
					  $('#'+form_id).validationEngine('hideAll');
							  var editor=$('#'+form_id).find('#editor').attr('id');
							  if(editor){
								   $('#editor').cleditor()[0].clear();
							  }
				  } 
		  });	
	  }


	function hexFromRGB(r, g, b) {
		var hex = [
			r.toString( 16 ),
			g.toString( 16 ),
			b.toString( 16 )
		];
		$.each( hex, function( nr, val ) {
			if ( val.length === 1 ) {
				hex[ nr ] = "0" + val;
			}
		});
		return hex.join( "" ).toUpperCase();
	}
	function refreshSwatch() {
		var red = $( "#red" ).slider( "value" ),
			green = $( "#green" ).slider( "value" ),
			blue = $( "#blue" ).slider( "value" ),
			hex = hexFromRGB( red, green, blue );
		$( "#swatch" ).css( "background-color", "#" + hex );
	}
	  

	  
	  function showError(str,delay){	
		  if(delay){
			  $('#alertMessage').removeClass('success info warning').addClass('error').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500,function(){
					  $(this).delay(delay).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });																														   																											
				});
			  return false;
		  }
			  	$('#alertMessage').addClass('error').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	  }
	  function showSuccess(str,delay){
		  if(delay){
			  $('#alertMessage').removeClass('error info warning').addClass('success').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500,function(){
					  $(this).delay(delay).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });																														   																											
				});
			  return false;
		  }
			  $('#alertMessage').addClass('success').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	  }
	  function showWarning(str,delay){
		  if(delay){
			  $('#alertMessage').removeClass('error success  info').addClass('warning').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500,function(){
					  $(this).delay(delay).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });																														   																											
				});
			  return false;
		  }
			  $('#alertMessage').addClass('warning').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	  }
	  function showInfo(str,delay){
		  if(delay){
			  $('#alertMessage').removeClass('error success  warning').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500,function(){
					  $(this).delay(delay).animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });																														   																											
				});
			  return false;
		  }
			  $('#alertMessage').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	  }


	  
	  function hide_panel() { 
			if(Get_Cookie('hide_')=='1'){$('#show_menu').show();}else{$('#hide_menu').show();}
	  }	
	  
	  
	  function loading(name,overlay) { 
			$('body').append('<div id="overlay"></div><div id="preloader">'+name+'..</div>');
					if(overlay==1){
					  $('#overlay').css('opacity',0.4).fadeIn(400,function(){  $('#preloader').fadeIn(400);	});
					  return  false;
			   }
			$('#preloader').fadeIn();	  
	   }
	   
	   
	  function unloading() { 
			$('#preloader').fadeOut(400,function(){ $('#overlay').fadeOut(); $.fancybox.close(); }).remove();
	   }
	
 function imgRow(){	
		var maxrow=$('.albumpics').width();
		if(maxrow){
				maxItem= Math.floor(maxrow/160);
				maxW=maxItem*160;
				mL=(maxrow-maxW)/2;
				$('.albumpics ul').css({
						'width'	:	maxW	,
						'marginLeft':mL
		 })
	}}	
	function scrollmenu(){	
			if($(window).scrollTop()>=1){			   
			  $("#header ").css("z-index", "50"); 
		  }else{
			  $("#header ").css("z-index", "47"); 
		 }
	}
	
	
 function LResize(){	
  imgRow();
  scrollmenu();
	if($.cookie("hide_")){
		$('#hide_panel').show();	
	}
	$("#shadowhead").show();
		if($(window).width()<=768){
			$('body').addClass('nobg');$('#hide_menu').hide();$('#show_menu').hide();			
			$('#shadowhead').css({ position: "fixed" });	
			$(' .column_left, .column_right ,.grid2,.grid3,.grid1').css({ width:"100%",float:"none",padding:"0",marginBottom: "20px" });			  	
			 if($.cookie("hide_")=='1'){
					$('#show_menu_icon').show();$('#hide_menu_icon').hide();
					$('#left_menu,#load_menu').css({ left: "-213px" });
					$('#content').css({ marginLeft: "20px" });	
			  }else{
					$('#hide_menu_icon').show();$('#show_menu_icon').hide();
					$('#left_menu,#load_menu').css({ left: "0px" });$('#content').css({ marginLeft: "70px" });	
					$('#main_menu').removeClass('main_menu').addClass('iconmenu');
					$('#main_menu li').each(function() {	  
							var title=$(this).find('b').text();
							$(this).find('a').attr('title',title);		
					});
					$('#main_menu li a').find('b').hide();	
					$('#main_menu li ').find('ul').hide();
				  }	
		}
		if($(window).width()>1024) {
					$('#main_menu').removeClass('iconmenu ').addClass('main_menu');
					$('#main_menu li a').find('b').show();	
					$('#hide_menu_icon').hide();$('#show_menu_icon').hide();
					$('.column_left,.column_right,.grid2').css({ width:"49%",float:"left"});
					$('.column_left').css({ 'padding-right':"1%"});
					$('.column_right').css({ 'padding-left':"1%"});
					$('.grid1').css({ width:"24%",float:"left"});$('.grid3').css({ width:"74%",float:"left"});
		 
			 if($.cookie("hide_")=='1'){
					$('#show_menu').show();$('#hide_menu').hide();$('body').addClass('nobg');	
					$('#left_menu,#load_menu').css({ left: "-213px" });
					$('#content').css({ marginLeft: "40px" });	
					$('#shadowhead').css({ position: "fixed" });	
			  }else{
					$('#hide_menu').show(); $('#show_menu').hide();
					$('#left_menu,#load_menu').css({ left: "0px" });
					$('#content').css({ marginLeft: "240px" });
					$('body').removeClass('nobg').addClass('dashborad');
					$('#shadowhead').css({ position: "absolute" });	
				  }	
		 	
		}else{
			   $(' .column_left, .column_right ,.grid2,.grid3,.grid1').css({ width:"100%",float:"none",padding:"0",marginBottom: "20px" });
		}
}