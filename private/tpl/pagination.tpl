{if $pagination.max > 1}

	<ul class="pagination">

	{if $pagination.current > 1}
		<li><a href="#" title="Page précédente"  class="pag-{$pagination.current-1}">&lt;</a></li>
		{if $pagination.current-3 > 1}
			<li><a href="#" title="Page 1" class="pag-1">1</a></li>
			{if $pagination.current-3 > 2}
			<li><span>...</span></li>
			{/if}
		{/if}
		{section name=pagination start=$pagination.current-3 loop=$pagination.current}
		{if $smarty.section.pagination.index > 0}
		<li>
			<a href="#" title="Page {$smarty.section.pagination.index}" class="pag-{$smarty.section.pagination.index}">{$smarty.section.pagination.index}</a>
		</li>
		{/if}
		{/section}
	{/if}

	<li><span class="current">{$pagination.current}</span></li>

	{if $pagination.max > $pagination.current}
		{section name=pagination start=$pagination.current+1 loop=$pagination.current+4}
		{if $smarty.section.pagination.index <= $pagination.max}
		<li>
			<a href="#" title="Page {$smarty.section.pagination.index}" class="pag-{$smarty.section.pagination.index}">{$smarty.section.pagination.index}</a>
		</li>
		{/if}
		{/section}
	{/if}

	{if $pagination.current+3 < $pagination.max}
		{if ($pagination.max - $pagination.current) > 4}
		<li><span>...</span></li>
		{/if}
		<li><a href="#" title="Page {$pagination.max}" class="pag-{$pagination.max}">{$pagination.max}</a></li>
	{/if}

	{if $pagination.current < $pagination.max}
		<li><a href="#" title="Page suivante" class="pag-{$pagination.current+1}">&gt;</a></li>
	{/if}

</ul>
{/if}
<div class="separator"></div>