<?php echo 'fuckbe';exit;?>

</div><!-- Mobanbus END bus_bd98 -->
<div class="clear"></div>

<!--{if empty($topic) || ($topic[usefooter])}-->
<!--{eval $focusid = getfocus_rand($_G[basescript]);}-->
<!--{if $focusid !== null}-->
<!--{eval $focus = $_G['cache']['focus']['data'][$focusid];}-->
<!--{eval $focusnum = count($_G['setting']['focus'][$_G[basescript]]);}-->
<div class="focus" id="sitefocus">
  <div class="bm">
    <div class="bm_h cl"> <a href="javascript:;" onclick="setcookie('nofocus_$_G[basescript]', 1, $_G['cache']['focus']['cookie']*3600);$('sitefocus').style.display='none'" class="y" title="{lang close}">{lang close}</a>
      <h2> 
        <!--{if $_G['cache']['focus']['title']}-->{$_G['cache']['focus']['title']}<!--{else}-->{lang focus_hottopics}<!--{/if}--> 
        <span id="focus_ctrl" class="fctrl"><img src="{IMGDIR}/pic_nv_prev.gif" alt="{lang footer_previous}" title="{lang footer_previous}" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/$focusnum</em> <img src="{IMGDIR}/pic_nv_next.gif" alt="{lang footer_next}" title="{lang footer_next}" id="focusnext" class="cur1" onclick="showfocus('next')" /></span> </h2>
    </div>
    <div class="bm_c" id="focus_con"> </div>
  </div>
</div>
<!--{eval $focusi = 0;}--> 
<!--{loop $_G['setting']['focus'][$_G[basescript]] $id}-->
<div class="bm_c" style="display: none" id="focus_$focusi">
  <dl class="xld cl bbda">
    <dt><a href="{$_G['cache']['focus']['data'][$id]['url']}" class="xi2" target="_blank">$_G['cache']['focus']['data'][$id]['subject']</a></dt>
    <!--{if $_G['cache']['focus']['data'][$id][image]}-->
    <dd class="m"><a href="{$_G['cache']['focus']['data'][$id]['url']}" target="_blank"><img src="{$_G['cache']['focus']['data'][$id]['image']}" alt="$_G['cache']['focus']['data'][$id]['subject']" /></a></dd>
    <!--{/if}-->
    <dd>$_G['cache']['focus']['data'][$id]['summary']</dd>
  </dl>
  <p class="ptn cl"><a href="{$_G['cache']['focus']['data'][$id]['url']}" class="xi2 y" target="_blank">{lang focus_show} &raquo;</a></p>
</div>
<!--{eval $focusi ++;}--> 
<!--{/loop}--> 
<script type="text/javascript">
			var focusnum = $focusnum;
			if(focusnum < 2) {
				$('focus_ctrl').style.display = 'none';
			}
			if(!$('focuscur').innerHTML) {
				var randomnum = parseInt(Math.round(Math.random() * focusnum));
				$('focuscur').innerHTML = Math.max(1, randomnum);
			}
			showfocus();
			var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
		</script> 
<!--{/if}--> 
<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1}-->
<div class="focus patch" id="patch_notice"></div>
<!--{/if}--> 

<!--{ad/footerbanner/wp a_f/1}--><!--{ad/footerbanner/wp a_f/2}--><!--{ad/footerbanner/wp a_f/3}--> 
<!--{ad/float/a_fl/1}--><!--{ad/float/a_fr/2}--> 
<!--{ad/couplebanner/a_fl a_cb/1}--><!--{ad/couplebanner/a_fr a_cb/2}--> 
<!--{ad/cornerbanner/a_cn}--> 

<!--{hook/global_footer}-->

