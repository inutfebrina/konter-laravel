<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>INVOICE</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media  only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /* RTL */
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                INVOICE KONTER
                            </td>
                        </tr>
                        <tr>
                            <td>TANGGAL TRANSAKSI  
                                <br>ID TRANSAKSI
                            </td>
                            <td><?php echo e($trans->tgl); ?>

                                <br>TRANS-0<?php echo e($trans->id_trans); ?>

                            </td>
                        </tr>
                      
                    </table>
               






            <tr class="heading">
                <td>
                    Nama Barang
                </td>
                <td>Quantity</td>
                <td>
                    Harga
                </td>
                <td>Total</td>
            </tr>
            <?php ($total = 0); ?>
            <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ($total += $isi->total); ?>
            <tr class="item">
                <td>
                    <?php echo e($isi->nm_barang); ?>

                </td>
                <td><?php echo e($isi->terjual); ?></td>
                <td>
                    <?php echo e($isi->harga_jl); ?>

                </td>
                <td>
                    <?php echo e($isi->total); ?>

                </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr class="total">
                <td></td>

                <td>
                    Total Bayar: Rp.
                </td>
                <td></td>
                <td><?php echo e($total); ?></td>
            </tr>
        </table>
    </div>
</body>

</html>
<script>
    window.print()

</script>
<?php /**PATH D:\konter\resources\views/page/cetaktrans.blade.php ENDPATH**/ ?>