{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="droit">
                <fieldset class="list">
                    <legend>Liste des Droits</legend>
                    <div>
                        <table>
                            <tbody>
{section name=liste_sec0 loop=$items}
                                <tr>
                                    <td>
                                        <a href="?c=droit&amp;a=affecter&amp;id={$items[liste_sec0]->id}" title="Nom">
                                            {$items[liste_sec0]->nom}
                                        </a>
                                    </td>
                                    <th>
                                        <ul class="menu">
                                            <li class="icon">
                                                <a href="?c=droit&amp;a=editer&amp;id={$items[liste_sec0]->id}" title="éditer">
                                                    <div style="background: url({$theme}/pencil_edit.png) center center / 16px;"></div>
                                                </a>
                                            </li>
                                            <li class="icon">
                                                <a href="?c=droit&amp;a=supprimer&amp;id={$items[liste_sec0]->id}" title="supprimer">
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
                    <legend>Ajouter un Droit</legend>
                    <form action="?c=droit" method="post">
                        <table>
                            <tr>
                                <th><label for="nom">Nom<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="text" id="nom" name="nom" maxlength="50" required=""></td>
                            </tr>
                            <tr>
                                <th colspan="2" class="submit"><input type="submit" name="btn_ajouter" value="Ajouter"></th>
                            </tr>
                        </table>
                        <span class="required">* information obligatoire</span><br>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}