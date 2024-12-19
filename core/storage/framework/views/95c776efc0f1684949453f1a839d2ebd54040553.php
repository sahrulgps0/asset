<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">

        <div class="mobile-page-header">
            <h5 class="title"><?php echo e(__('Transaction History')); ?></h5>
            <a href="<?php echo e(route('user.dashboard')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
        </div>

        <div class="site-card">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                <h5 class="mb-sm-0 mb-2"><?php echo e(__('Transaction Log')); ?></h5>
                <form action="" method="get" class="d-inline-flex">
                    <input type="text" name="trx" class="form-control form-control-sm me-2" placeholder="transaction id">
                    <input type="date" class="form-control form-control-sm me-3" placeholder="Search User" name="date">
                    <button type="submit" class="btn main-btn btn-sm"><?php echo e(__('Search')); ?></button>
                </form>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table site-table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Trx')); ?></th>
                                <th><?php echo e(__('User')); ?></th>
                                <th><?php echo e(__('Gateway')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Currency')); ?></th>
                                <th><?php echo e(__('Charge')); ?></th>
                                <th><?php echo e(__('Details')); ?></th>
                                <th><?php echo e(__('Payment Date')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-caption="<?php echo e(__('Trx')); ?>"><?php echo e($transaction->trx); ?></td>
                                    <td data-caption="<?php echo e(__('User')); ?>"><?php echo e(@$transaction->user->fname . ' ' . @$transaction->user->lname); ?></td>
                                    <td data-caption="<?php echo e(__('Gateway')); ?>"><?php echo e(@$transaction->gateway->gateway_name ?? 'Account Transfer'); ?></td>
                                    <td data-caption="<?php echo e(__('Amount')); ?>"><?php echo e($transaction->amount); ?></td>
                                    <td data-caption="<?php echo e(__('Currency')); ?>"><?php echo e($transaction->currency); ?></td>
                                    <td data-caption="<?php echo e(__('Charge')); ?>"><?php echo e($transaction->charge . ' ' . $transaction->currency); ?></td>
                                    <td data-caption="<?php echo e(__('Details')); ?>"><?php echo e($transaction->details); ?></td>
                                    <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($transaction->created_at->format('Y-m-d')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-center" colspan="100%">
                                        <?php echo e(__('No Transaction Found')); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if($transactions->hasPages()): ?>
                        <?php echo e($transactions->links()); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecanyon\kawsar_new\hyip\7.6\Scripts\core\resources\views/theme3/user/transaction.blade.php ENDPATH**/ ?>