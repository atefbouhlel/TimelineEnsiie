@include('layout.header')					
					<div class="onecolumn" >
                        <div class="header"><span></span></div>
                        <div class="clear"></div>
                        <div class="content" >
							<center><img src="{{URL::asset('images/exampic/24.jpg')}}" alt="photoAcommenter "width="auto" height="500" center align="top"  /></center>
						
						<div style="float:right; margin-right:55px;margin-top:20px;">
	
                            <a class="uibutton icon special add " id="jaime" clicked="{{$jaime_clicked}}" ><div style="float:left;">J'aime(</div><div style="float:left;" id="count"> {{$jaime}} </div> )<div style="float:clear;"></div></a> 
                            <form method="post" action="{{URL::to('deletePhoto')}}"><input type="hidden" name="id_photo" value="{{$photo->id}}"><input type="submit" class="uibutton icon special secure " id="delete" value="Supprimer"/></form>
                            
							<br class="clear" /><br class="clear" />
							</div>
						<br class="clear" /><br class="clear" />                    
							
							
							<div class="comment" width="auto" data-idPhoto="{{$photo->id}}">
                                @foreach($comments as $comment)
                                    <div class="comm">
                                        	<div class="avartar"><img src="images/im1.jpg"  alt="photoDeprofil" /></div>
                                            <div class="msg">
            									<span><b>Atef</b>:</span><span>{{$comment->text}}</span>     
                                               	<div class="bodyMsg">{{$comment->text}}</div>
                                            </div>
                                    </div>
                                @endforeach
							    <div class="clear"></div>
              </div>

                                <div class="commentMsg">
								
                                <form class="newComment">
                               	    <textarea placeholder="...." id="commentaire"></textarea>
                                    <div><a class="uibutton icon special edit" id="cmt" clicked="false">Commenter</a> </div>
                                    <!--<div><a class="uibutton">Commenter</a></div>-->
                                </form>
                                </div>
                            </div>
                              </div>
@include('layout.footer')