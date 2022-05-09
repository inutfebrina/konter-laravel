

<?php $__env->startSection('title'); ?>
Input Data Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h3>Tambah Data Kategori</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('simpan-data')); ?>" method="post">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                           
                        <div class="form-groub">
                            <label for="">
                                Kategori
                            </label>
                            <input type="text" name="nama" class="form-control" placeholder="Kategori"> </div>
                        
                                <br />
                         <div class="form-groub">
                                    <button type="submit" class="btn btn-success btn-block" > Simpan</button> 
                                   </div> </div> </div>
                                        </form> <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\mediatama\konter\resources\views/page/inputdata.blade.php ENDPATH**/ ?>