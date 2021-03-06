<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] ブログカテゴリ 一覧　テーブル
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.views
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
?>


<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
	<thead>
		<tr>
			<th style="width:160px" class="list-tool">
				<div>
	<?php if($newCatAddable): ?>
					<?php $baser->link($baser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => '新規追加', 'class' => 'btn')), array('action' => 'add' ,$blogContent['BlogContent']['id'])) ?>
	<?php endif ?>
				</div>
	<?php if($baser->isAdmin()): ?>
				<div>
					<?php echo $formEx->checkbox('ListTool.checkall', array('title' => '一括選択')) ?>
					<?php echo $formEx->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => '削除'), 'empty' => '一括処理')) ?>
					<?php echo $formEx->button('適用', array('id' => 'BtnApplyBatch', 'disabled' => 'disabled')) ?>
				</div>
	<?php endif ?>
			</th>
			<th>NO</th>
			<th>ブログカテゴリ名
				<?php if($baser->siteConfig['category_permission']): ?>
				<br />管理グループ
				<?php endif ?>
			</th>
			<th>ブログカテゴリタイトル</th>
			<th>登録日<br />更新日</th>
		</tr>
	</thead>
	<tbody>
	<?php if(!empty($dbDatas)): ?>
		<?php foreach($dbDatas as $data): ?>
			<?php $baser->element('blog_categories/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="6"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>
