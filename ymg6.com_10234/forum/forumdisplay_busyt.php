<?php echo '模板巴士原创模板，版权所有，盗版必究，官网 www.mobanbus.cn';exit;?>
        	<dl>
            	<dt>
				<!--{if $_G['forum'][icon]}-->
				<!--{eval $_G['forum'][icon] =  get_forumimg($_G['forum']['icon']);}-->
					<a href="forum.php?mod=forumdisplay&fid=$_G['forum'][fid]"><img src="$_G['forum'][icon]" alt="$_G['forum']['name']" /></a>
				<!--{else}-->
					<a href="forum.php?mod=forumdisplay&fid=$_G['forum'][fid]"><img src="{IMGDIR}/forum{if $forum[folder]}_new{/if}.gif" alt="$forum[name]" /></a>
				<!--{/if}-->
				</dt>
                <dd>
                	<div class="bus_fl tit">
                    	<h1><a href="forum.php?mod=forumdisplay&fid=$_G['forum'][fid]">$_G['forum'][name]</a></h1>
                        <p>
                        <!--{if !in_array($_G['forum']['fid'],$favfids)}-->
                    	<a href="home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&handlekey=favoriteforum" id="a_favorite" onclick="showWindow(this.id, this.href, 'get', 0);">+ 关注</a>
                    	<!--{else}-->
		                  <a href="home.php?mod=spacecp&ac=favorite&op=delete&favid={$threadfavid[$_G['forum']['fid']]}&handlekey=favoriteforum" id="a_favorite" onclick="showWindow(this.id, this.href, 'get', 0);">取消关注</a>
		                  <!--{/if}-->
                        </p>
                   	</div>
                    <div class="bus_fl xg">
                    	<p>
						<!--{if $favoritenum}--><span>关注：<i>$favoritenum</i></span><!--{/if}-->
						<span>关注：<i>$_G[forum][favtimes]</i></span></p>
                        <p>所属分类：$navigation
						<!--{if $moderatedby}-->  ,  {lang forum_modedby}: <span class="xi2">$moderatedby</span><!--{/if}--></p>
                   	</div>
                   	
                   	<!--{if $_G['forum']['ismoderator']}-->
                   	<div class="bus_fr xg">
                    	<p></p>
                        <p class="recycle">
                   	
						<!--{if $_G['forum']['recyclebin']}-->
							<a href="{if $_G['adminid'] == 1}admin.php?mod=forum&action=recyclebin&frames=yes{elseif $_G['forum']['ismoderator']}forum.php?mod=modcp&action=recyclebin&fid=$_G[fid]{/if}" target="_blank">{lang forum_recyclebin}</a>
						<!--{/if}-->
						<!--{if $_G['forum']['ismoderator'] && !$_GET['archiveid']}-->
						<!--{if $_G['forum']['status'] != 3}-->
								| <a href="forum.php?mod=modcp&fid=$_G[fid]">{lang modcp}</a>
							<!--{else}-->
								| <a href="forum.php?mod=group&action=manage&fid=$_G[fid]">{lang modcp}</a>
							<!--{/if}-->
						<!--{/if}-->
						</p></div>
						<!--{/if}-->
                </dd>
            </dl>
        	<!--{if $_G['page'] == 1 && $_G['forum']['rules']}--><dl class="bus_rules">$_G['forum'][rules]</dl><!--{/if}-->