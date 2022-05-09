

<?php $__env->startSection('title'); ?>
Input Data User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h3>Tambah Data user</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('simpan-user')); ?>" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-groub">
                                <label for="">
                                    Nama
                                </label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama"> </div>

                        <div class="form-groub">
                            <label for="">
                                No Telpon
                            </label>
                            <input type="text" name="no_telp" class="form-control" placeholder="No Telpon"> </div>
                        <div class="form-groub">
                            <label for="">
                                Alamat
                            </label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat"> </div>
                    </div>

                    <div class="col-md-6">



                        <div class="form-groub">
                            <label for="">
                                Email
                            </label>
                            <input type="text" name="email" class="form-control" placeholder="Email"></div>
                        <div class="form-groub">
                            <label for="">
                                Gambar
                            </label>
                            <input type="file" name="gambar" class="form-control" ></div>
                        <div class="form-groub">
                            <label for="">
                                Jenis Kelamin
                            </label>
                            <select class="form-control" name="jk">
                                <option value="">
                                    -SELECT-
                                </option>
                                <option value="laki-laki">
                                    Laki-Laki
                                </option>
                                <option value="perempuan">
                                    Perempuan
                                </option></select></div>
                                <br /></div> </div>
                         <div class="form-groub">
                                    <button type="submit" class="btn btn-success btn-block" > Simpan</button> 
                                   </div> 
                                        </form> <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\mediatama\konter\resources\views/page/inputuser.blade.php ENDPATH**/ ?>