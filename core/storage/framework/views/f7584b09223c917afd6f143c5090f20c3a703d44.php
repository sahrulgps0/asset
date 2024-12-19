<?php
$content = content('faq.content');
$elements = element('faq.element');
?>

<section class="faq-section sp_pt_120 sp_pb_120 sp_separator_bg" style="background-image: url('<?php echo e(asset('asset/theme3/images/bg/bg3.jpg')); ?>')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="sp_site_header">
                    <h2 class="sp_site_title"><?php echo e(@$content->data->title); ?></h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-3">
            <div class="col-md-10">
                <div class="accordion" id="accordionExample">
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-<?php echo e($loop->iteration); ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo e($loop->iteration); ?>" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    <?php echo e(@$item->data->question); ?>

                                </button>
                            </h2>
                            <div id="collapse<?php echo e($loop->iteration); ?>" class="accordion-collapse collapse"
                                aria-labelledby="heading-<?php echo e($loop->iteration); ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p> <?php echo e(@$item->data->answer); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/gerr4748/public_html/ava-trade.asia/core/resources/views/theme3/sections/faq.blade.php ENDPATH**/ ?>