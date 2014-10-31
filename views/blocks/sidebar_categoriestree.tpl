[{*
	cms tree navigation for sidebar
	(like category tree, but for cms pages)
	works at least in OXID 4.7
*}]

[{* main menu list *}]
[{if $oView->getMenueList() }]

    [{if $oView->getClassName() == "content" }]
        [{assign var="current" value=$oViewConf->getContentId()}]
        [{assign var="top" value=$oView->getRootContentId() }]
    [{/if}]

    <ul class="side-nav" id="cmsmenu">
        [{foreach from=$oView->getMenueList() item="_cms"}]
            <li class="[{$_cms->oxcontents__oxloadid->value}] [{if $_cms->getId() == $current || $_cms->getId() == $top}]expanded[{/if}]">
                <a href="[{$_cms->getLink()}]"><i class="fa fa-lg"></i> [{$_cms->oxcontents__oxtitle->value}]</a>
                [{if $_cms->hasSubpages()}]
                    <ul class="cmssubmenu">
                        [{foreach from=$_cms->getSubpages() item="_subcms"}]
                            <li><a href="[{$_subcms->getLink()}]">[{$_subcms->oxcontents__oxtitle->value}]</a></li>
                        [{/foreach}]
                    </ul>
                [{/if}]
            </li>
        [{/foreach}]
    </ul>
[{/if}]

[{$smarty.block.parent}]