<tr>
	<td class="edittext">parent ident.</td>
	<td class="edittext">
		<input type="text" size="28" maxlength="32" class="editinput" name="editval[oxcontents__oxparentloadid]" value="[{ $edit->oxcontents__oxparentloadid->value }]" >
	</td>
</tr>
<tr>
	<td class="edittext">sort</td>
	<td class="edittext">
		<input type="text" size="28" maxlength="11" class="editinput" name="editval[oxcontents__oxsort]" value="[{ $edit->oxcontents__oxsort->value }]" >
	</td>
</tr>
<tr>
   <td class="edittext">
      <input type="hidden" id="blExternalCMS" name="editval[oxcontents__external]" value="0">
      <input type="checkbox" id="blExternalCMS" name="editval[oxcontents__external]" value="1" [{if $edit->oxcontents__external->value == "1" }]checked[{/if}] >
   </td>
   <td class="edittext"><label for="blExternalCMS">externe Seite</label></td>
</tr>
<tr><td colspan="2"><hr></td></tr>
[{$smarty.block.parent}]