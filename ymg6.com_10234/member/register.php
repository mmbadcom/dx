<?php echo 'fuckbe';exit;?>
<!--{template common/header}-->
<div class="bus_login">
<style type="text/css">
.login_from ul li a{color: #fff}
.mobanbus_header.bus_index, .bus_navlist, .bus_headboxview, .bus_ftads, .bus_nav.nonebg, .footer{ display:none}
</style>

<!-- registerbox start -->
<div class="loginbox registerbox">
	<div class="login_from">
		<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod={$_G[setting][regname]}&mobile=2">
		<input type="hidden" name="regsubmit" value="yes" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<!--{eval $dreferer = str_replace('&amp;', '&', dreferer());}-->
		<input type="hidden" name="referer" value="$dreferer" />
		<input type="hidden" name="activationauth" value="{if $_GET[action] == 'activation'}$activationauth{/if}" />
		<input type="hidden" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" />
		<ul>
			<li><input type="text" tabindex="1" class="bus_login_input" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['username']}" placeholder="{lang registerinputtip}" fwin="login"></li>
			<li><input type="password" tabindex="2" class="bus_login_input" size="30" value="" name="{$_G['setting']['reginput']['password']}" placeholder="{lang login_password}" fwin="login"></li>
			<li><input type="password" tabindex="3" class="bus_login_input" size="30" value="" name="{$_G['setting']['reginput']['password2']}" placeholder="{lang registerpassword2}" fwin="login"></li>
			<li class="bl_none"><input type="email" tabindex="4" class="bus_login_input" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['email']}" placeholder="{lang registeremail}" fwin="login"></li>
			<!--{if empty($invite) && ($_G['setting']['regstatus'] == 2 || $_G['setting']['regstatus'] == 3)}-->
				<li><input type="text" name="invitecode" autocomplete="off" tabindex="5" class="bus_login_input" size="30" value="{lang invite_code}" placeholder="{lang invite_code}" fwin="login"></li>
			<!--{/if}-->
			<!--{if $_G['setting']['regverify'] == 2}-->
				<li><input type="text" name="regmessage" autocomplete="off" tabindex="6" class="bus_login_input" size="30" value="{lang register_message}" placeholder="{lang register_message}" fwin="login"></li>
			<!--{/if}-->
		</ul>
		<!--{if $secqaacheck || $seccodecheck}-->
			<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
	</div>
	<!--{hook/register_input}-->
	<div class="btn_register"><button tabindex="7" value="true" name="regsubmit" type="submit" class="bus_btn bus_login_btn"><span>{lang quickregister}</span></button></div>
	<p class="reg_link"><a href="member.php?mod=logging&action=login&mobile=2">{lang login}</a></p>
	</form>
</div>
<!-- registerbox end -->

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
