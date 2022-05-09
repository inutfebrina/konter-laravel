

<?php $__env->startSection('title'); ?>
Detail Transaksi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="fload-left">
                    <h3> Detail Transaksi</h3>
                </div>
               
           
            <table  class="table">
            <tr>
                        <td>Tanggal Transaksi</td>
                            <td><?php echo e($trans->tgl); ?></td>
                       <td></td>
                           </tr><tr>
                       
                        <td>ID Transaksi</td>
                            <td>TRANS-0<?php echo e($trans->id_trans); ?></td>
                            <td></td>
                        </tr>
</table>
</div>
            <div class="card-body">
            
                <table class="table">
               
                    <thead>
                    
                        <tr>
                        <th> No</th>
                            <th> Nama Barang</th>
                            <th>Kategori</th>
                            <th>Sub Kategori</th>
                            <th>Harga</th>
                            <th> Quantity</th>
                            <th> Keterangan</th>
                            <th> Total</th>
                        </tr>
                    </thead>
                   <tbody>
                   <?php ($total = 0); ?>
                   <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php ($total += $isi->total); ?>
                        <tr>
                            <td> <?php echo e($i+1); ?></td>
                            <td> <?php echo e($isi->nm_barang); ?> </td>
                            <td> <?php echo e($isi->nama); ?> </td>
                            <td> <?php echo e($isi->provider); ?> </td>
                            <td> <?php echo e($isi->harga_jl); ?> </td>
                           <td> <?php echo e($isi->terjual); ?> </td>
                            <td> <?php echo e($isi->ket); ?> </td>
                            <td> <?php echo e($isi->total); ?> </td>
                           
                        </tr>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        <tr>
                           <td></td>
                            <td colspan="6">Total Bayar</td>
                            <td ><?php echo e($total); ?></td>
                                                </tr>
                   </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\konter\resources\views/page/dettrans.blade.php ENDPATH**/ ?>