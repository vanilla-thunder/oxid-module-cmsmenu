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


    [{if $oViewConf->getActiveTheme() == 'bestlife'}] [{* you can adapt this code for your custom theme *}]
        <ul class="side-nav" id="cmsmenu">
            [{foreach from=$oView->getMenueList() item="_cms"}]
                <li class="[{$_cms->oxcontents__oxloadid->value}]">
                    <a href="[{$_cms->getLink()}]" class="[{if $_cms->getLoadId() == $current}]active[{elseif $_cms->getLoadId() == $top}]expanded[{/if}]">
                        <i class="fa fa-lg fa-fw"></i> [{$_cms->oxcontents__oxtitle->value}]
                    </a>
                    <i class="fa fa-lg fa-fw"></i>
                    [{if $_cms->hasSubpages()}]
                        <ul class="cmssubmenu">
                            [{foreach from=$_cms->getSubpages() item="_subcms"}]
                                <li>
                                    <a href="[{$_subcms->getLink()}]" class="[{if $_subcms->getLoadId() == $current}]active[{/if}]">
                                        [{$_subcms->oxcontents__oxtitle->value}]
                                    </a>
                                    <i class="fa fa-lg fa-fw"></i>
                                </li>
                            [{/foreach}]
                        </ul>
                    [{/if}]
                </li>
            [{/foreach}]
        </ul>
    [{else}] [{* code for default azure theme *}]
        <div class="categoryBox">
            <ul class="tree" id="tree">
                [{* first level *}]
                [{foreach from=$oView->getMenueList() item=_cms}]
                    <li class="[{if $_cms->getLoadId() == $current}]active[{elseif $_cms->getLoadId() == $top}]exp[{/if}]">
                        <a href="[{$_cms->getLink()}]">
                            [{if $_cms->hasSubpages()}]<i><span></span></i>[{/if}]
                            [{ $_cms->oxcontents__oxtitle->value }]
                        </a>
                        [{if $_cms->hasSubpages() && ($_cms->getLoadId() == $current || $_cms->getLoadId() == $top) }]
                            <ul>
                                [{foreach from=$_cms->getSubpages() item="_subcms"}]
                                    <li class="[{if $_subcms->getLoadId() == $current}]active[{/if}] [{if $_subcms->oxcontents__oxparentloadid->value == $top}]end[{/if}]">
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
[{/if}]
