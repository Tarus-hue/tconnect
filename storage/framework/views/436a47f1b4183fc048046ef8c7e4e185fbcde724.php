<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li>
            <a href="<?php echo e(route('provider.earnings')); ?>"><?php echo app('translator')->getFromJson('provider.profile.partner_earnings'); ?></a>
        </li>
        <!-- <li>
            <a href="#">Invite</a>
        </li> -->
        <li>
            <a href="<?php echo e(route('provider.profile.index')); ?>"><?php echo app('translator')->getFromJson('provider.profile.profile'); ?></a>
        </li>
        <!-- <li>
            <a href="<?php echo e(config('constants.stripe_oauth_url')); ?>">Connect to Stripe</a>
        </li> -->
        <li>
				<a href="<?php echo e(url('provider/notifications')); ?>">
				<?php echo app('translator')->getFromJson('provider.profile.notify'); ?>
				</a>
			</li>
        <li>
            <a href="<?php echo e(url('/provider/logout')); ?>"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <?php echo app('translator')->getFromJson('provider.profile.logout'); ?>
            </a>
            <form id="logout-form" action="<?php echo e(url('/provider/logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </li>
    </ul>
</nav><?php /**PATH C:\xampp\htdocs\t_connect\resources\views/provider/layout/partials/nav.blade.php ENDPATH**/ ?>