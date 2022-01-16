<?php echo '模板巴士原创模板，版权所有，盗版必究，官网 www.mobanbus.cn';exit;?>
    	<div class="bus_yt" <!--{if $_G[forum][banner] && !$subforumonly}--> style=" background:url($_G['forum'][banner])  top right no-repeat #fff"<!--{/if}-->>
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
        </div>
		<!--{if $subexists && $_G['page'] == 1}--><!--{template forum/forumdisplay_subforum}--><!--{/if}-->		
	<div class="cl"></div>	
       <!--{if $livethread}-->
					<div id="livethread" class="tl bmw cl" style="padding:10px 15px;">
						<div class="livethreadtitle">
							<span class="replynumber xg1">{lang reply} <span id="livereplies" class="xi1">$livethread[replies]</span></span>
							<a href="forum.php?mod=viewthread&tid=$livethread[tid]" target="_blank">$livethread[subject]</a> <img src="{IMGDIR}/livethreadtitle.png" />
						</div>
						<div id="livereplycontentout">
							<div id="livereplycontent">
							</div>
						</div>
						<div id="liverefresh">{lang forum_live_newreply_refresh}</div>
						<div id="livefastreply">
							<form id="livereplypostform" method="post" action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$livethread[tid]&replysubmit=yes&infloat=yes&handlekey=livereplypost&inajax=1" onsubmit="return livereplypostvalidate(this)">
								<div id="livefastcomment">
									<textarea id="livereplymessage" name="message" style="color:gray;">{lang forum_live_fastreply_notice}</textarea>
								</div>
								<div id="livepostsubmit" style="display:none;">
								<!--{if checkperm('seccode') && ($secqaacheck || $seccodecheck)}-->

									<!--{block sectpl}--><sec> <span id="sec<hash>" onclick="showMenu(this.id)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div><!--{/block}-->
									<div class="mtm sec" style="text-align:right;"><!--{subtemplate common/seccheck}--></div>
								<!--{/if}-->
								<p class="ptm pnpost" style="margin-bottom:10px;">
								<button type="submit" name="replysubmit" class="pn pnc vm" style="float:right;" value="replysubmit" id="livereplysubmit">
									<strong>{lang forum_live_post}</strong>
								</button>
								</p>
								</div>
								<input type="hidden" name="formhash" value="{FORMHASH}">
								<input type="hidden" name="subject" value="  ">
							</form>
						</div>
						<span id="livereplypostreturn"></span>
					</div>
					<script type="text/javascript">
						var postminchars = parseInt('$_G['setting']['minpostsize']');
						var postmaxchars = parseInt('$_G['setting']['maxpostsize']');
						var disablepostctrl = parseInt('{$_G['group']['disablepostctrl']}');
						var replycontentlist = new Array();
						var addreplylist = new Array();
						var timeoutid = timeid = movescrollid = waitescrollid = null;
						var replycontentnum = 0;
						getnewlivepostlist(1);
						timeid = setInterval(getnewlivepostlist, 5000);
						$('livereplycontent').style.position = 'absolute';
						$('livereplycontent').style.width = ($('livereplycontentout').clientWidth - 50) + 'px';
						$('livereplymessage').onfocus = function() {
							if(this.style.color == 'gray') {
								this.value = '';
								this.style.color = 'black';
								$('livepostsubmit').style.display = 'block';
								this.style.height = '56px';
								$('livefastcomment').style.height = '57px';
							}
						};
						$('livereplymessage').onblur = function() {
							if(this.value == '') {
								this.style.color = 'gray';
								this.value = '{lang forum_live_fastreply_notice}';
							}
						};

						$('liverefresh').onclick = function() {
							$('livereplycontent').style.position = 'absolute';
							getnewlivepostlist();
							this.style.display = 'none';
						};

						$('livereplycontentout').onmouseover = function(e) {

							if($('livereplycontent').style.position == 'absolute' && $('livereplycontent').clientHeight > 215) {
								$('livereplycontent').style.position = 'static';
								this.scrollTop = this.scrollHeight;
							}

							if(this.scrollTop + this.clientHeight != this.scrollHeight) {
								clearInterval(timeid);
								clearTimeout(timeoutid);
								clearInterval(movescrollid);
								timeid = timeoutid = movescrollid = null;

								if(waitescrollid == null) {
									waitescrollid = setTimeout(function() {
										$('liverefresh').style.display = 'block';
									}, 60000 * 10);
								}
							} else {
								clearTimeout(waitescrollid);
								waitescrollid = null;
							}
						};

						$('livereplycontentout').onmouseout = function(e) {
							if(this.scrollTop + this.clientHeight == this.scrollHeight) {
								$('livereplycontent').style.position = 'absolute';
								clearInterval(timeid);
								timeid = setInterval(getnewlivepostlist, 10000);
							}
						};

						function getnewlivepostlist(first) {
							var x = new Ajax('JSON');
							x.getJSON('forum.php?mod=misc&action=livelastpost&fid=$livethread[fid]', function(s, x) {
								var count = s.data.count;
								$('livereplies').innerHTML = count;
								var newpostlist = s.data.list;
								for(i in newpostlist) {
									var postid = i;
									var postcontent = '';
									postcontent += '<dt><a href="home.php?mod=space&uid=' + newpostlist[i].authorid + '" target="_blank">' + newpostlist[i].avatar + '</a></dt>';
									postcontent += '<dd><a href="home.php?mod=space&uid=' + newpostlist[i].authorid + '" target="_blank">' + newpostlist[i].author + '</a></dd>';
									postcontent += '<dd>' + newpostlist[i].message + '</dd>';
									postcontent += '<dd class="dateline">' + newpostlist[i].dateline + '</dd>';
									if(replycontentlist[postid]) {
										$('livereply_' + postid).innerHTML = postcontent;
										continue;
									}
									addreplylist[postid] = '<dl id="livereply_' + postid + '">' + postcontent + '</dl>';
								}
								if(first) {
									for(i in addreplylist) {
										replycontentlist[i] = addreplylist[i];
										replycontentnum++;
										var div = document.createElement('div');
										div.innerHTML = addreplylist[i];
										$('livereplycontent').appendChild(div);
										delete addreplylist[i];
									}
								} else {
									livecontentfacemove();
								}
							});
						}

						function livecontentfacemove() {
							//note 从队列中取出数据
							var reply = '';
							for(i in addreplylist) {
								reply = replycontentlist[i] = addreplylist[i];
								replycontentnum++;
								delete addreplylist[i];
								break;
							}
							if(reply) {
								var div = document.createElement('div');
								div.innerHTML = reply;
								var oldclientHeight = $('livereplycontent').clientHeight;
								$('livereplycontent').appendChild(div);
								$('livereplycontentout').style.overflowY = 'hidden';
								$('livereplycontent').style.bottom = oldclientHeight - $('livereplycontent').clientHeight + 'px';

								if(replycontentnum > 20) {
									$('livereplycontent').removeChild($('livereplycontent').firstChild);
									for(i in replycontentlist) {
										delete replycontentlist[i];
										break;
									}
									replycontentnum--;
								}

								if(!movescrollid) {
									movescrollid = setInterval(function() {
										if(parseInt($('livereplycontent').style.bottom) < 0) {
											$('livereplycontent').style.bottom =
												((parseInt($('livereplycontent').style.bottom) + 5) > 0 ? 0 : (parseInt($('livereplycontent').style.bottom) + 5)) + 'px';
										} else {
											$('livereplycontentout').style.overflowY = 'auto';
											clearInterval(movescrollid);
											movescrollid = null;
											timeoutid = setTimeout(livecontentfacemove, 1000);
										}
									}, 100);
								}
							}
						}

						function livereplypostvalidate(theform) {
							var s;
							if(theform.message.value == '' || $('livereplymessage').style.color == 'gray') {
								s = '{lang forum_live_nocontent_error}';
							}
							if(!disablepostctrl && ((postminchars != 0 && mb_strlen(theform.message.value) < postminchars) || (postmaxchars != 0 && mb_strlen(theform.message.value) > postmaxchars))) {
								s = {lang forum_live_nolength_error};
							}
							if(s) {
								showError(s);
								doane();
								$('livereplysubmit').disabled = false;
								return false;
							}
							$('livereplysubmit').disabled = true;
							theform.message.value = theform.message.value.replace(/([^>=\]"'\/]|^)((((https?|ftp):\/\/)|www\.)([\w\-]+\.)*[\w\-\u4e00-\u9fa5]+\.([\.a-zA-Z0-9]+|\u4E2D\u56FD|\u7F51\u7EDC|\u516C\u53F8)((\?|\/|:)+[\w\.\/=\?%\-&~`@':+!]*)+\.(jpg|gif|png|bmp))/ig, '$1[img]$2[/img]');
							theform.message.value = parseurl(theform.message.value);
							ajaxpost('livereplypostform', 'livereplypostreturn', 'livereplypostreturn', 'onerror', $('livereplysubmit'));
							return false;
						}

						function succeedhandle_livereplypost(url, msg, param) {
							$('livereplymessage').value = '';
							$('livereplycontent').style.position = 'absolute';
							if(param['sechash']) {
								updatesecqaa(param['sechash']);
								updateseccode(param['sechash']);
							}
							getnewlivepostlist();
						}
					</script>
				<!--{/if}-->
	<div class="forumlistitle">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th colspan="{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}3{else}2{/if}">
				<!--{if CURMODULE != 'guide'}-->
					<div class="bus_fl" style=" width:100%">
						<!--{if $_GET['specialtype'] == 'reward'}-->
							<a id="filter_reward" href="javascript:;" class="showmenu xi2{if $_GET['rewardtype']} xw1{/if}" onclick="showMenu(this.id)"><!--{if $_GET['rewardtype'] == ''}-->{lang all_reward}<!--{elseif $_GET['rewardtype'] == '1'}-->{lang rewarding}<!--{elseif $_GET['rewardtype'] == '2'}-->{lang reward_solved}<!--{/if}--></a>&nbsp;
						<!--{/if}-->
						<a id="filter_special" href="javascript:;" class="showmenu xi2{if $_GET['specialtype']} xw1{/if}" onclick="showMenu(this.id)"><!--{if $_GET['specialtype'] == 'poll'}-->{lang thread_poll}<!--{elseif $_GET['specialtype'] == 'trade'}-->{lang thread_trade}<!--{elseif $_GET['specialtype'] == 'reward'}-->{lang thread_reward}<!--{elseif $_GET['specialtype'] == 'activity'}-->{lang thread_activity}<!--{elseif $_GET['specialtype'] == 'debate'}-->{lang thread_debate}<!--{else}-->{lang threads_all}<!--{/if}--></a>&nbsp;						
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost$forumdisplayadd[lastpost]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="xi2{if $_GET['filter'] == 'lastpost'} xw1{/if}">{lang latest}</a>&nbsp;
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="xi2{if $_GET['filter'] == 'heat'} xw1{/if}">{lang order_heats}</a>&nbsp;
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=hot" class="xi2{if $_GET['filter'] == 'hot'} xw1{/if}">{lang hot_thread}</a>&nbsp;
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="xi2{if $_GET['filter'] == 'digest'} xw1{/if}">{lang digest_posts}</a>&nbsp;
						<a id="filter_dateline" href="javascript:;" class="showmenu xi2{if $_GET['dateline']} xw1{/if}" onclick="showMenu(this.id)">{lang more}</a>&nbsp;
						<!--{if empty($_G['forum']['picstyle']) && $_GET['orderby'] == 'lastpost' && (!$_G['setting']['forumseparator'] || !$separatepos) && !$_GET['filter']}-->
							<a href="javascript:;" onclick="checkForumnew_btn('{$_G['fid']}')" title="{lang showupgrade}" class="forumrefresh"></a>
						<!--{/if}-->
						<!--{if $_GET['filter'] == 'hot'}-->
							<script type="text/javascript" src="{$_G[setting][jspath]}calendar.js?{VERHASH}"></script>
							<span>$ctime</span>
							<img src="{IMGDIR}/date_magnify.png" class="cur1" alt="" id="hottime" value="$ctime" fid="$_G[fid]" onclick="showcalendar(event, this, false, false, false, false, function(){viewhot(this);});" align="absmiddle" />
						<!--{/if}-->
						<span id="clearstickthread" style="display: none;">
							<span class="pipe">|</span>
							<a href="javascript:;" onclick="clearStickThread()" class="xi2" title="{lang showdisplayorder}">{lang showdisplayorder}</a>
						</span>
						<!--{hook/forumdisplay_filter_extra}-->
						<span id="atarget" {if $_G['cookie']['atarget'] > 0}onclick="setatarget(-1)" atarget_1"{else}onclick="setatarget(1)" {/if} title="{lang new_window_thread}">{lang new_window}</span>
				<!--{if empty($_G['forum']['picstyle'])}-->
					<!--{if CURMODULE == 'guide'}-->
						{lang forum_group}
					<!--{/if}-->
				<!--{else}-->
					<a{if empty($_G['cookie']['forumdefstyle'])} href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=yes" class="chked"{else} href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=no" class="unchk"{/if} title="{lang view_thread_imagemode}{lang view_thread}">{lang view_thread_imagemode}</a>
				<!--{/if}-->
					</div>
				<!--{else}-->
					{lang title}
				<!--{/if}-->
				</th>
			</tr>
		</table>
	</div>
    
    <!--{if ($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || count($_G['forum']['threadsorts']['types']) > 0}-->
                        <div class="bus_sort">
                        <div id="thread_types" class="ttp bm cl">
                            <!--{hook/forumdisplay_threadtype_inner}-->
                            <a id="ttp_all" {if !$_GET['typeid'] && !$_GET['sortid']}class="xw1 a"{/if} href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_G['forum']['threadsorts']['defaultshow']}&filter=sortall&sortall=1{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang forum_viewall}</a>
                            <!--{if $_G['forum']['threadtypes']}-->
                                <!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
                                    <!--{if $_GET['typeid'] == $id}-->
                                    <a class="xw1 a" href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['sortid']}&filter=sortid&sortid=$_GET['sortid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"><!--{if $_G[forum][threadtypes][icons][$id] && $_G['forum']['threadtypes']['prefix'] == 2}--><img class="vm" src="$_G[forum][threadtypes][icons][$id]" alt="" /> <!--{/if}-->$name<!--{if $showthreadclasscount[typeid][$id]}--><span class="xg1 num">$showthreadclasscount[typeid][$id]</span><!--{/if}--></a>
                                    <!--{else}-->
                                    <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}"><!--{if $_G[forum][threadtypes][icons][$id] && $_G['forum']['threadtypes']['prefix'] == 2}--><img class="vm" src="$_G[forum][threadtypes][icons][$id]" alt="" /> <!--{/if}-->$name<!--{if $showthreadclasscount[typeid][$id]}--><span class="xg1 num">$showthreadclasscount[typeid][$id]</span><!--{/if}--></a>
                                    <!--{/if}-->
                                <!--{/loop}-->
                            <!--{/if}-->
    
                            <!--{if $_G['forum']['threadsorts']}-->
                                <!--{if $_G['forum']['threadtypes']}--><li><span class="pipe">|</span></li><!--{/if}-->
                                <!--{loop $_G['forum']['threadsorts']['types'] $id $name}-->
                                    <!--{if $_GET['sortid'] == $id}-->
                                    <a class="xw1 a" href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['typeid']}&filter=typeid&typeid=$_GET['typeid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name<!--{if $showthreadclasscount[sortid][$id]}--><span class="xg1 num">$showthreadclasscount[sortid][$id]</span><!--{/if}--></a>
                                    <!--{else}-->
                                    <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$id$forumdisplayadd[sortid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name<!--{if $showthreadclasscount[sortid][$id]}--><span class="xg1 num">$showthreadclasscount[sortid][$id]</span><!--{/if}--></a>
                                    <!--{/if}-->
                                <!--{/loop}-->
                            <!--{/if}-->
                            <!--{hook/forumdisplay_filter_extra}-->
                        </div>
                        </div>
                        <script type="text/javascript">showTypes('thread_types');</script>
    <!--{/if}-->
    <!--{hook/forumdisplay_threadtype_extra}-->
