<div class="table-responsive">
	<table class="table table-striped table-inverse mb-1">
		<tbody>
			<tr>
				<td><?php echo e(display_date($booking->start_date)); ?> <i class="fa fa-long-arrow-right"></i> <?php echo e(display_date($booking->end_date)); ?></td>
				<td class="text-right"><?php echo e($room->price); ?>*<?php echo e($booking->duration_nights); ?></td>
			</tr>
		</tbody>
	</table>
</div>
<?php /**PATH /home/u510181259/domains/roamnfly.com/public_html/themes/Base/Hotel/Views/frontend/booking/detail-room.blade.php ENDPATH**/ ?>