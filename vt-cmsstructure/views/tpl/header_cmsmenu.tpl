[{if $oCont && $oCont->hasSubpages()}]
[{if $iCurrentNavigationLevel == null }][{assign var="iCurrentNavigationLevel" value=0}][{/if}]
<ul>
    [{foreach from=$oCont->getSubpages() item=subpage }]
        <li>
            <a href="[{$subpage->getLink()}]">[{$subpage->oxcontents__oxtitle->value}]</a>
            [{if $subpage->hasSubpages() && $iCurrentNavigationLevel < $iTotalNavigationLevels }]
                [{include file="header_cmsmenu.tpl" oCont=$subpage iCurrentNavigationLevel=$iCurrentNavigationLevel+1 iTotalNavigationLevels=$iTotalNavigationLevels }]
            [{/if}]
        </li>
    [{/foreach}]
</ul>
[{/if}]