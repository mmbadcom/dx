<?php echo '模板巴士原创模板，版权所有，盗版必究，官网 www.mobanbus.cn';exit;?>
<!--{if $leftside['favorites']}-->
<div class="row3">
<dl class="dla"><dt class="t1"><span>{lang favorite_forums}</span></dt><dd></dd></dl>							
<ul class="bk">
<!--{loop $leftside['favorites'] $favfid $fdata}-->
<Li>
<!--{if !empty($_G['cache']['forums'][$favfid]['domain']) && !empty($_G['setting']['domain']['root']['forum'])}-->
<a href="http://{$_G['cache']['forums'][$favfid]['domain']}.{$_G['setting']['domain']['root']['forum']}" title="$fdata[0]">$fdata[0]</a>
<!--{else}-->
<a href="forum.php?mod=forumdisplay&fid=$favfid">$fdata[0]</a>
<!--{/if}-->
</li>
<!--{/loop}-->
</ul>
</div>
<!--{else}-->
<!--{/if}-->
<div class="row3">
<dl class="dla"><dt class="t1"><span>{lang forum_nav}</span></dt><dd></dd></dl>							
<ul class="bk">
<!--{loop $leftside['forums'] $upfid $gdata}-->
<li class="bus_tt"><a href="javascript:;" hidefocus="true" onclick="leftside('lf_$upfid')" title="$gdata['name']">$gdata['name']</a></li>
<!--{loop $gdata['sub'] $subfid $name}-->
<Li{if $_G['fid'] == $subfid || $_G['forum']['fup'] == $subfid} class="bus_dark"{/if}>
<!--{if !empty($_G['cache']['forums'][$subfid]['domain']) && !empty($_G['setting']['domain']['root']['forum'])}-->
<a href="http://{$_G['cache']['forums'][$subfid]['domain']}.{$_G['setting']['domain']['root']['forum']}" title="$name">$name</a>
<!--{else}-->
<a href="forum.php?mod=forumdisplay&fid=$subfid" title="$name">$name</a>
<!--{/if}-->
</li>
<!--{/loop}-->
<!--{/loop}-->
</ul>
</div>