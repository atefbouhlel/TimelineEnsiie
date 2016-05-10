@include('layout.header')

<div class="onecolumn" >
    <div class="header"><span><span class="ico gray window"></span>  Rubriques  </span></div>
    <div class="clear"></div>
    <div class="content" >
        <?php
        if (isset($msg) && $msg=="inscrit")
        {
            ?>
            <script type="text/javascript">
            alert ("Choisisez votre rubrique");

            </script>
            <?php
                }
                ?>
    @foreach($rubrics as $rubric)
    <a href="{{URL::to('rubriques/'.$rubric->id)}}" >
        <div class="album float" id="">
            <div class="preview" style="margin-bottom:46px;">
                <img width="150" height="150" id="p1" class="stackphotos" src="{{URL::asset($event->url_photo_couverture)}}" alt="Thumbnail" />
                <div style="clear:both"></div>
            </div>
            <div class="title">{{$rubric->name}}</div>
            <div class="stats">{{$rubric->start}}</div>
			<div class="stats">{{$rubric->end}}</div>
            <div class="clear"></div>
        </div> 
    </a> 
    @endforeach
        <div class=" clear"></div>
    </div>
</div>
<!-- // End onecolumn -->

<div class="clear"></div>
@include('layout.footer')