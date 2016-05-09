@include('layout.header')

<div class="onecolumn" >
    <div class="header"><span><span class="ico gray administrator"></span>profil</span></div>
        <div class="clear"></div>
        <div class="content" >
          {{Form::open(array('method'=>'post','id'=>'validation_demo','files'=>true))}}
                            <div  class="grid1">
                            <div class="profileSetting" >
                               <div class="avartar"><img src="{{URL::asset('images/avartarB.jpg')}}" width="200" height="200" alt="avatar" /></div> 
                            </div>
                            <div class="avartar">
                                <input type="file" name="photo" class="fileupload" />
                            </div>
                          </div>
                          <div  class="grid3">
                  <div class="section">
                      <label> Email  </label>
                      <div>
                          <input type="email"  placeholder="email" name="email" id="email"  class=" medium" required />        
                      </div>
                  </div>
                  <div class="section">
                                    <label> Password  </label>
                                    <div>
                                    <input type="password" placeholder="Mot de passe" class="medium"  name="password" id="password"  required/>
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Confirmation  </label>
                                    <div>
                                    <input type="password" placeholder="confirmation mot de passe" class="medium"  name="passwordConfirm" id="passwordConfirm" required />
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Nom  </label>
                                    <div>
                                    <input type="text" placeholder="Dupont" class=" medium"  name="name" id="name"  required/>
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Prénom  </label>
                                    <div>
                                    <input type="text" placeholder="John" class=" medium"  name="firstname" id="firstname"  required/>
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Téléphone  </label>
                                    <div>
                                    <input type="text" pattern="[0-9]{10}" placeholder="06 23 56 48 93" class=" medium"  name="phone" id="phone"  />
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Adresse  </label>
                                    <div>
                                    <input type="text" placeholder="5 Clos de La Cathédrale" class=" medium"  name="adress" id="adress"  />
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Ville  </label>
                                    <div>
                                    <input type="text"  placeholder="Evry" class=" medium"  name="city" id="city"  />
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Promotion  </label>
                                    <div>
                    <select class="small" id="select" name="promotion">
                            <option value=""  ></option>
                            <option value=""  ></option>
                            <option value=""  ></option>
                            <option value=""  ></option>
                            <option value=""  ></option>
                    </select>                            
                    </div>
                  </div>

                  <div class="section ">
                                    <label>genre</label>   
                                    <div> 
                                      <div>
                                          <input type="radio" name="gender" id="radio-1" value="1"  class="ck" checked="checked"/>
                                          <label for="radio-1">Homme</label>
                                      </div>
                                      <div>
                                          <input type="radio" name="gender" id="radio-2" value="1"  class="ck"  />
                                          <label for="radio-2" >Femme</label>
                                      </div>
                                    </div>
                   </div>
                   <div class="section last">
                    <label>Date de naissance</label>   
                    <div><input type="text"  id="datepick" class="datepicker" readonly="readonly" name="datepicker" required /></div>
                </div>
                    <div class="section last">
                        <div>
                          <input type="submit" class="uibutton large" value="valider"/>
                        </div>
                    </div>

                            </div>
                          {{Form::close()}}
                            <div class="clear"></div>


                        </div>
                    </div>
                    <!-- // End onecolumn -->
                    
<div class="clear"></div>
@include('layout.footer')