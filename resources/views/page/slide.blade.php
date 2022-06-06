<section id="slider"><!--slider-->

        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i=0; ?>
                @foreach ($slide as $sl )

                <li data-target="#slider-carousel" data-slide-to="{{$i}}"
                @if ($i == 0)
                class="active"
                @endif ></li>
                <?php $i++; ?>

                @endforeach
            </ol>

            <div class="carousel-inner">
                <div class="carousel-inner">
                    <?php $i=0; ?>
                    @foreach ($slide as $slide )
                    <div
                    @if ($i == 0)
                    class="item active"
                    @else
                    class="item"
                    @endif
                    >
                        <div class="col-sm-12">
                            <div class="slide-content">
                                <h1><span>{{$slide->name}}</span></h1>
                                <h2 style="color: white">{{$slide->tittle}}</h2>
                                <p style="color: white">{{$slide->content}}</p>
                                {{-- <a href="#" class="btn btn-default get">Đặt Món Ngay</a> --}}
                            </div>
                            <img src="source/image/home/{{$slide->image}}" class="img img-responsive" alt=""/>
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach


                </div>


            </div>

            <a href="#slider-carousel" class="left control-carousel " data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel " data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

</section><!--/slider-->


<style>
    #slider-carousel{
        position: relative;
    }
    .left.control-carousel{

        color: orange;
        position: absolute;
        left: 150px;



    }
    .right.control-carousel{

        color: orange;
        position: absolute;
        right: 150px;




    }

    .slide-content{
      position: absolute;

      }
      img.img.img-responsive {
       height: 400px;
       width: 1195px;

       padding-right: 60px;
        }
</style>
