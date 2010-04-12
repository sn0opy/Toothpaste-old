
<h2>Add new </h2>

<div class="add">
	<form action="?add" method="post">
	<textarea name="source" cols="40" rows="40"></textarea>
	
	<div class="meta">
		<ul>
			<li>
			<span>Hilight </span><select name="type">
				<option value="AS3">AS3</option>
				<option value="Bash">Bash</option>
				<option value="ColdFusion">ColdFusion</option>
				<option value="Cpp">C++</option>
				<option value="CSharp">C#</option>
				<option value="Css">CSS</option>
				<option value="Delphi">Delphi</option>
				<option value="Diff">Diff</option>
				<option value="Erlang">Erlang</option>
				<option value="Groovy">Groovy</option>
				<option value="Java">Java</option>
				<option value="JavaFX">JavaFX</option>
				<option value="JScript">JavaScript</option>
				<option value="Perl">Perl</option>
				<option value="Php">PHP</option>
				<option value="Plain" selected="selected">Plain</option>
				<option value="PowerShell">PowerShell</option>
				<option value="Python">Python</option>
				<option value="Ruby">Ruby</option>
				<option value="Sql">SQL</option>
				<option value="Vb">VisualBasic</option>
				<option value="Xml">XML</option>
			</select>
			</li>
			<li><span>Private </span><input type="checkbox" name="private" class="checkbox" /></li>
			<li><span>&nbsp;</span><input type="submit" name="submit" value="Paste" class="pastebutton" /></li>
		</ul>
		</form>
	</div>
	<br class="clearfix" />
</div>