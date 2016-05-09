
           

@foreach ($photo as $p)
<li class="albumImage" data-id="{{$p->id}}">
     <div class="picHolder">
             <span class="image_highlight"></span>
              <a href="{{$p->url}}" rel='glr' ></a> 
              <img src="{{$p->url}}" class="ph"/>
               <div class="picTitle">{{$p->url}}</div>
                                    
                <ul class="dataImg">
                  <li>{{$p->id}}</li>
                     <li>{{$p->url}}</li>
                </ul>   
      </div>
  </li>
  @endforeach
  <script type="text/javascript">

  $(".pop_box").fancybox({ 'showCloseButton': false, 'hideOnOverlayClick' : false }); 
  $('.albumImage').dblclick(function(){
    var id_photo = parseInt($(this).attr('data-id'));
      $("a[rel=glr]").fancybox({  'showCloseButton': true,'centerOnScroll' : true, 'overlayOpacity' : 0.8,'padding' : 0 ,
        onComplete: function () {
            $("#fancybox-img").wrap($("<center><a class='commentaire' href=\"{{URL::to('commentaires/"+id_photo+"')}}\">Commentaires<a/></center>",
            {              
                href: this.href    
            }));
          }
     
        });
      $(this).find('a').trigger('click');
  });



  </script>