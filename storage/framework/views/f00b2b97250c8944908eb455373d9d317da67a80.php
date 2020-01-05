<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Uploaded Apps</title>
  <!--Bootstrap cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
 /* Remove rounded borders from list */
.list-group-item:first-child {
  border-top-right-radius: 0;
  border-top-left-radius: 0;
}

.list-group-item:last-child {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

/* Remove border and add padding to thumbnails */
.thumbnail {
  padding: 0 0 15px 0;
  border: none;
  border-radius: 0;

}

.img-resize{
height: 150px;
width: 200px;
object-fit: cover;
object-position: center center;
}

.thumbnail p {
  margin-top: 15px;
  color: #f1f1f1;
}

/* Black buttons with extra padding and without rounded borders */
.btnThumbnail {
  padding: 10px 20px;
  background-color: #333;
  color: #f1f1f1;
  border-radius: 0;
  transition: .2s;
}

/* On hover, the color of .btn will transition to white with black text */
.btnThumbnail:hover, .btn:focus {
  border: 1px solid #333;
  background-color: #ffe6e6;
  color: #330000;
   
} 
</style>
</head>
<body>
   <div class="container">

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="<?php echo e(url('/app_upload')); ?>">Upload App</a></li>
            
        </ol>

    <div class="row justify-content-center">

       

        <div class="col-md-9">
        
    <div class="row text-center">

    <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $App): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-sm-6">
      <div class="thumbnail">
        <img class="img-responsive img-resize" src="<?php echo e(url('../')); ?>/public/apps/<?php echo e($App); ?>" alt="App">
        
        
        <p>
        <a href="<?php echo e(url('/download')); ?>/<?php echo e($App); ?>" class="btnThumbnail" role="button">Download</a>
        <a href="" class="btnThumbnail" role="button">Delete</a>
        </p>
      </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
     
        </div>
    </div>
</div>
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
</body>
</html><?php /**PATH /var/www/html/my_app/resources/views//view_apps.blade.php ENDPATH**/ ?>