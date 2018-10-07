<?php if($list->total == 0): ?>
	<script>
		window.location.href = '<?php echo $url->getContentEditor() ?>';
	</script>
<?php endif?>

<div id="kboard-default-list">

	<!-- 리스트 시작 -->
	<div class="kboard-list">
		<table>
			<thead>
				<tr>
					<td class="kboard-list-uid"><?php echo __('Number', 'kboard')?></td>
					<td class="kboard-list-title"><?php echo __('Title', 'kboard')?></td>
					<td class="kboard-list-name">참가자</td>
					<td class="kboard-list-birthday">생년월일</td>
					<td class="kboard-list-participation">참가분야</td>
					<td class="kboard-list-date"><?php echo __('Date', 'kboard')?></td>

				</tr>
			</thead>
			<tbody>
				<?php while($content = $list->hasNext()):?>
				<tr class="<?php if($content->uid == kboard_uid()):?>kboard-list-selected<?php endif?>">
					<td class="kboard-list-uid"><?php echo $list->index()?></td>
					<td class="kboard-list-title">
						<a href="<?php echo $url->getDocumentURLWithUID($content->uid)?>">
							<div class="kboard-default-cut-strings">
								<?php if($content->isNew()):?><span class="kboard-default-new-notify">New</span><?php endif?>
								<?php echo $content->title?>
								<span class="kboard-comments-count"><?php echo $content->getCommentsCount()?></span>
							</div>
						</a>
						<div class="kboard-mobile-contents">
							<span class="contents-item kboard-user"><?php echo $content->option->name_ko?>(<?php echo $content->option->name_en?>)</span>
							<span class="contents-separator kboard-birthday">|</span>
							<span class="contents-item kboard-birthday"><?php echo $content->option->birthday?></span>
							<span class="contents-separator kboard-participation">|</span>
							<span class="contents-item kboard-participation"><?php echo $content->option->participation_field?></span>
							<span class="contents-separator kboard-date">|</span>
							<span class="contents-item kboard-date">작성일: <?php echo $content->getDate()?></span>
						</div>
					</td>
					<td class="kboard-list-name"><?php echo $content->option->name_ko?>(<?php echo $content->option->name_en?>)</td>
					<td class="kboard-list-birthday"><?php echo $content->option->birthday?></td>
					<td class="kboard-list-participation"><?php echo $content->option->participation_field?></td>
					<td class="kboard-list-date"><?php echo $content->getDate()?></td>
				</tr>
				<?php $boardBuilder->builderReply($content->uid)?>
				<?php endwhile?>
			</tbody>
		</table>
	</div>
	<!-- 리스트 끝 -->

	<!-- 페이징 시작 -->
	<div class="kboard-pagination">
		<ul class="kboard-pagination-pages">
			<?php echo kboard_pagination($list->page, $list->total, $list->rpp)?>
		</ul>
	</div>
	<!-- 페이징 끝 -->

	<?php if($board->isWriter()):?>
	<!-- 버튼 시작 -->
	<div class="kboard-control">
		<a href="<?php echo $url->getContentEditor()?>" class="kboard-default-button-small">신청서 작성</a>
	</div>
	<!-- 버튼 끝 -->
	<?php endif?>

</div>