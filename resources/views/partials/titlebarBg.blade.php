<!--Page Header-->
<section class="page_header padding-top" style="background: url('public/assets/images/{{\Request::route()->getName()}}.jpg'); background-repeat: repeat-x; background-size: 100%">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <br>
        <h1>{!! $title !!}</h1>
        <p>{!! $tagLine !!}</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="{!!url('/')!!}">Home</a> <span><i class="fa fa-angle-double-right"></i>{!! $title !!}</span>
      </div>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->
<!--Page Header-->