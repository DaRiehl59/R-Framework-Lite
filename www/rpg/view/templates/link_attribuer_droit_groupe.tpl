{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="attribuer">
                <fieldset class="list">
                    <legend>Attribution des Droits</legend>
{if $items1|@count eq 1}
                    <form id="link_frm" action="?c=attribuer&amp;id_droit={$items1[0]->id}" method="post">
{elseif $items2|@count eq 1}
                    <form id="link_frm" action="?c=attribuer&amp;id_groupe={$items2[0]->id}" method="post">
{else}
                    <form id="link_frm" action="?c=attribuer" method="post">
{/if}
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
{section name=link_sec0 loop=$items2}
                                        <th>{$items2[link_sec0]->nom}</th>
{/section}
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
{section name=link_sec0 loop=$items2}
<th><input type="checkbox" name="all[{$items2[link_sec0]->id}]" onClick="toggle(this, 'links', {$items2[link_sec0]->id}, {$begin}, {$end})" title="tout cocher"></th>
{/section}
                                    </tr>
                                </thead>
                                <tbody>
{section name=link_sec1 loop=$items1}
                                    <tr>
                                        <th>{$items1[link_sec1]->nom}</th>
{section name=link_sec2 loop=$items2}
                                        <td>
                                            <input type="checkbox" name="links[{$items2[link_sec2]->id}][{$items1[link_sec1]->id}]"{if isset($links[$items2[link_sec2]->id][$items1[link_sec1]->id])} checked="checked"{/if}>
                                        </td>
{/section}
                                    </tr>
{/section}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="{$items2|@count + 1}" class="submit">
                                            <input type="submit" name="btn_record" value="Enregistrer">
{if $items1|@count eq 1}
                                            <input type="submit" formnovalidate="" formaction="?c=droit" name="btn_back" value="Retour" >
{elseif $items2|@count eq 1}
                                            <input type="submit" formnovalidate="" formaction="?c=groupe" name="btn_back" value="Retour" >
{/if}
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}