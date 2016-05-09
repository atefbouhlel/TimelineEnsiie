@include('layout.header')
<div class="onecolumn" >
    <div class="header"><span><span class="ico gray administrator"></span>profil</span></div>
        <div class="clear"></div>
        <div class="content" >
                          <form id="validation_demo" action="#"> 
                            <div  class="grid1">
                            <div class="profileSetting" >
                               <div class="avartar"><img src="{{URL::asset('images/avartarB.jpg')}}" width="200" height="200" alt="avatar" /></div> 
                            </div>
                            <div class="avartar">
                                <p align="center"><a href="{{URL::to('editPhoto')}}">Modifier photo</a></p>
                            </div>
                          </div>
                          <div  class="grid3">
									<div class="section ">
                                    <label> Nom complet</label>  
									<div>
									   <label>Atef Bouhlel</label></div>
                  </div>
                  <div class="section">
                                    <label> Email  </label>
                                    <div>
									<label>atef.bouhlel@ensiie.fr</label>
									</div>
                </div>
                  <div class="section ">
                                    <label>genre</label> 
                                      <div>
                                          <label >Homme</label>
                                      </div>
                                     
                  </div>
                                    <div class="section ">
                                    <label> Date de naissance</label>   
                                    <div> 
                                    <label >19/06/1991</label>
                                    </div>
                                    </div>
                                    
                                   
                                    <div class="section last">
                                    <div>
                                      <a class="uibutton submit_form" >Modifier</a>
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