@include('layout.header')
<div class="onecolumn" >
    <div class="header"><span><span class="ico gray window"></span>  Upload Photos  </span></div>
    <div class="clear"></div>
    <div class="content" > 
      {{Form::open(array('method'=>'post','files'=>true,'id'=>'add_rubric'))}} 
            <div class="section">
                              <label>Evenement</label>   
                              <div>
                                  <select data-placeholder="Choisir un evenement..." name="event" id="event" class="chzn-select" tabindex="2" >
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
                   <input type="text"  name="newRubric" required/>               
                    </div>
            </div>

                <div class="section">
                <label>Heure de début</label>   
                <div>
                   <input type="time" name="debut" required/>               
                    </div>
            </div>
                <div class="section">
                <label>Heure de fin</label>   
                <div>
                   <input type="time" name="fin" required/>               
                    </div>
            </div>
         
             <div class="section last">
                <div><input type="submit" class="uibutton" value="Ajouter" rel="1" /></div>
            </div>
        {{Form::close()}}
    </div>
</div>
<div class="clear"></div>
@include('layout.footer')