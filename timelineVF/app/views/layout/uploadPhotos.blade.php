@include('layout.header')
<div class="onecolumn" >
    <div class="header"><span><span class="ico gray window"></span>  Upload Photos  </span></div>
    <div class="clear"></div>
    <div class="content" > 
      {{Form::open(array('method'=>'post','files'=>true,'id'=>'add_photos'))}} 
            <div class="section">
                              <label>Evenement</label>   
                              <div>
                                  <select data-placeholder="Choisir un evenement..." name="event" id="event" class="chzn-select" tabindex="2">
                                    <option value=""></option> 
                                    @foreach($events as $event)
                                      <option value="{{$event->id}}">{{$event->name}}</option>
                                    @endforeach
                                   </select>
                            </div>
            </div>
            <div class="section">
                <label>Rubrique</label>   
                <div>
                    <select class="small" id="rubric" required="required" name="rubric" disabled  >
                    </select>                            
                    </div>
            </div>
            <div class="section">
                            <label> Photos <small>Dossier compressé</small></label>   
                            <div> 
                                <input type="file" class="fileupload" id="file_input" name="photos" required/>                               
                            </div>
             </div>
             <div class="section last">
                <div><input type="submit" class="uibutton" value="Upload" rel="1" /></div>
            </div>
        {{Form::close()}}
    </div>
</div>
<div class="clear"></div>
@include('layout.footer')