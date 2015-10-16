{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="groupe">
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
                            <td>{$groupes[groupe_sec0].nom}</td>
                            <td><img src="{$avatar_directory}/{$groupes[groupe_sec0].nom}/{$groupes[groupe_sec0].avatar}" alt="avatar" title="{$groupes[groupe_sec0].nom}"></td>
                            <th>
                                <ul class="menu">
                                    <li class="icon">
                                        <a href="?c=groupe&amp;a=editer&amp;id={$groupes[groupe_sec0].id}">
                                            <div style="background: url({$theme}/pencil_edit.png);"></div>
                                        </a>
                                    </li>
                                    <li class="icon">
                                        <a href="?c=groupe&amp;a=supprimer&amp;id={$groupes[groupe_sec0].id}">
                                            <div style="background: url({$theme}/close_delete_2.png);"></div>
                                        </a>
                                    </li>
                                </ul>
                            </th>
                        </tr>
{/section}
                    </tbody>
                </table>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}