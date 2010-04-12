<? if(count($vars)): ?>
<? if(!isset($vars['error'])): ?>
<script type="text/javascript" src="media/js/shBrush<?=$vars['type']?>.js"></script>
<div class="codeMeta">
	<?=date('Y-m-d g:i a', $vars['date'])?> ~ <?=$vars['hits']?> hits
</div>
<div class="codeField">
	<pre class="brush: <?=strtolower($vars['type'])?>;"><?=$vars['source']?>
	</pre>
</div>
<? endif; ?>
<? endif; ?>