<?php echo '模板巴士原创模板，版权所有，盗版必究，官网 www.mobanbus.cn';exit;?>
<!--{template common/header}-->
<script src="template/ymg6.com_10234/mobanbus_st/js/verificationNumbers.js" tppabs="js/verificationNumbers.js"></script>
<script src="template/ymg6.com_10234/mobanbus_st/js/Particleground.js" tppabs="js/Particleground.js"></script>
<script>
jQuery(document).ready(function() {
  //粒子背景特效
  jQuery('body').particleground({
    dotColor: '#eee',
    lineColor: '#bbb'
  });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
  jQuery(".submit_btn").click(function(){
	  location.href="javascrpt:;"/*tpa=http://***index.html*/;
	  });
});
</script>

<style type="text/css">
body{background:#fff;}
canvas{z-index:-1;position:absolute;}
.bus_navright{ display:none}
</style>
<!--{eval $loginhash = 'L'.random(4);}-->
<!--{if empty($_GET['infloat'])}-->
<div id="ct" class="ptm wp w cl">
	<div class="nfl" id="main_succeed" style="display: none">
		<div class="f_c altw">
			<div class="alert_right">
				<p id="succeedmessage"></p>
				<p id="succeedlocation" class="alert_btnleft"></p>
				<p class="alert_btnleft"><a id="succeedmessage_href">{lang message_forward}</a></p>
			</div>
		</div>
	</div>
	<div class="mn bus_fl" id="main_message">
	<span style="font-size:16px;color:#9933E5;"><strong>本站為內部交流使用！請勿發廣告！</strong></span><br>
	<span style="font-size:16px;color:#9933E5;"><strong>禁止賬號共享，密碼不支持找回，自行保存好！</strong></span>
		<div class="bm">
			<div class="bm_h bbs bus_loginbox_head">
				<span class="y">
					<!--{hook/logging_side_top}-->
					<a href="member.php?mod={$_G[setting][regname]}" class="xi2">{lang login_guest}</a>
				</span>
				<!--{if !$secchecklogin2}-->
					<h3 class="">{lang login}</h3>
				<!--{else}-->
					<h3 class="">{lang login_seccheck2}</h3>
				<!--{/if}-->
			</div>
		<div>
<!--{/if}-->

<div id="main_messaqge_$loginhash"{if $auth} style="width: auto"{/if}>
	<div id="layer_login_$loginhash">
		<h3 class="flb">
			<em id="returnmessage_$loginhash">
				<!--{if !empty($_GET['infloat'])}--><!--{if !empty($_GET['guestmessage'])}-->{lang login_guestmessage}<!--{elseif $auth}-->{lang profile_renew}<!--{else}-->{lang login_member}<!--{/if}--><!--{/if}-->
			</em>
			<span><!--{if !empty($_GET['infloat']) && !isset($_GET['frommessage'])}--><a href="javascript:;" class="flbc" onclick="hideWindow('$_GET[handlekey]', 0, 1);" title="{lang close}">{lang close}</a><!--{/if}--></span>
		</h3>
		<!--{hook/logging_top}-->
		<form method="post" autocomplete="off" name="login" id="loginform_$loginhash" class="cl" onsubmit="{if $this->setting['pwdsafety']}pwmd5('password3_$loginhash');{/if}pwdclear = 1;ajaxpost('loginform_$loginhash', 'returnmessage_$loginhash', 'returnmessage_$loginhash', 'onerror');return false;" action="member.php?mod=logging&action=login&loginsubmit=yes{if !empty($_GET['handlekey'])}&handlekey=$_GET[handlekey]{/if}{if isset($_GET['frommessage'])}&frommessage{/if}&loginhash=$loginhash">
			<div class="c cl">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="referer" value="{echo dreferer()}" />
				<!--{if $auth}-->
					<input type="hidden" name="auth" value="$auth" />
				<!--{/if}-->
				
				<!--{if $invite}-->
				<div class="rfm">
					<table>
						<tr>
							<th>{lang register_from}</th>
							<td><a href="home.php?mod=space&uid=$invite[uid]" target="_blank">$invite[username]</a></td>
						</tr>
					</table>
				</div>
				<!--{/if}-->

				<!--{if !$auth}-->
				<div class="rfm">
					<table>
						<tr>
							<th>
								<!--{if $this->setting['autoidselect']}--><label for="username_$loginhash">{lang login_id}:</label><!--{else}-->
									<span class="login_slct">
										<select name="loginfield" style="float: left;" width="45" id="loginfield_$loginhash">
											<option value="username">{lang username}</option>
											<!--{if getglobal('setting/uidlogin')}-->
											<option value="uid">{lang uid}</option>
											<!--{/if}-->
											<option value="email">{lang email}</option>
										</select>
									</span>
								<!--{/if}-->
							</th>
							<td><input type="text" name="username" id="username_$loginhash" autocomplete="off" size="30" class="px p_fre" tabindex="1" value="$username" /></td>
							<td class="tipcol"><a href="member.php?mod={$_G[setting][regname]}">$_G['setting']['reglinkname']</a></td>
						</tr>
					</table>
				</div>
				<div class="rfm">
					<table>
						<tr>
							<th><label for="password3_$loginhash">{lang login_password}:</label></th>
							<td><input type="password" id="password3_$loginhash" name="password" onfocus="clearpwd()" size="30" class="px p_fre" tabindex="1" /></td>
							<td class="tipcol"><a href="javascript:;" onclick="display('layer_login_$loginhash');display('layer_lostpw_$loginhash');" title="{lang getpassword}">{lang getpassword}</a></td>
						</tr>
					</table>
				</div>
				<!--{/if}-->

				<!--{if empty($_GET['auth']) || $questionexist}-->
				<div class="rfm">
					<table>
						<tr>
							<th>{lang security_q}:</th>
							<td><select id="loginquestionid_$loginhash" width="213" name="questionid"{if !$questionexist} onchange="if($('loginquestionid_$loginhash').value > 0) {$('loginanswer_row_$loginhash').style.display='';} else {$('loginanswer_row_$loginhash').style.display='none';}"<!--{/if}-->>
								<option value="0"><!--{if $questionexist}-->{lang security_question_0}<!--{else}-->{lang security_question}<!--{/if}--></option>
								<option value="1">{lang security_question_1}</option>
								<option value="2">{lang security_question_2}</option>
								<option value="3">{lang security_question_3}</option>
								<option value="4">{lang security_question_4}</option>
								<option value="5">{lang security_question_5}</option>
								<option value="6">{lang security_question_6}</option>
								<option value="7">{lang security_question_7}</option>
							</select></td>
						</tr>
					</table>
				</div>
				<div class="rfm" id="loginanswer_row_$loginhash" {if !$questionexist} style="display:none"{/if}>
					<table>
						<tr>
							<th>{lang security_a}:</th>
							<td><input type="text" name="answer" id="loginanswer_$loginhash" autocomplete="off" size="30" class="px p_fre" tabindex="1" /></td>
						</tr>
					</table>
				</div>
				<!--{/if}-->

				<!--{if $seccodecheck}-->
					<!--{block sectpl}--><div class="rfm"><table><tr><th><sec>: </th><td><sec><br /><sec></td></tr></table></div><!--{/block}-->
					<!--{subtemplate common/seccheck}-->
				<!--{/if}-->

				<!--{hook/logging_input}-->

				<div class="rfm {if !empty($_GET['infloat'])} bw0{/if}">
					<table>
						<tr>
							<th></th>
							<td><label for="cookietime_$loginhash"><input type="checkbox" class="pc" name="cookietime" id="cookietime_$loginhash" tabindex="1" value="2592000" $cookietimecheck />{lang login_permanent}</label></td>
						</tr>
					</table>
				</div>

				<div class="rfm mbw bw0">
					<table width="100%">
						<tr>
							<th>&nbsp;</th>
							<td>
								<button class="pn pnc" type="submit" name="loginsubmit" value="true" tabindex="1"><strong>{lang login}</strong></button>
							</td>
							<td>
								<!--{if $this->setting['sitemessage'][login] && empty($_GET['infloat'])}--><a href="javascript:;" id="custominfo_login_$loginhash" class="y">&nbsp;<img src="{IMGDIR}/info_small.gif" alt="{lang faq}" class="vm" /></a><!--{/if}-->
								<!--{if !$this->setting['bbclosed'] && empty($_GET['infloat'])}--><a href="javascript:;" onclick="ajaxget('member.php?mod=clearcookies&formhash={FORMHASH}', 'returnmessage_$loginhash', 'returnmessage_$loginhash');return false;" title="{lang login_clearcookies}" class="y">{lang login_clearcookies}</a><!--{/if}-->
							</td>
						</tr>
					</table>
				</div>

				<!--{if !empty($_G['setting']['pluginhooks']['logging_method'])}-->
					<div class="rfm bw0 {if empty($_GET['infloat'])} mbw{/if}">
						<hr class="l" />
						<table>
							<tr>
								<th>{lang login_method}:</th>
								<td><!--{hook/logging_method}--></td>
							</tr>
						</table>
					</div>
				<!--{/if}-->
			</div>
		</form>
	</div>
	<!--{if $_G['setting']['pwdsafety']}-->
		<script type="text/javascript" src="{$_G['setting']['jspath']}md5.js?{VERHASH}" reload="1"></script>
	<!--{/if}-->
	<div id="layer_lostpw_$loginhash" style="display: none;">
		<h3 class="flb">
			<em id="returnmessage3_$loginhash">{lang getpassword}</em>
			<span><!--{if !empty($_GET['infloat']) && !isset($_GET['frommessage'])}--><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="{lang close}">{lang close}</a><!--{/if}--></span>
		</h3>
		<form method="post" autocomplete="off" id="lostpwform_$loginhash" class="cl" onsubmit="ajaxpost('lostpwform_$loginhash', 'returnmessage3_$loginhash', 'returnmessage3_$loginhash', 'onerror');return false;" action="member.php?mod=lostpasswd&lostpwsubmit=yes&infloat=yes">
			<div class="c cl">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="handlekey" value="lostpwform" />
				<div class="rfm">
					<table>
						<tr>
							<th><span class="rq">*</span><label for="lostpw_email">{lang email}:</label></th>
							<td><input type="text" name="email" id="lostpw_email" size="30" value=""  tabindex="1" class="px p_fre" /></td>
						</tr>
					</table>
				</div>
				<div class="rfm">
					<table>
						<tr>
							<th><label for="lostpw_username">{lang username}:</label></th>
							<td><input type="text" name="username" id="lostpw_username" size="30" value=""  tabindex="1" class="px p_fre" /></td>
						</tr>
					</table>
				</div>

				<div class="rfm mbw bw0">
					<table>
						<tr>
							<th></th>
							<td><button class="pn pnc" type="submit" name="lostpwsubmit" value="true" tabindex="100"><span>{lang submit}</span></button></td>
						</tr>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="layer_message_$loginhash"{if empty($_GET['infloat'])} class="f_c blr nfl"{/if} style="display: none;">
	<h3 class="flb" id="layer_header_$loginhash">
		<!--{if !empty($_GET['infloat']) && !isset($_GET['frommessage'])}-->
		<em>{lang login_member}</em>
		<span><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="{lang close}">{lang close}</a></span>
		<!--{/if}-->
	</h3>
	<div class="c"><div class="alert_right">
		<div id="messageleft_$loginhash"></div>
		<p class="alert_btnleft" id="messageright_$loginhash"></p>
	</div>
</div>

<script type="text/javascript" reload="1">
<!--{if !isset($_GET['viewlostpw'])}-->
	var pwdclear = 0;
	function initinput_login() {
		document.body.focus();
		<!--{if !$auth}-->
			if($('loginform_$loginhash')) {
				$('loginform_$loginhash').username.focus();
			}
			<!--{if !$this->setting['autoidselect']}-->
				simulateSelect('loginfield_$loginhash');
			<!--{/if}-->
		<!--{elseif $seccodecheck && !(empty($_GET['auth']) || $questionexist)}-->
			if($('loginform_$loginhash')) {
				safescript('seccodefocus', function() {$('loginform_$loginhash').seccodeverify.focus()}, 500, 10);
			}			
		<!--{/if}-->
	}
	initinput_login();
	<!--{if $this->setting['sitemessage']['login']}-->
	showPrompt('custominfo_login_$loginhash', 'mouseover', '<!--{echo trim($this->setting['sitemessage'][login][array_rand($this->setting['sitemessage'][login])])}-->', $this->setting['sitemessage'][time]);
	<!--{/if}-->

	function clearpwd() {
		if(pwdclear) {
			$('password3_$loginhash').value = '';
		}
		pwdclear = 0;
	}
<!--{else}-->
	display('layer_login_$loginhash');
	display('layer_lostpw_$loginhash');
	$('lostpw_email').focus();
<!--{/if}-->
</script>

<!--{eval updatesession();}-->
<!--{if empty($_GET['infloat'])}-->
	</div></div></div></div>
</div>
<!--{/if}-->

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->