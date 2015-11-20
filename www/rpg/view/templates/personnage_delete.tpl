{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="personnage">
                <fieldset class="delete">
                    <legend>Supprimer un Personnage</legend>
                    <form action="?c=personnage" method="post">
                        <input type="hidden" name="id" value="{$item->id}">
                        <table>
                            <tbody>
                                <tr>
                                    <th><label for="id_utilisateur">Propriétaire&nbsp;:</label></th>
                                    <td>
{html_options id=id_utilisateur name=id_utilisateur options=$utilisateurs selected=$item->id_utilisateur disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="id_univers">Univers&nbsp;:</label></th>
                                    <td>
{html_options id=id_univers name=id_univers options=$univers selected=$item->id_univers disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="id_race">Race&nbsp;:</label></th>
                                    <td>
{html_options id=id_race name=id_race options=$races selected=$item->id_race disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="nom">Nom&nbsp;:</label></th>
                                    <td><input type="text" id="nom" name="nom" value="{$item->nom}" disabled=""></td>
                                </tr>
                                <tr>
                                    <th><label for="description">Description&nbsp;:</label></th>
                                    <td><textarea id="description" name="description" cols="35" rows="5" disabled="">{$item->description}</textarea></td>
                                </tr>
                                <tr>
                                    <th><label for="avatar">Avatar&nbsp;:</label></th>
                                    <td>
                                        <img src="{$avatar_directory}/{$item->avatar}" alt="Avatar">
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="actif">Actif&nbsp;:</label></th>
                                    <td><input type="checkbox" id="actif" name="actif" title="Personnage activé" {if $item->actif} checked="checked"{/if} disabled=""></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="submit">
                                        <input type="submit" name="btn_delete" value="Supprimer">
                                        <input type="submit" name="btn_back" value="Annuler" formnovalidate="">
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}