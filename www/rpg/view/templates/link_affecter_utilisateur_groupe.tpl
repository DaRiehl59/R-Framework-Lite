{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="affecter">
                <fieldset class="global">
                    <legend>Affectation dans un groupe</legend>
                    <h1><img src="{$avatar_directory}/{$groupe->avatar}" alt="Avatar">{$groupe->nom}</h1>
                    <form action="?c=affecter&amp;id={$groupe->id}" method="post">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <fieldset class="members">
                                            <legend>Membres ({$members|@count})</legend>
                                            <select name="selected_members_id[]" multiple="" size="10">
{html_options values=$members_ids output=$members}
                                            </select>
                                        </fieldset>
                                    </td>
                                    <th>
                                        <ul class="menu">
                                            <li class="icon32">
                                                <input type="image" src="{$theme}/arrow_left.png" name="btn_ajouter" title="Ajouter">
                                            </li>
                                            <li class="icon32">
                                                <input type="image" src="{$theme}/arrow_right.png" name="btn_enlever" title="Enlever">
                                            </li>
                                        </ul>
                                    </th>
                                    <td>
                                        <fieldset class="others">
                                            <legend>Non Membres ({$others|@count})</legend>
                                            <select name="selected_others_id[]" multiple="" size="10">
{html_options values=$others_ids output=$others}
                                            </select>
                                        </fieldset>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">
                                        <input type="submit" formnovalidate="" formaction="?c=groupe" name="btn_back" value="Retour">
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}