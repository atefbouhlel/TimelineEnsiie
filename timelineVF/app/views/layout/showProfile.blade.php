@include('layout.header')
<div class="onecolumn" >
    <div class="header"><span><span class="ico gray administrator"></span>Profil</span></div>
        <div class="clear"></div>
        <div class="content" >
                          <form id="validation_demo" action="#"> 
                            <div  class="grid1">
                            <div class="profileSetting" >
                               <div class="avartar"><img src="{{URL::asset($user->url_photo)}}" width="200" height="200" alt="avatar" /></div> 
                            </div>
                          </div>
                          <div  class="grid3">
									<div class="section ">
                                    <label> Nom complet</label>  
									<div>
									   <label>{{$user->name}}</label></div>
                  </div>
                  <div class="section">
                                    <label> Email  </label>
                                    <div>
									<label>{{$user->email}}</label>
									</div>
                </div>
                 <div class="section">
                                    <label> Promo  </label>
                                    <div>
                  <label>{{$user->promo}}</label>
                  </div>
                </div>
                  <div class="section ">
                                    <label>genre</label> 
                                      <div>
                                         @if($user->gender ==1)
                                    <label >Homme</label>
                                    @else
                                    <label >Femme</label>
                                    @endif

                                      </div>
                                     
                  </div>
                                    <div class="section last ">
                                    <label> Date de naissance</label>   
                                    <div> 
                                       <label >{{$user->birthdate}}</label>
                                    </div>
                                    </div>
                                    
                                   
                                   

                            </div>
                          </form>
                            <div class="clear"></div>


                        </div>
                    </div>
                    <!-- // End onecolumn -->
                    
<div class="clear"></div>
@include('layout.footer')