<div id="footer"> &copy; Copyright 2016 <span class="tip"><a  href="#" title="ENSIIE" >ENSIIE</a> </span> </div>
                </div> <!-- End inner -->
            </div> <!-- End content --> 


        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="components/flot/excanvas.min.js"></script><![endif]-->
        
        <script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/ui/jquery.ui.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/ui/timepicker.js')}}"></script>        
        <script type="text/javascript" src="{{URL::asset('components/filestyle/jquery.filestyle.js')}}" ></script>
        <script type="text/javascript">
            $(document).ready(function() {

                //initialisation
                var date = new Date();
                var y = date.getFullYear();
                $("#select").children("option:nth-child(1)").text(y);
                $("#select").children("option:nth-child(1)").attr('value',y);
              $("#select").children("option:nth-child(2)").text(y+1);
              $("#select").children("option:nth-child(2)").attr('value',y+1);
              $("#select").children("option:nth-child(3)").text(y+2);
              $("#select").children("option:nth-child(3)").attr('value',y+2);
              $("#select").children("option:nth-child(4)").text(y+3);
              $("#select").children("option:nth-child(4)").attr('value',y+3);
              $("#select").children("option:nth-child(5)").text(y+4);
              $("#select").children("option:nth-child(5)").attr('value',y+4);
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
            var users;
        </script>
        @if(isset($users))
            <script type="text/javascript">
                users={{$users}};
            </script>
            <script type="text/javascript" src="{{URL::asset('js/search.js')}}"></script>
        @endif
        <script type="text/javascript" src="{{URL::asset('js/script.js')}}"></script>        
        <script type="text/javascript" src="{{URL::asset('components/fancybox/jquery.fancybox.js')}}"></script>
        <!--input select avec recherche-->
        <script type="text/javascript" src="{{URL::asset('components/chosen/chosen.js')}}"></script>        
        <!--Effet alert-->
        <script type="text/javascript" src="{{URL::asset('components/effect/jquery-jrumble.js')}}"></script>
		<!--newEvent.php-->
		<script type="text/javascript" src="{{URL::asset('components/smartWizard/jquery.smartWizard.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/jquery.cookie.js')}}"></script>  
        
        
</body>
</html>