<div id="kboard-default-editor">
	<form class="kboard-form" method="post" action="<?php echo $url->getContentEditorExecute()?>" enctype="multipart/form-data" onsubmit="return kboard_editor_execute(this);">
		<?php $skin->editorHeader($content, $board)?>

		<?php foreach($board->fields()->getSkinFields() as $key=>$field):?>
			<?php echo $board->fields()->getTemplate($field, $content, $boardBuilder)?>
		<?php endforeach?>

<?php if($board->id == 1):?>
	<!-- 생년월일 입력 필드 추가 -->
	<?php
		wp_enqueue_script('jquery-dropdate', KBOARD_URL_PATH.'/assets/dropdate/jquery-dropdate.js');
		wp_enqueue_script('jquery-dateformat', KBOARD_URL_PATH.'/assets/dropdate/date.format.js');
	?>

	<script>
		jQuery(document).ready(function(){
			jQuery("#birthday").dropdate({
				format:'yyyy.mm.dd',
				minYear: 1980,

			});
		});
	</script>
<?php endif?>


		<div class="kboard-control">
			<div class="left">
				<?php if($content->uid):?>
				<a href="<?php echo $url->getDocumentURLWithUID($content->uid)?>" class="kboard-default-button-small"><?php echo __('Back', 'kboard')?></a>
				<a href="<?php echo $url->set('mod', 'list')->toString()?>" class="kboard-default-button-small"><?php echo __('List', 'kboard')?></a>
				<?php else:?>
				<a href="<?php echo $url->set('mod', 'list')->toString()?>" class="kboard-default-button-small"><?php echo __('Back', 'kboard')?></a>
				<?php endif?>
			</div>
			<div class="right">
				<?php if($board->isWriter()):?>
				<button type="submit" class="kboard-default-button-small"><?php echo __('Save', 'kboard')?></button>
				<?php endif?>
			</div>
		</div>
	</form>
</div>

<?php wp_enqueue_script('kboard-default-script', "{$skin_path}/script.js", array(), KBOARD_VERSION, true)?>