{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="attribuer">
                <fieldset class="list">
                    <legend>Attribution des Droits</legend>
                    <form action="?c=attribuer" method="post">
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
{section name=link_sec0 loop=$items2}
                                        <th>{$items2[link_sec0]->nom}</th>
{/section}
                                    </tr>
                                </thead>
                                <tbody>
{section name=link_sec1 loop=$items1}
                                    <tr>
                                        <th>{$items1[link_sec1]->nom}</th>
{section name=link_sec2 loop=$items2}
                                        <td>
                                            <input type="checkbox" name="links[{$items1[link_sec1]->id}][{$items2[link_sec2]->id}]"{if isset($links[$items1[link_sec1]->id][$items2[link_sec2]->id])} checked="checked"{/if}>
                                        </td>
{/section}
                                    </tr>
{/section}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="{$items2|@count + 1}" class="submit">
                                            <input type="submit" name="btn_record" value="Enregistrer">
                                            <input type="submit" formnovalidate="" formaction="?c=droit" name="btn_back" value="Retour" >
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