<!--{if !$nofooter}-->
<div id="busfoot">
  <div class="container1">
        <div class="footer-title"><li><strong><a href="http://www.jpsao.com" target="_blank">FB影视</a>永久地址</strong> <em>$_G['setting']['version']</em> Copyright &copy; 2019 <a href="http://pp.lol" target="_blank">最新地址</a><!--{hook/global_footerlink}--></li>
        <li><span style="background-color:#E53333;color:#FFE500;">警告:本網站為限制級網站,已依台灣網站內容分級規定處理.僅對年滿18周歲或以上的海外華人開放,未滿18周歲或當地國家不允許謝絕瀏覽.</span><br /> <span style="background-color:#E53333;color:#FFE500;">18 U.S.C. 2257 Record-Keeping. </span>
                 - <!--{if $_G['setting']['icp']}--><a href="http://www.miitbeian.gov.cn/" target="_blank">$_G['setting']['icp'] 号</a><!--{/if}-->
                <a href="misc.php?mod=stat">站点统计</a> - <a href="forum.php?mobile=yes">手机版</a> - <a href="archiver">Archiver</a></li>
                <li style="display:none"><!--{if $_G['setting']['statcode']}-->$_G['setting']['statcode']<!--{/if}--></li>
        </div>
        <div id="ft" class="wp cl"> 
            <!--{eval updatesession();}--> 
            <!--{if $_G['uid'] && $_G['group']['allowinvisible']}--> 
            <script type="text/javascript">
                    var invisiblestatus = '<!--{if $_G['session']['invisible']}-->{lang login_invisible_mode}<!--{else}-->{lang login_normal_mode}<!--{/if}-->';
                    var loginstatusobj = $('loginstatusid');
                    if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
                    </script> 
            <!--{/if}--> 
        </div>
  </div>
</div>
<!--{else}-->
<!--{/if}-->

<!--{/if}--> 


<!--{if !$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry']}--> 
<!--{if $_G[uid] && !isset($_G['cookie']['checkpm'])}--> 
<script type="text/javascript" src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=$_G[timestamp]"></script> 
<!--{/if}--> 

<!--{if $_G[uid] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])}--> 
<script type="text/javascript" src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=$_G[timestamp]"></script> 
<!--{/if}--> 

<!--{if !isset($_G['cookie']['sendmail'])}--> 
<script type="text/javascript" src="home.php?mod=misc&ac=sendmail&rand=$_G[timestamp]"></script> 
<!--{/if}--> 

<!--{if $_G[uid] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])}--> 
<script type="text/javascript" src="misc.php?mod=patch&action=checkpatch&rand=$_G[timestamp]"></script> 
<!--{/if}--> 
<!--{/if}--> 

<!--{if $_GET['diy'] == 'yes'}--> 
<!--{if check_diy_perm($topic) && (empty($do) || $do != 'index')}--> 
<script type="text/javascript" src="{$_G[setting][jspath]}common_diy.js?{VERHASH}"></script> 
<script type="text/javascript" src="{$_G[setting][jspath]}portal_diy{if !check_diy_perm($topic, 'layout')}_data{/if}.js?{VERHASH}"></script> 
<!--{/if}--> 
<!--{if $space['self'] && CURMODULE == 'space' && $do == 'index'}--> 
<script type="text/javascript" src="{$_G[setting][jspath]}common_diy.js?{VERHASH}"></script> 
<script type="text/javascript" src="{$_G[setting][jspath]}space_diy.js?{VERHASH}"></script> 


<!--{/if}--> 
<!--{/if}--> 
<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1}--> 
<script type="text/javascript">patchNotice();</script> 
<!--{/if}--> 
<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])}-->
<div class="focus plugin" id="plugin_notice"></div>
<script type="text/javascript">pluginNotice();</script> 
<!--{/if}--> 
<!--{if !$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry'] && $_G['setting']['disableipnotice'] != 1 && $_G['uid'] && !empty($_G['cookie']['lip'])}-->
<div class="focus plugin" id="ip_notice"></div>
<script type="text/javascript">ipNotice();</script> 
<!--{/if}--> 
<!--{if $_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G[uid]]) || $_G['cookie']['promptstate_'.$_G[uid]] != $_G['member']['newprompt']) && $_GET['do'] != 'notice'}--> 
<script type="text/javascript">noticeTitle();</script> 
<!--{/if}--> 

