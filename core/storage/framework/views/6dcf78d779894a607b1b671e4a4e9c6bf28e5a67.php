<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">

        <div class="mobile-page-header">
            <h5 class="title"><?php echo e(__('Payment Informations')); ?></h5>
            <a href="<?php echo e(route('user.deposit')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="site-card">
                    <div class="card-header text-center">
                        <h5 class="mb-0"><?php echo e(__('Payment Preview')); ?></h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php if(!(session('type') == 'deposit')): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Plan Name')); ?>:</span>
                                <span><?php echo e($deposit->plan->plan_name); ?></span>
                            </li>
                            <?php endif; ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Gateway Name')); ?>:</span>
                                <span><?php echo e($deposit->gateway->gateway_name); ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Amount')); ?>:</span>
                                <span><?php echo e(number_format($deposit->amount, 2)); ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Charge')); ?>:</span>
                                <span><?php echo e(number_format($deposit->charge, 2)); ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Conversion Rate')); ?>:</span>
                                <span><?php echo e('1 ' . @$general->site_currency . ' = ' . number_format($deposit->rate, 2)); ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-medium"><?php echo e(__('Total Payable Amount')); ?>:</span>
                                <span><?php echo e(number_format($deposit->final_amount, 2)); ?></span>
                            </li>
                        </ul>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn main-btn w-100 paystack" data-amount="<?php echo e(number_format($deposit->final_amount, 2,'.','')); ?>"><?php echo e(__('Pay With Paystack')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    session()->forget('transaction_id');
    session()->put('transaction_id', $deposit->transaction_id);
    ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
        $(function() {
            'use strict'
            $('.paystack').on('click', function(e) {
                e.preventDefault();
                payWithPaystack($(this).data('amount'))
            })
        })




            function payWithPaystack(amount) {
                var handler = PaystackPop.setup({
                    key: "<?php echo e($deposit->gateway->gateway_parameters->paystack_key); ?>", // Replace with your public key
                    email: "<?php echo e(auth()->user()->email); ?>",
                    amount: amount * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                    currency: "<?php echo e($deposit->gateway->gateway_parameters->gateway_currency); ?>", // Use GHS for Ghana Cedis or USD for US Dollars
                    ref: "<?php echo e($deposit->transaction_id); ?>", // Replace with a reference you generated
                    callback: function(response) {

                        var reference = response.reference;

                        window.location = "<?php echo e(route('user.paystack.success')); ?>?reference=" + response.reference
                    },
                    onClose: function() {
                        alert('Transaction was not completed, window closed.');
                    },
                });
                handler.openIframe();
            }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecanyon\kawsar_new\hyip\7.6\Scripts\core\resources\views/theme3/user/gateway/paystack.blade.php ENDPATH**/ ?>