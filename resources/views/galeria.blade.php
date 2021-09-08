@extends('layout')

@section('section')

<section class="section section__galeria">
  <div class="galeria__container">
    {{--@foreach(File::glob('img/galeria/big'.'/*') as $path)--}}
    @foreach(File::glob(public_path('img/galeria/big').'/*') as $path)
      <?php 
      $explodedPath = explode('/', $path);
      $file = end($explodedPath);
      $fileName = substr($file, 0, strrpos($file, '.'));
      ?>
      <img data-aos="zoom-in" class="galeria__container__img" id="{{$fileName}}" src="img/galeria/big/{{ $fileName }}.jpg" onclick="viewImage('{{$fileName}}')">
    @endforeach
  </div>

  <div class="galeria__image_viewer image_viewer__inactive">
    <div onclick="closeViewer()" class="galeria__image_viewer__close"><?php require('imports/svg/close.svg');?></div>
    <div class="galeria__image_viewer__container">
    <div onclick="moveBackward()" style="transform: rotate(180deg);"><?php require('svg/galeria/right-arrow.svg');?></div>
    <img class="viewer__img" id="viewer__img" src="img/galeria/big/1.jpg" alt="">
    <div onclick="moveForward()"><?php require('svg/galeria/right-arrow.svg');?></div>
  </div>

<script>
function closeViewer() {
  $(".galeria__image_viewer").removeClass("image_viewer__active");
  $(".galeria__image_viewer").addClass("image_viewer__inactive");
}
function viewImage(selfItem) {
  $(".galeria__image_viewer").removeClass("image_viewer__inactive");
  $(".galeria__image_viewer").addClass("image_viewer__active");
  var id=$(this).attr("id");
  $(".viewer__img").attr("src","img/galeria/big/" + selfItem + ".jpg");
  $(".viewer__img").attr("id",selfItem);
}
function moveForward() {
  var id=$(".viewer__img").attr("id");
  var id = parseInt(id);
  if(id<25){
    var newId = id +1;
  }else{
    var newId = 1;
  }
  $(".viewer__img").attr("src","img/galeria/big/" + newId + ".jpg");
  $(".viewer__img").attr("id",newId);

}
function moveBackward() {
  var id=$(".viewer__img").attr("id");
  var id = parseInt(id);
  if(id>1){
    var newId = id - 1;
  }else{
    var newId = 25;
  }
  $(".viewer__img").attr("src","img/galeria/big/" + newId + ".jpg");
  $(".viewer__img").attr("id",newId);
}
</script>

</section>


@endsection