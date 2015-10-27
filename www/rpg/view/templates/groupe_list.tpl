{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="groupe">
                <fieldset class="list">
                    <legend>Liste des Groupes</legend>
                    <div>
                        <table>
                            <tbody>
{section name=liste_sec0 loop=$items}
                                <tr>
                                    <td>
                                        <a href="?c=affecter&amp;id={$items[liste_sec0]->id}" title="Avatar">
                                            <img src="{$avatar_directory}/{$items[liste_sec0]->avatar}" alt="Avatar">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?c=affecter&amp;id={$items[liste_sec0]->id}" title="Nom">
                                            {$items[liste_sec0]->nom}
                                        </a>
                                    </td>
                                    <th>
                                        <ul class="menu">
                                            <li class="icon">
                                                <a href="?c=groupe&amp;a=editer&amp;id={$items[liste_sec0]->id}" title="éditer">
                                                    <div style="background: url({$theme}/pencil_edit.png) center center / 16px;"></div>
                                                </a>
                                            </li>
                                            <li class="icon">
                                                <a href="?c=groupe&amp;a=supprimer&amp;id={$items[liste_sec0]->id}" title="supprimer">
                                                    <div style="background: url({$theme}/close_delete_2.png) center center / 16px;"></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </th>
                                </tr>
{/section}
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                <fieldset class="insert">
                    <legend>Ajouter un Groupe</legend>
                    <form enctype="multipart/form-data" action="?c=groupe" method="post">
                        <table>
                            <tbody>
                                <tr>
                                    <th><label for="nom">Nom<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="nom" name="nom" maxlength="20" required=""></td>
                                </tr>
                                <tr>
                                    <th><label for="description">Description&nbsp;:</label></th>
                                    <td><textarea id="description" name="description" cols="30" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <th><label for="maximum">Maximum<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="number" id="maximum" name="maximum" title="nombre maximum de membres" min="0" value="0" required=""> (0 = illimité)</td>
                                </tr>
                                <tr>
                                    <th><label for="avatar">Avatar<span class="warning">*</span>&nbsp;:</label></th>
                                    <td>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="{$max_file_size}">
                                        <input type="file" id="avatar" name="userfile">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="submit"><input type="submit" name="btn_ajouter" value="Ajouter"></th>
                                </tr>
                            </tfoot>
                        </table>
                        <span class="required">* information obligatoire</span><br>
                        <span class="warning">* taille maximum : {$max_file_size_str}</span>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}