[{if $iCurrentNavigationLevel == null }]
[{assign var="iCurrentNavigationLevel" value=0}]
[{/if}]
<ul>
    [{foreach from=$cat->getSubpages() item=subpage }]
        <li>
            <a href="[{$subpage->getLink()}]">[{$subpage->oxcontents__oxtitle->value}]</a>
            [{if $subpage->hasSubpages() && $iCurrentNavigationLevel < $iTotalNavigationLevels }]
                [{include file="cmssubpages.tpl" cat=$subpage iCurrentNavigationLevel=$iCurrentNavigationLevel+1 iTotalNavigationLevels=$iTotalNavigationLevels }]
            [{/if}]
        </li>
    [{/foreach}]
</ul>