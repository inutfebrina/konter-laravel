

<?php $__env->startSection('title'); ?>
Input Data Sub Kategori
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h3>Tambah Data Sub Kategori</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('simpan-kategori')); ?>" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                           
                       
                            
                           
                            <div class="form-groub">
                           
                            <label for="">
                                Sub Kategori
                            </label>

                            <input type="text" name="provider" class="form-control" placeholder="Sub Kategori"> </div>
                            <div class="form-groub">
                            <label for="">
                                Gambar
                            </label>
                            <input type="file" name="gambar" class="form-control" ></div>  
                            <br />
                         <div class="form-groub">
                                    <button type="submit" class="btn btn-success btn-block" > Simpan</button> 
                                   </div> </div> </div></div> 
                                        </form> <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\konter\resources\views/page/inputkategori.blade.php ENDPATH**/ ?>