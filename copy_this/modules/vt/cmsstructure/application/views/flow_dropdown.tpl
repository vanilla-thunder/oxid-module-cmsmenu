<li [{if $oTopCont->hasSubpages() }]class="dropdown"[{/if}]>
   <a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}][{if $oTopCont->hasSubpages()}] <i class="fa fa-angle-down"></i>[{/if}]</a>
   [{if $oTopCont && $oTopCont->hasSubpages() }]
      <ul class="dropdown-menu">
         [{foreach from=$oTopCont->getSubpages() item=oSubCont }]
            <li>
               <a href="[{$oSubCont->getLink()}]">[{$oSubCont->oxcontents__oxtitle->value}]</a>
            </li>
            [{if $oSubCont->hasSubpages() }]
               [{foreach from=$oSubCont->getSubpages() item=oSubSubCont }]
                  <li>
                     <a href="[{$oSubSubCont->getLink()}]"><i class="fa fa-angle-right fa-fw"></i> [{$oSubSubCont->oxcontents__oxtitle->value}]</a>
                  </li>
               [{/foreach}]
            [{/if}]
         [{/foreach}]
      </ul>
   [{/if}]

</li>