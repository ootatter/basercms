/* SVN FILE: $Id$ */
/**
 * 共通スタートアップ処理
 * 
 * Javascript / jQuery
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2012, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */

/** 
 * ブラウザ判別用
 */
var _ua = (function(){
    return {
    ltIE6:typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined",
    ltIE7:typeof window.addEventListener == "undefined" && typeof document.querySelectorAll == "undefined",
    ltIE8:typeof window.addEventListener == "undefined" && typeof document.getElementsByClassName == "undefined",
    ie:document.uniqueID,
    firefox:window.globalStorage,
    opera:window.opera,
    webkit:!document.uniqueID && !window.opera && !window.globalStorage && window.localStorage,
    mobile:/android|iphone|ipad|ipod/i.test(navigator.userAgent.toLowerCase())
    }
})();

$(function(){
/**
 * ヘルプ用バルーンチップ設定
 *
 * jQuery / BeautyTips(jQueryプラグイン)が必要
 * ヘルプ対象のタグはクラス名を[help]とし、idは[help+識別子]とする。
 * バルーンチップに表示するテキストのタグは、クラス名をhelptextとし、idを[helptext+識別子]とする。
 */
	if($('.help').bt){
		$('.helptext').css('display','none');
		$.bt.options.closeWhenOthersOpen = true;
		$('.help').bt({
			trigger: 'click',
			positions: 'top',
			shadow: true,
			shadowOffsetX: 3,
			shadowOffsetY: 3,
			shadowBlur: 8,
			shadowColor: 'rgba(0,0,0,.8)',
			shadowOverlap: false,
			noShadowOpts: {
				strokeStyle: '#999',
				strokeWidth: 3
			},
			width: '360px',
			/*shrinkToFit: true,*/
			spikeLength: 12,
			spikeGirth: 18,
			padding: 15,
			cornerRadius: 0,
			strokeWidth: 6, /*no stroke*/
			strokeStyle: '#690',
			fill: 'rgba(255, 255, 255, 1.00)',
			cssStyles: {
				fontSize: '12px',
				color: '#000'
			},
			showTip: function(box){
				$(box).fadeIn(200);
			},
			// jQuery.uiのバージョンを1.8.14にしたところ、
			// hideイベントのフックで何故か再表示できなくなったのでコメントアウト
			/*hideTip: function(box, callback){
				$(box).animate({
					opacity: 0
				}, 200, callback);
			},*/
			/*contentSelector: "$('#helptext'+this.id.substring(4,this.id.length)).html()"*/
			contentSelector: "$(this).parent().find('.helptext').html()"
		});
	}
/**
 * スライド
 * 項目の表示・非表示を切り替える
 */
	$(".slide-trigger").click(function(){
		target = this.id+'Body';
		if($("#"+target).css('display') == 'none') {
			$("#"+target).slideDown();
		} else {
			$("#"+target).slideUp();
		}
	});
	
	$(".btn-slide-form a").click(function(){
		target = this.id+'Body';
		$(this).parent().fadeOut(300, function(){
			$(this).remove();
			if($("#"+target).css('display') == 'none') {
				$("#"+target).slideDown();
			} else {
				$("#"+target).slideUp();
			}
		});
	});
	
	$(".slide-body").hide();

/**
 * カラーボックス
 */
	if($("a[rel='colorbox']").colorbox) $("a[rel='colorbox']").colorbox();
/**
 * ポップアップ
 */
	if($("a[rel='popup']").colorbox) $("a[rel='popup']").colorbox({width:"60%", height:"70%", iframe:true});
/**
 * Wrapの表示
 * cb.js の処理が遅い為、Wrapは一旦消しておいてゆっくり表示する
 */
	$("#Wrap").fadeIn(1000);
/**
 * ヘルプメニュー
 */
	$('#BtnMenuHelp').click(function(){
		if($('#Help').css('display')=='none'){
			$('#Help').fadeIn(300);
		} else {
			$('#Help').fadeOut(300);
		}
	});
	$('#CloseHelp').click(function(){
		$('#Help').fadeOut(300);
	});
/**
 * 検索ボックス
 */
	$('#BtnMenuSearch').click(function(){
		if($('#Search').css('display')=='none'){
			changeSearchBox(true);
			$.ajax({type: "GET", url: $("#SaveSearchBoxUrl").html()+'/1'});
		} else {
			changeSearchBox(false);
			$.ajax({type: "GET", url: $("#SaveSearchBoxUrl").html()+'/'});
		}
	});
	$('#CloseSearch').click(function(){
		$('#Search').fadeOut(300);
		$.ajax({type: "GET", url: $("#SaveSearchBoxUrl").html()+'/'});
	});
/**
 * 確認リンク
 */
	$(".confirm-link").click(function(){
		if(confirm($(this).attr('confirm'))) {
			alert($(this).attr('link'));
			document.location = $(this).attr('link');
		}
	});
/**
 * カラーボックス
 */
	if($("a[rel='colorbox']").colorbox) $("a[rel='colorbox']").colorbox();
	if($("a[rel='popup']").colorbox) $("a[rel='popup']").colorbox({width:"60%", height:"70%", iframe:true});
/**
 * 空のサブメニューのLIを削除
 */
	$("#SubMenu li").each(function(){
		if(!$(this).html()) {
			$(this).remove();
		}
	});
	$("input, textarea, select").focus(function(){
		$(this).addClass('active');
	});
	$("input, textarea, select").focusout(function(){
		$(this).removeClass('active');
	});
/**
 * よく使う項目
 */
	$('#BtnMenuFavorite').click(function(){
		if($('#SideBar').css('display')=='none'){
			changeFavoriteBox(true);
			$.ajax({type: "GET", url: $("#SaveFavoriteBoxUrl").html()+'/1'});
		}else{
			changeFavoriteBox(false);
			$.ajax({type: "GET", url: $("#SaveFavoriteBoxUrl").html()+'/'});
		}
	});
	
});
$(window).load(function(){
	changeFavoriteBox($("#FavoriteBoxOpened").html());
	changeSearchBox($("#SearchBoxOpened").html());
});
function changeFavoriteBox(open) {
	if(open) {
		$('#Contents').css('margin-left','210px');
		$('#SideBar').show();
	} else {
		$('#SideBar').hide();
		$('#Contents').css('margin-left','0');
	}
}
function changeSearchBox(open) {
	if(open){
		$('#Search').fadeIn(300);
	} else {
		$('#Search').fadeOut(300);
	}
}