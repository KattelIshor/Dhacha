<?php $markdown = app('Parsedown'); ?>
<?php
    // TODO: There should be a better place for this.
    $markdown->setSafeMode(true);
?>

<div id="comment-<?php echo e($comment->getKey()); ?>" class="media">
    <img class="mr-3" src="https://www.gravatar.com/avatar/<?php echo e(md5($comment->commenter->email ?? $comment->guest_email)); ?>.jpg?s=64" alt="<?php echo e($comment->commenter->name ?? $comment->guest_name); ?> Avatar">
    <div class="media-body">
        <h5 class="mt-0 mb-1"><?php echo e($comment->commenter->name ?? $comment->guest_name); ?> <small class="text-muted">- <?php echo e($comment->created_at->diffForHumans()); ?></small></h5>
        <div style="white-space: pre-wrap;"><?php echo $markdown->line($comment->comment); ?></div>

        <div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply-to-comment', $comment)): ?>
                <button data-toggle="modal" data-target="#reply-modal-<?php echo e($comment->getKey()); ?>" class="btn btn-sm btn-link text-uppercase"><?php echo app('translator')->get('comments::comments.reply'); ?></button>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-comment', $comment)): ?>
                <button data-toggle="modal" data-target="#comment-modal-<?php echo e($comment->getKey()); ?>" class="btn btn-sm btn-link text-uppercase"><?php echo app('translator')->get('comments::comments.edit'); ?></button>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-comment', $comment)): ?>
                <a href="<?php echo e(route('comments.destroy', $comment->getKey())); ?>" onclick="event.preventDefault();document.getElementById('comment-delete-form-<?php echo e($comment->getKey()); ?>').submit();" class="btn btn-sm btn-link text-danger text-uppercase"><?php echo app('translator')->get('comments::comments.delete'); ?></a>
                <form id="comment-delete-form-<?php echo e($comment->getKey()); ?>" action="<?php echo e(route('comments.destroy', $comment->getKey())); ?>" method="POST" style="display: none;">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                </form>
            <?php endif; ?>
        </div>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-comment', $comment)): ?>
            <div class="modal fade" id="comment-modal-<?php echo e($comment->getKey()); ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="<?php echo e(route('comments.update', $comment->getKey())); ?>">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo app('translator')->get('comments::comments.edit_comment'); ?></h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message"><?php echo app('translator')->get('comments::comments.update_your_message_here'); ?></label>
                                    <textarea required class="form-control" name="message" rows="3"><?php echo e($comment->comment); ?></textarea>
                                    <small class="form-text text-muted"><?php echo app('translator')->get('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax']); ?></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal"><?php echo app('translator')->get('comments::comments.cancel'); ?></button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase"><?php echo app('translator')->get('comments::comments.update'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply-to-comment', $comment)): ?>
            <div class="modal fade" id="reply-modal-<?php echo e($comment->getKey()); ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="<?php echo e(route('comments.reply', $comment->getKey())); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo app('translator')->get('comments::comments.reply_to_comment'); ?></h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message"><?php echo app('translator')->get('comments::comments.enter_your_message_here'); ?></label>
                                    <textarea required class="form-control" name="message" rows="3"></textarea>
                                    <small class="form-text text-muted"><?php echo app('translator')->get('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax']); ?></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal"><?php echo app('translator')->get('comments::comments.cancel'); ?></button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase"><?php echo app('translator')->get('comments::comments.reply'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <br />

        <?php
            if (!isset($indentationLevel)) {
                $indentationLevel = 1;
            } else {
                $indentationLevel++;
            }
        ?>

        
        <?php if($grouped_comments->has($comment->getKey()) && $indentationLevel <= $maxIndentationLevel): ?>
            
            <?php $__currentLoopData = $grouped_comments[$comment->getKey()]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('comments::_comment', [
                    'comment' => $child,
                    'grouped_comments' => $grouped_comments
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>
</div>


<?php if($grouped_comments->has($comment->getKey()) && $indentationLevel > $maxIndentationLevel): ?>
    
    <?php $__currentLoopData = $grouped_comments[$comment->getKey()]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('comments::_comment', [
            'comment' => $child,
            'grouped_comments' => $grouped_comments
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/vendor/comments/_comment.blade.php ENDPATH**/ ?>