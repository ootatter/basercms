<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] ユーザー一覧　検索ボックス
 *
 * PHP versions 4 and 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.views
 * @since			baserCMS v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
$priorities = array('0.1' => '0.1', '0.2' => '0.2', '0.3' => '0.3', '0.4' => '0.4', '0.5' => '0.5',
					'0.6' => '0.6', '0.7' => '0.7', '0.8' => '0.8', '0.9' => '0.9', '1.0' => '1.0');
$categories = am(array('none' => 'カテゴリなし'), unserialize($baser->siteConfig['content_categories']));
$types = unserialize($baser->siteConfig['content_types']);
?>

<?php echo $formEx->create('Content', array('url' => array('action' => 'index'))) ?>
<?php echo $formEx->hidden('Content.open', array('value' => true)) ?>
<p>
	<span><?php echo $formEx->label('Content.type', 'タイプ') ?> <?php echo $formEx->input('Content.type', array('type' => 'select', 'options' => $types, 'empty' => '指定なし')) ?></span>
	<span><?php echo $formEx->label('Content.category', 'カテゴリ') ?> <?php echo $formEx->input('Content.category', array('type' => 'select', 'options' => $categories, 'empty' => '指定なし')) ?></span>
	<span><?php echo $formEx->label('Content.keyword', 'キーワード') ?> <?php echo $formEx->input('Content.keyword', array('type' => 'text', 'size' => '30')) ?></span>
	<span><?php echo $formEx->label('Content.status', '公開状態') ?> 
	<?php echo $formEx->input('Content.status', array('type' => 'select', 'options' => $textEx->booleanMarkList(), 'empty' => '指定なし')) ?></span>　
	<span><?php echo $formEx->label('Content.priority', '優先度') ?> 
	<?php echo $formEx->input('Content.priority', array('type' => 'select', 'options' => $priorities, 'empty' => '指定なし')) ?></span>
</p>
<div class="button">
	<?php $baser->link($baser->getImg('admin/btn_search.png', array('alt' => '検索', 'class' => 'btn')), "javascript:void(0)", array('id' => 'BtnSearchSubmit')) ?> 
	<?php $baser->link($baser->getImg('admin/btn_clear.png', array('alt' => 'クリア', 'class' => 'btn')), "javascript:void(0)", array('id' => 'BtnSearchClear')) ?> 
</div>
<?php $formEx->end() ?>