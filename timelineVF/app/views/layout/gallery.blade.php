@include('layout.header')    
    
 <div class="onecolumn" >
                        <div class="header">
                        <span ><span class="ico gray pictures_folder"></span>GALLERIE</span>
                        <div id="buttom_top">
                            <ul class="uibutton-group">
                              @if(Session::get('user')->isAdmin==1)
                                <li><a class="uibutton icon special"   href="{{URL::to('deleteEvent/'.$event_id)}}"  >Supprimer cet évenement</a></li>
                                <li><a class="uibutton icon add"   href="{{URL::to('newRubric')}}"  >Nouveau Album</a></li>

                              @endif
                                <li><div id="uploadButtondisable"></div>
                                  <a  class="uibutton icon add" href="{{URL::to('upload')}}" id="uploadAlbum">Ajouter photos dans un album</a>
                                </li>
                            </ul>
                        </div>
                        </div><!-- End header -->	
                         <div class="clear"></div>     
                        <div class="content" >

                        <div id="albumsList" >
                          <div class="load_page" style="padding:0">

                                                                           
                            @foreach($t as $tab)
                                         <div class="album load" id="{{$tab['rub']->id}}">
                                              <div class="preview">
                                                <?php $i=0;
                                                ?>
                                                @foreach ($tab['pub'] as $p)
                                                 <?php 
                                                 $i++
                                                 ?>
                                                 <img width="130" id="photo{{$i}}" class="stackphotos" src="{{URL::asset($p->url)}}" alt="Thumbnail" />
                                                   
                                                @endforeach
                                              <div style="clear:both"></div>
                                              </div>
                                              <div class="title top20">
                                              <a href="{{URL::to('telechargement',['id' => $tab['rub']->id])}}"><i class="fa fa-download" aria-hidden="true"></i></a>
                                              @if(Session::get('user')->isAdmin==1)
                                               <a data-id="{{$tab['rub']->id}}" class="supp" href="{{URL::to('suppression',['id' => $tab['rub']->id])}}">
                                                  <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                  @endif
                                                {{$tab['rub']->name}} </div>
                                              <div class="stats"> <center>{{$tab['rub']->start}} -> {{$tab['rub']->end}} </center></div>
                                              <div class="clear"></div>
                                         </div>
                            @endforeach

                        </div>
                        </div> 
                     <div class="screen-msg"><span class="icon"><img src="{{URL::asset('images/icon/dialog.png')}}" alt="dialog"/></span>Cliquer sur un album pour afficher les photos</div>
                        
                        <div class="albumImagePreview">
                              <div class="album_edit" style="display:none">
                               <form name="Save_form"  id="Save_form" action="#">
                              <h1>Edit  Album</h1>
                              
                              <div class="picPreview"><img id="image-albumPreview" title="Drop Image Here"  src="exampic/25.jpg" alt="Image Preview"  /></div>
                              <div class="clear"></div>
                              <div class="hr"></div>
                              
                                  <input type="hidden" name="id_edit" id="id_edit"  value="1"/>
                                  <input type="hidden" name="thumbPreview" id="thumbPreview"  />
                                   <div class="tip">
                                  <input type="text" name="name" id="name"   title="Album name" style="width:146px" value="02/20/2012" maxlength="35" />
                                  </div>
                                  <div class="hr"></div>
                                  <ul class="uibutton-group">
                                    <a class="uibutton save_form normal loading"  title="Saving" rel="1">save</a>
                                    <a class="uibutton  albumDelete normal " id="1" name="02/20/2012" >Delete </a>
                                  </ul>
                                  <div class="hr"></div>
                                  </form>
                                  <div class="deletezone small" > Drop Images To Delete</div>
                                  <div class="hr"></div>    
                         
                                  <div class="clear"></div>
                              </div>
                              
                              <div class="boxtitle" ><span class="texttip">double click pour visualiser une photo </span>
                              
                              </div>		


                              <div class="albumpics">
						
                                    <ul id="sortable"  >
                                    
                                        

										

                        
                                    </ul>
                              </div> 
                        </div>
                        
                        <div class="clear"></div>
                        </div>
                        </div>
    
@include('layout.footer')