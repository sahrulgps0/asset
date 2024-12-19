<?php $__empty_1 = true; $__currentLoopData = @$transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr>
    <td><?php echo e(@$transaction->user->fullname); ?></td>
    <td><?php echo e(@$transaction->gateway->gateway_name); ?></td>
    <td><?php echo e(@$transaction->transaction_id); ?></td>
    <td><?php echo e(@number_format($transaction->amount,2)); ?></td>
    <td><?php echo e(@number_format($transaction->rate,2)); ?></td>
    <td><?php echo e(@number_format($transaction->charge,2)); ?></td>
    <td><?php echo e(@number_format($transaction->final_amount,2)); ?></td>
    <td>
        <?php if($transaction->payment_type == 1): ?>
            <span class="badge badge-success"><?php echo e(__('Autometic')); ?></span>
        <?php else: ?>
            <span class="badge badge-info"><?php echo e(__('Manual')); ?></span>
        <?php endif; ?>
    </td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr>
    <td colspan="8" class="text-center"><?php echo e(__('No Data Found')); ?>

    </td>
</tr>
<?php endif; ?><?php /**PATH /home/gerr4748/public_html/ava-trade.asia/core/resources/views/backend/report/payment_ajax.blade.php ENDPATH**/ ?>