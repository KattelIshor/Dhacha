<?php
    if (isset($approved) and $approved == true) {
        $comments = $model->approvedComments;
    } else {
        $comments = $model->comments;
    }
?>

<?php if($comments->count() < 1): ?>
    <div class="alert alert-warning"><?php echo app('translator')->get('comments::comments.there_are_no_comments'); ?></div>
<?php endif; ?>

<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('comments::_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Config::get('comments.guest_commenting') == true): ?>
    <?php echo $__env->make('comments::_form', [
        'guest_commenting' => true
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo app('translator')->get('comments::comments.authentication_required'); ?></h5>
            <p class="card-text"><?php echo app('translator')->get('comments::comments.you_must_login_to_post_a_comment'); ?></p>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><?php echo app('translator')->get('comments::comments.log_in'); ?></a>
        </div>
    </div>
<?php endif; ?>

<div>
    <?php
        $comments = $comments->sortByDesc('created_at');

        if (isset($perPage)) {
            $page = request()->query('page', 1) - 1;

            $parentComments = $comments->where('child_id', '');

            $slicedParentComments = $parentComments->slice($page * $perPage, $perPage);

            $m = Config::get('comments.model'); // This has to be done like this, otherwise it will complain.
            $modelKeyName = (new $m)->getKeyName(); // This defaults to 'id' if not changed.

            $slicedParentCommentsIds = $slicedParentComments->pluck($modelKeyName)->toArray();

            // Remove parent Comments from comments.
            $comments = $comments->where('child_id', '!=', '');

            $grouped_comments = new \Illuminate\Pagination\LengthAwarePaginator(
                $slicedParentComments->merge($comments)->groupBy('child_id'),
                $parentComments->count(),
                $perPage
            );

            $grouped_comments->withPath(request()->url());
        } else {
            $grouped_comments = $comments->groupBy('child_id');
        }
    ?>
    <?php $__currentLoopData = $grouped_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_id => $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($comment_id == ''): ?>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('comments::_comment', [
                    'comment' => $comment,
                    'grouped_comments' => $grouped_comments,
                    'maxIndentationLevel' => $maxIndentationLevel ?? 3
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php if(isset($perPage)): ?>
    <?php echo e($grouped_comments->links()); ?>

<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/vendor/comments/components/comments.blade.php ENDPATH**/ ?>