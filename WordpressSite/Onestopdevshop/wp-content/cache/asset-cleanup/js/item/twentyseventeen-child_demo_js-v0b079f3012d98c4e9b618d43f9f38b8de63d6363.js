/*!/wp-content/themes/twentyseventeen-child/assets/js/demo.js*/
jQuery(document).ready(function(){var example=jQuery('[data-mrc]');example.on('beforeInitSwitch.mrc',function(e,inst,sets){});example.on('change.mrc',function(e,inst,sets){});example.on('beforeOpen.mrc',function(e,inst,sets,content,height){});example.on('beforeClose.mrc',function(e,inst,sets,content,height){});example.on('beforeDrop.mrc',function(e,inst,sets,content,height){});example.on('afterDrop.mrc',function(e,inst,sets,content){});example.on('afterOpen.mrc',function(e,inst,sets,content){});example.on('afterOpen.mrc',function(e,inst,sets,content){});example.moreContent({speed:800,shadow:!0});jQuery('.method-controls button').on('click',function(){var methName=jQuery(this).data('meth');console.log('Method: '+methName);example.moreContent(methName)})})
;