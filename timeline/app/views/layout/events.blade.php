@include('layout.header')

<div class="onecolumn" >
    <div class="header"><span><span class="ico gray window"></span>  évenements  </span></div>
    <div class="clear"></div>
    <div class="content" >
    @for($i=0;$i<12;$i++) 
        <div class="album float" id="">
            <div class="preview">
                <img width="150" id="p1" class="stackphotos" src="{{URL::asset('images/exampic/25.jpg')}}" alt="Thumbnail" />
                <div style="clear:both"></div>
            </div>
            <div class="title">Soirée d'Or</div>
            <div class="stats">02/10/2012</div>
            <div class="clear"></div>
        </div>  
    @endfor
        <div class=" clear"></div>
    </div>
</div>
<!-- // End onecolumn -->

<div class="clear"></div>
@include('layout.footer')