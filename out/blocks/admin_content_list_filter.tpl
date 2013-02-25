[{capture assign="blockcontent"}]
[{$smarty.block.parent}]
[{/capture}]
[{$blockcontent|replace:'colspan="2"':'colspan="3"'}]


