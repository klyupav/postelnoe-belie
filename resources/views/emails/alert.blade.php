<pre style='color: red'>
    @if (isset($text))
<?=$text?>
    @endif
</pre>
<pre>
    @if (isset($context))
<?=print_r($context, true)?>
    @endif
</pre>