[{if $oView->getMenueList() }]

    [{if $oView->getClassName() == "content" }]
       [{assign var="top" value=$oView->getRootContentLoadId() }]
       [{assign var="oContent" value=$oView->getContent() }]
       [{assign var="current" value=$oContent->getLoadId()}]
    [{elseif $oView->getClassName() == "contact" }]
       [{assign var="current" value="placeholder_contact"}]
       [{assign var="top" value="cmsmenu_top1_sub2" }]
    [{elseif $oView->getClassName() == "newsletter" }]
       [{assign var="current" value="placeholder_newsletter"}]
       [{assign var="top" value="cmsmenu_top1_sub2" }]
    [{/if}]
    
<div class="categoryBox">
    <ul class="tree" id="tree">
        [{* first level *}]
        [{foreach from=$oView->getMenueList() item=_cms}]
            <li class="[{if $_cms->getLoadId() == $current}]active[{elseif $_cms->getLoadId() == $top}]exp[{/if}]" >
                <a href="[{$_cms->getLink()}]">
                    [{if $_cms->hasSubpages()}]<i><span></span></i>[{/if}]
                    [{ $_cms->oxcontents__oxtitle->value }]
                </a>
                [{if $_cms->hasSubpages() && ($_cms->getLoadId() == $current || $_cms->getLoadId() == $top) }]
                    <ul>
                        [{foreach from=$_cms->getSubpages() item="_subcms"}]
                        <li class="[{if $_subcms->getLoadId() == $current}]active[{/if}] [{if $_subcms->oxcontents__oxparentloadid->value == $top}]end[{/if}]" >
                            <a href="[{$_subcms->getLink()}]"><i></i>[{ $_subcms->oxcontents__oxtitle->value }]</a>
                        </li>
                        [{/foreach}]
                    </ul>
                [{/if}]
            </li>
        [{/foreach}]
    </ul>
</div>
[{/if}]