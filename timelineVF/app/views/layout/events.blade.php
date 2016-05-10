@include('layout.header')

<div class="onecolumn" >
    <div class="header"><span><span class="ico gray window"></span>  évenements  </span></div>
    <div class="clear"></div>
    <div class="content" >
        <?php
        if (isset($msg) && $msg=="inscrit")
        {
            ?>
            <script type="text/javascript">
            alert ("Vous êtes inscrit avec succées! vous pouvez maintenant consulter les photos des soirées");

            </script>
            <?php
                }
                ?>
    @foreach($events as $event)
    <a href="{{URL::to('rubriques/'.$event->id)}}" >
        <div class="album float" id="">
            <div class="preview" style="margin-bottom:46px;">
                <img width="150" height="150" id="p1" class="stackphotos" src="{{URL::asset($event->url_photo_couverture)}}" alt="Thumbnail" />
                <div style="clear:both"></div>
            </div>
            <div class="title">{{$event->name}}</div>
            <div class="stats">{{$event->date}}</div>
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

