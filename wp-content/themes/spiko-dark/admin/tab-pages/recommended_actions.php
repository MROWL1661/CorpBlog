<?php 
	$spiko_dark_actions = $this->recommended_actions;
	$spiko_dark_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="spiko-dark-tab-pane panel-close">
	<div class="action-list">
		<?php if($spiko_dark_actions): foreach ($spiko_dark_actions as $key => $spiko_dark_action): ?>
		<div class="col-md-6">
			<div class="action" id="<?php echo esc_attr($spiko_dark_action['id']); ?>">
				<div class="action-watch">
				<?php if(!$spiko_dark_action['is_done']): ?>
					<?php if(!isset($spiko_dark_actions_todo[$spiko_dark_action['id']]) || !$spiko_dark_actions_todo[$spiko_dark_action['id']]): ?>
						<span class="dashicons dashicons-visibility"></span>
					<?php else: ?>
						<span class="dashicons dashicons-hidden"></span>
					<?php endif; ?>
				<?php else: ?>
					<span class="dashicons dashicons-yes"></span>
				<?php endif; ?>
				</div>
				<div class="action-inner">
					<h3 class="action-title"><?php echo esc_html($spiko_dark_action['title']); ?></h3>
					<div class="action-desc"><?php echo esc_html($spiko_dark_action['desc']); ?></div>
					<?php echo wp_kses_post($spiko_dark_action['link']); ?>
				</div>
			</div>
		</div>
		<?php endforeach; endif; ?>
	</div>
</div>