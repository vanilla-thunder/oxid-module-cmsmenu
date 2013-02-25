[{capture assign="blockcontent"}]
[{$smarty.block.parent}]
[{/capture}]
[{$blockcontent|replace:'colspan="2"':'colspan="1"'}]

<td class="listheader" colspan="2">&nbsp;
	<a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxcontents', 'oxparentloadid', 'asc');document.search.submit();" class="listheader">parent ident</a>
</td>