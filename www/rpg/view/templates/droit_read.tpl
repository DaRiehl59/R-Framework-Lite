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
                                        <a href="?c=droit&amp;a=update&amp;id={$items[liste_sec0]->id}" title="Editer">
                                            {$items[liste_sec0]->nom}
                                        </a>
                                    </td>
                                    <th>
                                        <ul class="menu">
                                            <li class="icon">
                                                <a href="?c=droit&amp;a=update&amp;id={$items[liste_sec0]->id}" title="Editer">
                                                    <div class="icon" style="background: url({$theme}/pencil_edit.png) center center / 16px;"></div>
                                                </a>
                                            </li>
{if $items[liste_sec0]->actif eq 0}
                                            <li class="icon">
                                                <a href="?c=droit&amp;a=active&amp;id={$items[liste_sec0]->id}" title="Activer ce droit">
                                                    <div class="icon" style="background: url({$theme}/play.png) center center / 16px;"></div>
                                                </a>
                                            </li>
{/if}
{if $items[liste_sec0]->actif eq 1}
                                            <li class="icon">
                                                <a href="?c=droit&amp;a=desactive&amp;id={$items[liste_sec0]->id}" title="Désactiver ce droit">
                                                    <div class="icon" style="background: url({$theme}/pause.png) center center / 16px;"></div>
                                                </a>
                                            </li>
{/if}
                                            <li class="icon">
                                                <a href="?c=attribuer&amp;id_droit={$items[liste_sec0]->id}" title="Attribuer ce droit">
                                                    <div class="icon" style="background: url({$theme}/checked.png) center center / 16px;"></div>
                                                </a>
                                            </li>
                                            <li class="icon">
                                                <a href="?c=droit&amp;a=delete&amp;id={$items[liste_sec0]->id}" title="Supprimer">
                                                    <div class="icon" style="background: url({$theme}/close_delete_2.png) center center / 16px;"></div>
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
                            <tbody>
                                <tr>
                                    <th><label for="nom">Nom<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="nom" name="nom" maxlength="50" required=""></td>
                                </tr>
                                <tr>
                                    <th><label for="actif">Actif&nbsp;:</label></th>
                                    <td><input type="checkbox" id="actif" name="actif" title="Droit activé" checked="checked"></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="submit"><input type="submit" name="btn_ajouter" value="Ajouter"></th>
                                </tr>
                            </tfoot>
                        </table>
                        <span class="required">* information obligatoire</span><br>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}