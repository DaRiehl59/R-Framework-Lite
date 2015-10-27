{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="affecter">
                <fieldset class="global">
                    <legend>Affectation des Utilisateurs</legend>
                    <img src="{$avatar_directory}/{$groupe->avatar}" alt="Avatar"><h1>{$groupe->nom}</h1>
                    <form action="?c=attribuer" method="post">
                        <table>
                            <tr>
                                <td>
                                    <fieldset class="members">
                                        <legend>Membres ({$members|@count})</legend>
                                        <select name="selected_members_id[]" multiple="" size="10">
                                            {html_options options=$members}
                                        </select>
                                    </fieldset>
                                </td>
                                <th>
                                    <ul class="menu">
                                        <li class="icon32">
                                            <a href="?c=affecter&amp;a=ajouter" title="ajouter">
                                                <div style="background: url({$theme}/arrow_left.png) center center / 32px;"></div>
                                            </a>
                                        </li>
                                        <li class="icon32">
                                            <a href="?c=groupe&amp;a=enlever" title="enlever">
                                                <div style="background: url({$theme}/arrow_right.png) center center / 32px;"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </th>
                                <td>
                                    <fieldset class="others">
                                        <legend>Non Membres ({$others|@count})</legend>
                                        <select name="selected_others_id[]" multiple="" size="10">
                                            {html_options options=$others}
                                        </select>
                                    </fieldset>
                                </td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}