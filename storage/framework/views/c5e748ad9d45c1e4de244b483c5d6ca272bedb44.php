

<?php $__env->startSection('title'); ?>
Update Data Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h3>Edit Kategori</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('update-data',$data->id_data)); ?>" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            

                            <div class="form-groub">
                                <label for="">
                                    Kategori
                                </label>
                                <input type="text" name="nama" class="form-control" placeholder="Kategori"
                                    value="<?php echo e($data->nama); ?>"> </div>
                            
                                  
                                <br />
                                
                         <div class="form-groub">
                                    <button type="submit" class="btn btn-success btn-block" > Update</button> 
                                   </div> </div> </div>
                                
                                   
                               
                    
            
        </form> <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\konter\resources\views/page/editdata.blade.php ENDPATH**/ ?>