<!--{if ($_G[member][newpm] || $_G[member][newprompt]) && empty($_G['cookie']['ignore_notice'])}--> 
<script type="text/javascript" src="{$_G[setting][jspath]}html5notification.js?{VERHASH}"></script> 
<script type="text/javascript">
	var h5n = new Html5notification();
	if(h5n.issupport()) {
		<!--{if $_G[member][newpm] && $_GET[do] != 'pm'}-->
		h5n.shownotification('pm', '$_G[siteurl]home.php?mod=space&do=pm', '<!--{avatar($_G[uid],small,true)}-->', '{lang newpm_subject}', '{lang newpm_notice_info}');
		<!--{/if}-->
		<!--{if $_G[member][newprompt] && $_GET[do] != 'notice'}-->
				<!--{loop $_G['member']['category_num'] $key $val}-->
					<!--{eval $noticetitle = lang('template', 'notice_'.$key);}-->
					h5n.shownotification('notice_$key', '$_G[siteurl]home.php?mod=space&do=notice&view=$key', '<!--{avatar($_G[uid],small,true)}-->', '$noticetitle ($val)', '{lang newnotice_notice_info}');
				<!--{/loop}-->
		<!--{/if}-->
	}
	</script> 
<!--{/if}--> 

<!--{eval userappprompt();}--> 
<!--{if $_G['basescript'] != 'userapp'}-->
<div id="scrolltop"> 
  <span><!--{if $_G['uid']}--><a href="home.php?mod=space&uid=$_G[uid]"  class="bus_slogin">空间</a>
  <!--{else}-->
  <a class="bus_slogin" class="bus_slogin"  href="javascript:;" onClick="javascript:lsSubmit();">{lang login}</a>
  <!--{/if}--></span>
  <span> <a class="bus_spush" href="forum.php?mod=misc&amp;action=nav" onclick="showWindow('nav', this.href, 'get', 0)">{lang publish}</a></span>

  <!--{if $_G[fid] && $_G['mod'] == 'viewthread'}--> 
  <span><a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$_GET[extra]&page=$page{if $_GET[from]}&from=$_GET[from]{/if}" onclick="showWindow('reply', this.href)" class="replyfast" title="{lang fastreply}"><b>{lang fastreply}</b></a></span> 
  <!--{/if}--> 
  <span hidefocus="true"><a title="{lang scrolltop}" onclick="window.scrollTo('0','0')" class="scrolltopa" ><b>{lang scrolltop}</b></a></span> 
  <!--{if $_G[fid]}--> 
  <span> 
  <!--{if $_G['mod'] == 'viewthread'}--> 
  <a href="forum.php?mod=forumdisplay&fid=$_G[fid]" hidefocus="true" class="returnlist" title="{lang return_list}"><b>{lang return_list}</b></a> 
  <!--{else}--> 
  <a href="forum.php" hidefocus="true" class="returnboard" title="{lang return_forum}"><b>{lang return_forum}</b></a> 
  <!--{/if}--> 
  </span> 
  <!--{/if}--> 
</div>
<script type="text/javascript">_attachEvent(window, 'scroll', function () { showTopLink(); });checkBlind();</script> 
<!--{/if}--> 
<!--{if isset($_G['makehtml'])}--> 
<script type="text/javascript" src="{$_G[setting][jspath]}html2dynamic.js?{VERHASH}"></script> 
<script type="text/javascript">
		var html_lostmodify = {TIMESTAMP};
		htmlGetUserStatus();
		<!--{if isset($_G['htmlcheckupdate'])}-->
		htmlCheckUpdate();
		<!--{/if}-->
	</script> 
<!--{/if}--> 
<!--{eval output();}-->
</div><!--Mobanbus_cn mobanbus_iner end-->
</div><!--Mobanbus_cn mobanbus end-->

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

</body></html>