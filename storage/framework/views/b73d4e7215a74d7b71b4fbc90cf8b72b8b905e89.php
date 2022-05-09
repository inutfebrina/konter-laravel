

<?php $__env->startSection('title'); ?>
Update Data Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h3>Edit Data Barang</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('update-barang',$barang->id)); ?>" method="post" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-groub">
                                <label for="">
                                    Kode Barang
                                </label>
                                <input type="text" name="kd_barang" class="form-control" placeholder="Kode Barang"
                                    value="<?php echo e($barang->kd_barang); ?>"> </div>

                            <div class="form-groub">
                                <label for="">
                                    Nama Barang
                                </label>
                                <input type="text" name="nm_barang" class="form-control" placeholder="Nama Barang"
                                    value="<?php echo e($barang->nm_barang); ?>"> </div>
                                    <div class="form-groub">
                                <label for="">
                                    Kategori
                                </label>
                                <select class="form-control" name="unit" id="">
                                    <option value="">-SELECT- </option>

                                    
                                </select> </div>
                                    <div class="form-groub">
                                <label for="">
                                    Harga Beli
                                </label>
                                <input type="text" name="harga_bl" class="form-control" placeholder="Harga Beli"
                                    value="<?php echo e($barang->harga_bl); ?>"> </div>
                                    </div>

<div class="col-md-6">
                                    <div class="form-groub">
                                     
                                <label for="">
                                    Harga Jual
                                </label>
                                <input type="text" name="harga_jl" class="form-control" placeholder="Harga Jual"
                                    value="<?php echo e($barang->harga_jl); ?>"> </div>
                        

                            <div class="form-groub">
                                <label for="">
                                    Stok
                                </label>
                                <input type="text" name="stok" class="form-control" placeholder="Stok"
                                    value="<?php echo e($barang->stok); ?>"></div>
                            
                            <div class="form-groub">
                                <label for="">
                                    Unit
                                </label>
                                <select class="form-control" name="unit" id="">
                                    <option value="">-SELECT- </option>

                                    <option value="PCS" <?=$barang->unit== 'PCS'? 'selected' : ''?>>PCS
                                    </option>
                                    <option value="Pack" <?=$barang->unit== 'Pack'? 'selected' : ''?>>Pack
                                    </option>
                                </select></div>
                                <div class="form-groub">
                            <label for="">
                                Terjual
                            </label>
                            <input type="text" name="terjual" class="form-control" placeholder="Terjual"
                                    value="<?php echo e($barang->terjual); ?>"></div></div> </div>
                                <br />
                                
                         <div class="form-groub">
                                    <button type="submit" class="btn btn-success btn-block" > Update</button> 
                                    </div>
                                
                                   
                               
                    
            
        </form> <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\mediatama\konter\resources\views/page/editbarang.blade.php ENDPATH**/ ?>