@include('layout.header')
<div class="onecolumn" >
    <div class="header"><span><span class="ico gray window"></span>  Nouvel évenement  </span></div>
    <div class="clear"></div>
    <div class="content" >  

        <!-- Smart Wizard -->
        
  		<div id="wizard" class="swMain">
  			<ul>
  				<li>
  					<a href="#step-1">
		                <label class="stepNumber">1</label>
		                <span class="stepDesc">étape 1<br />
		                   <small>évenement</small>
		                </span>
	            	</a>
            	</li>
  				<li>
  					<a href="#step-2">
		                <label class="stepNumber">2</label>
		                <span class="stepDesc">étape 2<br />
		                   <small>rubriques</small>
		                </span>
	           		</a>
           		</li>
  			</ul>
  			{{Form::open(array('method'=>'post','files'=>true))}}
  			<div id="step-1">
  				<p> 
		        	<div class="section" >
		                <label> Titre </label>   
		                <div> <input type="text" id="event_title" name="event_title" class="large" required/></div>
		            </div>              
		            <div class="section ">
		                <label> Photo de couverture</label>   
		                <div> 
		                    <input type="file" id="file_input" class="fileupload" placeholder="choisir une photo" name="event_photo" required/>
		                </div>
		            </div>
		            <div class="section last">
		                <label>Date</label>   
		                <div><input type="text"  id="datepick" class="datepicker" readonly="readonly" name="datepicker"  /></div>
		            </div>
		            <input type="hidden" name="rubrics" id="rubrics_tab" value=""/>
		        </p>		           
			</div>
  			<div id="step-2">
				<div style="float:left;margin-bottom:10px;">Dans cette étape, vous devez ajouter les différents rubriques</div>
				<div id="rubrics" ></div>
				<div class="clear"></div>
			    <a id="ajout_rubric" class="uibutton icon confirm add" >Ajouter une nouvelle rubrique</a> 
		        	
		        <div id="new_rubric" style="display:none;">
			     	<div class="section" >
			                <label> Nom </label>   
			                <div> <input type="text" name="nom" class="large" id="title"  /></div>
			        </div>
			        <div class="section">
			                <label>Début</label>   
			                <div><input type="text"  id="timepicker1" class="timepicker" readonly="readonly" name="timepicker1"  /></div>
			        </div>
			        <div class="section last">
			                <label>Fin</label>   
			                <div><input type="text"  id="timepicker2" class="timepicker" readonly="readonly" name="timepicker2"  /></div>
			        </div>
			        <div class="section last">
			                <div>
			                	<a class="uibutton form_rubric" title="Ajout" rel="1" >Ajouter</a>
			                </div>
			        </div>		
			    </div>
			</div>
			{{Form::close()}}
  		</div>
		<!-- End SmartWizard Content -->
		
		<div class="clear"></div> 
    </div>
</div>
<!-- // End onecolumn -->

<div class="clear"></div>
@include('layout.footer')