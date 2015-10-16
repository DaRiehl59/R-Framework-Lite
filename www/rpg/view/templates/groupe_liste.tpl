{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="groupe">
                <fieldset>
                    <legend>Liste des Groupes</legend>
                    <table>
                        <thead>
                            <tr>
                                <th><label>Nom</label></th>
                                <th><label>Avatar</label></th>
                            </tr>
                        </thead>
                        <tbody>
{section name=groupe_sec0 loop=$groupes}
                            <tr>
                                <td>
                                    <a href="?c=groupe&amp;a=editer&amp;id={$groupes[groupe_sec0].id}" title="éditer">
                                        {$groupes[groupe_sec0].nom}
                                    </a>
                                </td>
                                <td>
                                    <a href="?c=groupe&amp;a=editer&amp;id={$groupes[groupe_sec0].id}" title="éditer">
                                        <img src="{$avatar_directory}/{$groupes[groupe_sec0].nom}/{$groupes[groupe_sec0].avatar}" alt="avatar" title="{$groupes[groupe_sec0].nom}">
                                    </a>
                                </td>
                                <th>
                                    <ul class="menu">
                                        <li class="icon">
                                            <a href="?c=groupe&amp;a=editer&amp;id={$groupes[groupe_sec0].id}" title="éditer">
                                                <div style="background: url({$theme}/pencil_edit.png) center center / 16px;"></div>
                                            </a>
                                        </li>
                                        <li class="icon">
                                            <a href="?c=groupe&amp;a=supprimer&amp;id={$groupes[groupe_sec0].id}" title="supprimer">
                                                <div style="background: url({$theme}/close_delete_2.png) center center / 16px;"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </th>
                            </tr>
{/section}
                        </tbody>
                    </table>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}