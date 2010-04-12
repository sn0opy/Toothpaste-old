
<h2>Last 10 Pastes</h2>
<? $used = array(); ?>
<? foreach($vars as $paste): ?>

<? if(!in_array($paste['type'], $used)): ?>
<script type="text/javascript" src="media/js/shBrush<?=$paste['type']?>.js"></script>
<? endif; ?>

<div class="codeMeta">
	<a href="./?pasteID=<?=$paste['pasteID']?>">#</a> <?=date('Y-m-d g:i a', $paste['date'])?> ~ <?=$paste['hits']?> hits
</div>
<div class="codeField">
	<pre class="brush: <?=strtolower($paste['type'])?>;"><?=$paste['source']?>
	</pre>
</div>

<? $used[] = $paste['type']; ?>
<? endforeach; ?>
