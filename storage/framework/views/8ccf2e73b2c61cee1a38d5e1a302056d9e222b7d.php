<!-- BASIC MODAL -->
<div id="modaldemo2" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><?php echo e($title); ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo e($form); ?>

                <div class="modal-body" style="width: 500px">
                    <?php echo e($body); ?>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
<?php /**PATH D:\xampp\htdocs\halumshop-master\resources\views/components/insert.blade.php ENDPATH**/ ?>