<li class="nav-item [{if $homeSelected == 'false' && $oTopCont->expanded}]active[{/if}] [{if $oTopCont->hasSubpages() }]dropdown[{/if}]">
   <a class="nav-link" href="[{$oTopCont->getLink()}]"[{if $ocat->getSubCats()}] class="dropdown-toggle" data-toggle="dropdown"[{/if}]>
      [{$oTopCont->oxcontents__oxtitle->value}][{if $oTopCont->hasSubpages()}] <i class="fa fa-angle-down"></i>[{/if}]
   </a>

   [{if $oTopCont && $oTopCont->hasSubpages() }]
      <ul class="dropdown-menu">
         [{foreach from=$oTopCont->getSubpages() item=oSubCont }]
            <li class="dropdown-item[{if $homeSelected == 'false' && $oSubCont->expanded}] active[{/if}]">
               <a class="dropdown-link[{if $homeSelected == 'false' && $oSubCont->expanded}] current[{/if}]" href="[{$oSubCont->getLink()}]">[{$oSubCont->oxcontents__oxtitle->value}]</a>
            </li>
            [{if $oSubCont->hasSubpages() }]
               [{foreach from=$oSubCont->getSubpages() item=oSubSubCont }]
                  <li class="dropdown-item[{if $homeSelected == 'false' && $oSubSubCont->expanded}] active[{/if}]">
                     <a class="dropdown-link[{if $homeSelected == 'false' && $oSubSubCont->expanded}] active[{/if}]" href="[{$oSubSubCont->getLink()}]"><i class="fa fa-angle-right fa-fw"></i> [{$oSubSubCont->oxcontents__oxtitle->value}]</a>
                  </li>
               [{/foreach}]
            [{/if}]
         [{/foreach}]
      </ul>
   [{/if}]
</li>