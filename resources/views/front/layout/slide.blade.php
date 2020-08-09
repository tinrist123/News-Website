<!-- slider -->
<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i = 0; ?>
                @foreach($slide as $item)
                <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="{{ ($i==0)?'active':null }}"></li>
                <?php $i++ ?>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <?php $i = 0; ?>
                @foreach($slide as $item)
                <div class="item {{ ($i==0)?'active':null }}">
                    <img class="slide-image" src="{{ asset('public/upload/slide/'. $item->Hinh) }}" alt="">
                </div>
                <?php $i++; ?>
                @endforeach
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
<!-- end slide -->