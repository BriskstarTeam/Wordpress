;(function($){var defaults={height:160,useCss:true,speed:250,open:false,event:'click',shadow:false,easing:'swing',textClose:'Show More',textOpen:'Close',tpl:{content:'<div class="mrc-content"></div>',contentWrap:'<div class="mrc-content-wrap"></div>',btn:'<button class="mrc-btn btn small w-button" type="button"></button>',btnWrap:'<div class="mrc-btn-wrap"></div>',controls:'<div class="mrc-controls"></div>',shadow:'<div class="mrc-shadow"></div>',}};var MoreContent=function(el,options){this.$self=el;this.init(options);},__,meth=MoreContent.prototype;meth.init=function(options){var _=this,self=_.$self,$self=$(self),adp;if(_.inited===true)return;_.defaults=$.extend(true,{},defaults,$.fn.moreContent.defaults);_.options=options||{};_.dataOptions=$(self).data('mrc')||{};_.defaults.textClose=$(self).attr('data-buttonmore');_.defaults.textOpen=$(self).attr('data-buttonless');_.settings=sets=$.extend(true,{},_.defaults,_.options,_.dataOptions);_.src={html:$self.html()||'',class:$self.attr('class')||'',style:$self.attr('style')||''};_.nsid=__.getRndNum(10000,99999);_.status=sets.open;_.dropped=false;_.manually=false;_.createMarkup();_.getCurMode();_.layout.btn.on(sets.event,function(){_.toggle.call(_);});adp=__.debounce(function(){_.getAdaptive.call(_);},150);$(window).on('resize.mrc-'+_.nsid,adp);$self.trigger('beforeInitSwitch.mrc',[_,sets]);_.status?_.open(true):_.close(true);setTimeout(function(){_.inited=true;$self.trigger('afterInit.mrc',[_,sets]);},sets.speed+5);};meth.createMarkup=function(){var _=this,self=_.$self,sets=_.settings,lt=_.layout={},cssh;lt.self=$(self).addClass('mrc');lt.self.wrapInner(sets.tpl.content);lt.content=lt.self.children().css('overflow','hidden');lt.content.wrapInner(sets.tpl.contentWrap);lt.contentWrap=lt.content.children().css('overflow','hidden');lt.controls=$(sets.tpl.controls).appendTo(lt.self);lt.btn=$(sets.tpl.btn).text(sets.textClose).insertAfter(lt.controls).wrap($(sets.tpl.btnWrap)).hide().fadeIn(sets.speed);lt.btnWrap=lt.btn.parent().appendTo(lt.controls);if(sets.shadow){lt.content.css('position','relative');lt.shadow=$(sets.tpl.shadow).appendTo(lt.content);}
if(sets.useCss)
cssh=parseInt(getComputedStyle(self).maxHeight);lt.self.css({'max-height':'none','min-height':'none'});if(cssh&&cssh>0){_.setContent(cssh);sets.height=cssh;}};meth.open=function(force){var _=this,sets=_.settings,lt=_.layout;if(_.status&&!force)return;if(!_.mode)
lt.btnWrap.hide();lt.btn.text(sets.textOpen);if(sets.shadow)
lt.shadow.fadeOut(sets.speed);lt.self.trigger('beforeOpen.mrc',[_,sets,lt.content,_.fullHeight+'px']);if(!_.manually)
lt.content.animate({height:_.fullHeight+'px'},(_.mode?sets.speed:0),sets.easing,function(){_.afterChange('open');});_.manually=false;_.status=true;};meth.close=function(force){var _=this,sets=_.settings,lt=_.layout;if((!_.status&&!force)&&!_.dropped)return;if(!_.mode&&sets.useCss)_.setContent();if(!_.mode)
lt.btnWrap.hide();lt.btn.text(sets.textClose);if(sets.shadow){_.mode?lt.shadow.fadeIn(sets.speed):lt.shadow.fadeOut(sets.speed);}
lt.self.trigger('beforeClose.mrc',[_,sets,lt.content,(_.mode?sets.height:'')+'px']);if(!_.manually)
lt.content.animate({height:(_.mode?sets.height:'')+'px'},sets.speed,sets.easing,function(){_.afterChange('close');});_.manually=false;_.dropped=false;_.status=false;};meth.drop=function(num,unit){var _=this,lt=_.layout,num=num||100,unit=unit||'px';_.getCurMode();if(_.curHeight>=_.fullHeight||!_.mode)return false;var pxExt=unit=='%'?Math.ceil(num*_.fullHeight/100):num;pxPush=_.curHeight+pxExt;if(pxPush>=_.fullHeight){pxExt=_.fullHeight-_.curHeight;pxPush=_.curHeight+pxExt;lt.btn.text(sets.textOpen);if(sets.shadow)
lt.shadow.fadeOut(sets.speed);if(_.status)_.setContent();lt.self.addClass('open');_.dropped=false;_.status=true;}else{_.dropped=Math.ceil(_.curHeight/(_.fullHeight/100));}
_.curHeight=pxPush;lt.self.trigger('beforeDrop.mrc',[_,sets,lt.content,pxPush+'px']);if(!_.manually)
lt.content.animate({'height':pxPush+'px'},sets.speed,sets.easing,function(){_.afterChange('drop');});};meth.toggle=function(){var _=this;_.status?_.close(true):_.open(true);};meth.afterChange=function(act){var _=this,sets=_.settings,lt=_.layout;_.calcSizes();switch(act){case'open':_.setContent();lt.self.addClass('open');lt.self.trigger('afterOpen.mrc',[_,sets,lt.content]);break;case'close':lt.self.removeClass('open');lt.self.trigger('afterClose.mrc',[_,sets,lt.content]);break;case'drop':if(_.status)_.setContent();if(_.curHeight>=_.fullHeight)
lt.self.removeClass('dropped');else lt.self.addClass('dropped');lt.self.trigger('afterDrop.mrc',[_,sets,lt.content]);break;default:return;}
lt.self.trigger('change.mrc',[_,sets]);};meth.setContent=function(i){this.layout.content.css('height',i||'');};meth.calcSizes=function(){var _=this,sets=_.settings,lt=_.layout;_.curHeight=lt.content.get(0).clientHeight||0;_.fullHeight=lt.contentWrap.get(0).clientHeight||0;};meth.getCurMode=function(){var _=this,sets=_.settings,h=sets.height;_.calcSizes();if(_.fullHeight>=h&&_.mode!=true)_.mode=true;else if(_.fullHeight<h&&_.mode!=false)_.mode=false;};meth.getAdaptive=function(){var _=this,sets=_.settings,lt=_.layout,height;_.getCurMode();if(_.mode){if(_.dropped){height=_.dropped*(_.fullHeight/100);if(height<sets.height)height=sets.height
lt.content.animate({'height':height+'px'},250);}
lt.btnWrap.fadeIn(sets.speed);if(_.status)_.setContent();else{_.setContent(_.curHeight);if(sets.shadow)lt.shadow.fadeIn(sets.speed);}}else{lt.btnWrap.hide();_.setContent();if(sets.shadow)
lt.shadow.fadeOut(sets.speed);}
lt.self.trigger('change.mrc',[_,sets]);};meth.destroy=function(){var _=this,self=_.$self,sets=_.settings,lt=_.layout;if(!_.inited)return;$(window).off('resize.mrc-'+_.nsid);lt.self.attr({class:_.src.class,style:_.src.style}).html(_.src.html);lt.content.remove();lt.controls.remove();delete self.MoreContent;};meth.reinit=function(newOpts){var _=this,self=_.$self,sets=(typeof newOpts=='object'&&Object.keys(newOpts).length!=0)?newOpts:$.extend(true,{},_.settings);_.destroy();$(self).moreContent(sets);};__={getRndNum:function(min,max){return Math.round(min-0.5+Math.random()*(max-min+1));},debounce:function(fn,wait){var timeout;return function(){var context=this,args=arguments;var later=function(){timeout=null;fn.apply(context,args);};var callNow=!timeout;clearTimeout(timeout);timeout=setTimeout(later,wait);if(callNow)fn.apply(context,args);};}};$.fn.moreContent=function(){var pn='MoreContent',args=arguments,mth=args[0];$.each(this,function(i,it){if(typeof mth=='object'||typeof mth=='undefined')
it[pn]=crtInst(it,mth);else if(mth==='init'||mth==='reinit')
it[pn]?getMeth(it,mth,args):it[pn]=crtInst(it,args[1]);else getMeth(it,mth,args);});function getMeth(it,mth,args){if(!(it[pn]instanceof MoreContent))return;if(!(mth in it[pn]))return;return it[pn][mth].apply(it[pn],Array.prototype.slice.call(args,1));};function crtInst(it,mth){if(it[pn]instanceof MoreContent)return;return new MoreContent(it,mth);};return this;};$.fn.moreContent.prototype=MoreContent.prototype;$.fn.moreContent.defaults=defaults;})(jQuery);