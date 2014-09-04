[{*
	cms tree navigation for sidebar
	(like category tree, but for cms pages)
	works at least in OXID 4.7
*}]
[{if $oView->getClassName() == "content" }]
    [{assign var="act" value=$oView->getContent() }]
    [{assign var="root" value=$oView->getRootContent() }]
    <div class="categoryBox">
        <ul class="tree" id="tree">
            <li class="[{if $act && $act->getId()==$root->getId() }]active[{else}]exp[{/if}][{if !$root->hasSubpages()}] end[{/if}]">
                <a href="[{$root->getLink()}]">
                    <i><span></span></i>[{$root->oxcontents__oxtitle->value}]
                </a>

                [{if $root->hasSubpages()}]
                    <ul>
                        [{foreach from=$root->getSubpages() item="_cont"}]
                            <li class="[{if $act && $act->getId()==$_cont->getId() }]active[{elseif $act->oxcontents__oxparentloadid->value == $_cont->oxcontents__oxloadid->value}]exp[{/if}][{if !$_cont->hasSubpages()}] end[{/if}]">
                                <a href="[{$_cont->getLink()}]">
                                    <i><span></span></i>[{$_cont->oxcontents__oxtitle->value}]
                                </a>

                                [{if ( $act && $act->getId()==$_cont->getId() || $act->oxcontents__oxparentloadid->value == $_cont->oxcontents__oxloadid->value ) && $_cont->hasSubpages()}]
                                    <ul>
                                        [{foreach from=$_cont->getSubpages() item="_subcont"}]
                                            <li class="[{if $act && $act->getId()==$_subcont->getId() }]active[{/if}][{if !$_subcont->hasSubpages()}] end[{/if}]">
                                                <a href="[{$_subcont->getLink()}]">
                                                    <i><span></span></i>[{$_subcont->oxcontents__oxtitle->value}]
                                                </a>
                                            </li>
                                        [{/foreach}]
                                    </ul>
                                [{/if}]
                            </li>
                        [{/foreach}]
                    </ul>
                [{/if}]
            </li>
        </ul>
    </div>
[{/if}]
