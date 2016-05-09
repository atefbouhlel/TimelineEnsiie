<div id="footer"> &copy; Copyright 2016 <span class="tip"><a  href="#" title="ENSIIE" >ENSIIE</a> </span> </div>
                </div> <!-- End inner -->
            </div> <!-- End content --> 


        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="components/flot/excanvas.min.js"></script><![endif]-->
        
        <script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/ui/jquery.ui.min.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('components/ui/jquery.autotab.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/ui/timepicker.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/datatables/dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/filestyle/jquery.filestyle.js')}}" ></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $( "#datepick" ).datepicker({
                    dateFormat: "yy-mm-dd",
                    monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                    dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ]
                });                
            });
            var getRubrics="{{URL::to('rubric/getRubrics')}}";
            var chargement="{{URL::to('rubriques')}}";
            var addComment="{{URL::to('addComment')}}";
            var addJaime="{{URL::to('addJaime')}}";
            var deleteJaime="{{URL::to('deleteJaime')}}";
            var searchPath="{{URL::to('search')}}";
        </script>
        <script type="text/javascript" src="{{URL::asset('js/script.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/search.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/fancybox/jquery.fancybox.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/chosen/chosen.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/confirm/jquery.confirm.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/vticker/jquery.vticker-min.js')}}"></script>
        <!--<script type="text/javascript" src="components/flot/flot.resize.min.js"></script>-->
        <script type="text/javascript" src="{{URL::asset('components/uploadify/uploadify.js')}}"></script>  
        <!--Effet alert-->
        <script type="text/javascript" src="{{URL::asset('components/effect/jquery-jrumble.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('components/Jcrop/jquery.Jcrop.js')}}" ></script>
        <script type="text/javascript" src="{{URL::asset('components/imgTransform/jquery.transform.js')}}" ></script>
		<script type="text/javascript" src="{{URL::asset('components/dualListBox/dualListBox.js')}}"  ></script>
        <!--newEvent.php-->
		<script type="text/javascript" src="{{URL::asset('components/smartWizard/jquery.smartWizard.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/jquery.cookie.js')}}"></script>  
        
        
</body>
</html>