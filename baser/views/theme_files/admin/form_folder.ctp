<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] テーマフォルダ登録・編集
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2011, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2011, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.views
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
?>
<!-- current -->
<div class="em-box align-left">
	現在の位置：<?php echo $currentPath ?>
</div>

<?php if($this->action == 'admin_add_folder'): ?>
<?php echo $formEx->create('ThemeFolder', array('id' => 'TemplateForm', 'url' => array('controller' => 'theme_files', 'action' => 'add_folder', $theme, $type, $path))) ?>
<?php else: ?>
<?php echo $formEx->create('ThemeFolder',array('id' => 'TemplateForm', 'url' => array('controller' => 'theme_files', 'action' => 'edit_folder', $theme, $type, $path))) ?>
<?php endif ?>

<?php echo $formEx->input('ThemeFolder.parent', array('type' => 'hidden')) ?>
<?php echo $formEx->input('ThemeFolder.pastname', array('type' => 'hidden')) ?>

<!-- form -->
<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
		<tr>
			<th class="col-head"><?php echo $formEx->label('ThemeFolder.name', 'フォルダ名') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
	<?php if($this->action != 'admin_view_folder'): ?>
				<?php echo $formEx->input('ThemeFolder.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
				<?php echo $html->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
				<div id="helptextName" class="helptext">
					<ul>
						<li>フォルダ名は半角で入力してください。</li>
					</ul>
				</div>
				<?php echo $formEx->error('ThemeFolder.name') ?>
	<?php else: ?>
				<?php echo $formEx->input('ThemeFolder.name', array('type' => 'text', 'size' => 40, 'readonly' => 'readonly')) ?>
	<?php endif ?>
			</td>
		</tr>
	</table>
</div>
<div class="submit">
<?php if($this->action == 'admin_add_folder'): ?>
	<?php $baser->link('一覧に戻る', array('action' => 'index', $theme, $plugin, $type, $path), array('class' => 'btn-gray button')); ?>
<?php else: ?>
	<?php $baser->link('一覧に戻る', array('action' => 'index', $theme, $plugin, $type, dirname($path)), array('class' => 'btn-gray button')); ?>
<?php endif ?>
<?php if($this->action == 'admin_add_folder'): ?>
	<?php echo $formEx->submit('作成', array('div' => false, 'class' => 'btn-red button')) ?>
<?php elseif ($this->action == 'admin_edit_folder'): ?>
	<?php echo $formEx->submit('更新', array('div' => false, 'class' => 'btn-orange button')) ?>
	<?php $baser->link('削除',
			array('action'=>'del', $theme, $type, $path),
			array('class'=>'btn-gray button'),
			sprintf('%s を本当に削除してもいいですか？', $formEx->value('ThemeFolder.name')),
			false
	) ?>
<?php else: ?>
	<?php if(!$safeModeOn): ?>
		<?php if($theme == 'core'): ?>
	<?php $baser->link('現在のテーマにコピー',
			array('action' => 'copy_folder_to_theme', $theme, $plugin, $type , $path),
			array('class' => 'btn-red button'),
			'本当に現在のテーマ「'.Inflector::camelize($siteConfig['theme']).'」にコピーしてもいいですか？\n既に存在するファイルは上書きされます。'
	) ?>
		<?php endif ?>
	<?php else: ?>
	機能制限のセーフモードで動作していますので、現在のテーマへのコピーはできません。
	<?php endif ?>
<?php endif ?>
</div>

<?php echo $formEx->end() ?>