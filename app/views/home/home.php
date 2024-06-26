<!-- Section:: Welcome -->
<div class="section">
	<div id="section_head">
		<h1>
			Welcome!
		</h1>
	</div>
	<p id="section_title"><?= $introTitle ?></p>
	<p id="section_content"><?= $intro ?>
</div>

<!-- Section:: News -->
<div class="section">
	<div id="section_head">
		<h1>
			News Feed............
		</h1>
	</div>
	<marquee behavior="scroll" direction="up" onmouseover="this.stop();" onMouseOut="this.start();">
		<?php
		if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
			<div class="news_new">
				<a href="<?= BASE_URL .'/news/add?keepThis=true&TB_iframe=true&height=150&width=400&modal=true' ?>" title="New News"
					class="thickbox">Add New News</a>
			</div>
			<?php
		}
		foreach ($newsResults as $news) { ?>
			<div class="news_hint">
				<a href='<?php echo $news['News_Link']; ?>'
					target="_blank"><span><?php echo $news['News_Hints']; ?></span></a>
			</div>
			<?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
				<div class="news_actions">
					<a href="<?= BASE_URL . '/news/edit?news_id=' . $news['News_ID'] . '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true' ?>" class='thickbox' title='Edit News'> edit </a>
					|
					<a href="<?= BASE_URL . '/news/delete-confirm?news_id=' . $news['News_ID']. '&keepThis=true&TB_iframe=true&height=300&width=500&do=edit&modal=true'  ?>" class='thickbox' title='Delete News'> delete </a>
				</div>
			<?php }
		} ?>
	</marquee>
</div>

<!-- Section:: Notice -->
<div class="section">
	<div id="section_head">
		<h1>Notice!</h1>
	</div>
	<div id="notice_board">
			<Div class="notice_content">
				<p>
					<?php echo $noticeInfo['Notice']; ?><br><br> Thank You
					<?php if (!empty($userInfo['group_id']) && $userInfo['group_id'] == 1) { ?>
						<a href="<?= BASE_URL . '/notice/edit?notice_id=' . $noticeInfo['Notice_ID'] . '&keepThis=true&TB_iframe=true&height=400&width=700&do=edit&modal=true' ?>" class='thickbox' title='Edit Notice'> Update Notice </a>
					<?php } ?>
				</p>
			</Div>
	</div>
</div>

<!-- Section:: Mission -->
<div class="section">
	<div id="section_head">
		<h1>Mission...</h1>
	</div>
	<p id="section_title"><?= $missionTitle ?></p>
	<p id="section_content"><?= $mission ?></p>
</div>

<!-- Section:: About -->
<div class="section">
	<div id="section_head">
		<h1>About!</h1>
	</div>
	<p id="section_title"><?= $aboutTitle ?></p>
	<p id="section_content"><?= $about ?></p>
</div>