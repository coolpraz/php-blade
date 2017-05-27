<?php $__env->startSection('title'); ?>
Test Title
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo e(isset($name) ? $name : 'Default'); ?><br>
<?php echo e(isset($name) ? $name : 'Still Default'); ?><br>


<?php echo e('<script type="text/javascript">alert("Hacked!");</script>'); ?><br>


<?php $name = '<strong>John Doe</strong>' ?>
Hello, <?php echo $name; ?>.<br>


<?php echo $__env->make('variables', ['name' => $name], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <br>



<?php
$dateObj = new DateTime('2017-01-01 23:59:59');
?>


<?php echo with($dateObj)->format('m/d/Y H:i:s'); ?> <br>


<?php echo with($dateObj)->format('F d, Y g:i a'); ?> <br>


<?php if (! ($auth_check = false)): ?>
    You are not signed in.
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <?php if(count($users) > 0): ?>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user['id']); ?></td>
                        <td><?php echo e($user['name']); ?></td>
                        <td><?php echo e($user['email']); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No users found!</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>