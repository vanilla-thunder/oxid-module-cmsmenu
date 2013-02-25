[{capture assign="blockcontent"}]
[{$smarty.block.parent}]
[{/capture}]

[{ assign var="content" value="td class"|explode:$blockcontent}]
[{capture assign="insertcontent"}]td valign="top" class="[{ $listclass}]"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('[{ $listitem->oxcontents__oxid->value}]');" class="[{ $listclass}]">[{ $listitem->oxcontents__oxparentloadid->value }]</a></div></td><td class[{/capture}]

[{strip}][{$content[0]|cat:$insertcontent|cat:$content[1] }][{/strip}]