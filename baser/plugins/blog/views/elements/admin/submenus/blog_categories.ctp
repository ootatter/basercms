<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] ブログカテゴリ管理メニュー
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.plugins.blog.views
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
?>


<tr>
	<th>カテゴリ管理メニュー</th>
	<td>
		<ul>
			<li><?php $baser->link('ブログカテゴリ一覧', array('controller' => 'blog_categories', 'action' => 'index', $blogContent['BlogContent']['id'])) ?></li>
<?php if(isset($newCatAddable) && $newCatAddable): ?>
			<li><?php $baser->link('新規ブログカテゴリを登録', array('controller' => 'blog_categories', 'action' => 'add', $blogContent['BlogContent']['id'])) ?></li>
<?php endif ?>
		</ul>
	</td>
</tr>