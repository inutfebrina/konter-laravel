

<?php $__env->startSection('title'); ?>
Update Data Sub Kategori
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h3>Edit Data Sub Kategori</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('update-kategori',$kategori->id)); ?>" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-groub">
                                <label for="">
                                    Kategori
                                </label>
                                <input type="text" name="nama" class="form-control" placeholder="Kategori"
                                    value="<?php echo e($kategori->nama); ?>"> </div>
                                    <div class="form-groub">
                                    <label for="">
                               Sub Kategori
                            </label>

                            <input type="text" name="kategori" class="form-control" placeholder="Sub Kategori"
                            value="<?php echo e($kategori->provider); ?>"> </div>
                                  
                                <br />
                                
                         <div class="form-groub">
                                    <button type="submit" class="btn btn-success btn-block" > Update</button> 
                                   </div> </div> </div>
                                
                                   
                               
                    
            
        </form> <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\mediatama\konter\resources\views/page/editkategori.blade.php ENDPATH**/ ?>