{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="groupe">
                <fieldset class="delete">
                    <legend>Supprimer un Groupe</legend>
                    <form action="?c=utilisateur&amp;a=read" method="post">
                        <input type="hidden" name="id" value="{$item->id}">
                        <table>
                            <tbody>
                                <tr>
                                    <th><label for="identifiant">Identifiant&nbsp;:</label></th>
                                    <td><input type="text" id="identifiant" name="identifiant" maxlength="20" value="{$item->identifiant}" disabled=""></td>
                                </tr>
                                <tr>
                                    <th><label for="pseudo">Pseudo&nbsp;:</label></th>
                                    <td><input type="text" id="pseudo" name="pseudo" maxlength="20" value="{$item->pseudo}" disabled=""></td>
                                </tr>
                                <tr>
                                    <th><label for="avatar">Avatar&nbsp;:</label></th>
                                    <td>
{if $item->avatar neq ''}
                                            <img src="{$avatar_directory}/{$item->id}/{$item->avatar}" alt="Avatar">
{elseif $item->hasGravatar()}
                                            <img src="http://www.gravatar.com/avatar/{$item->email_hash}/?d=404" alt="Avatar">
{elseif $item->sexe eq 'H'}
                                            <img src="{$avatar_directory}/{$default_avatar_H}" alt="Avatar">
{elseif $item->sexe eq 'F'}
                                            <img src="{$avatar_directory}/{$default_avatar_F}" alt="Avatar">
{/if}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="prenom">Prénom&nbsp;:</label></th>
                                    <td><input type="text" id="prenom" name="prenom" maxlength="30" value="{$item->prenom}" disabled=""></td>
                                    <td>
{html_options id=id_confid_prenom name=id_confid_prenom options=$confidentialites selected=$item->id_confid_prenom disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="nom">Nom&nbsp;:</label></th>
                                    <td><input type="text" id="nom" name="nom" maxlength="30" value="{$item->nom}" disabled=""></td>
                                    <td>
{html_options id=id_confid_nom name=id_confid_nom options=$confidentialites selected=$item->id_confid_nom disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="naissance">Naissance&nbsp;:</label></th>
                                    <td><input type="date" id="naissance" name="naissance" max="{($naissance_max)|date_format:"%Y-%m-%d"}" value="{$item->naissance}" disabled=""></td>
                                    <td>
{html_options id=id_confid_naissance name=id_confid_naissance options=$confidentialites selected=$item->id_confid_naissance disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="sexe">Sexe&nbsp;:</label></th>
                                    <td>
{html_radios id=sexe name=sexe options=$sexes selected=$item->sexe disabled=""}
                                    </td>
                                    <td>
{html_options id=id_confid_sexe name=id_confid_sexe options=$confidentialites selected=$item->id_confid_sexe disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="email">Email&nbsp;:</label></th>
                                    <td><input type="email" id="email" name="email" maxlength="255" value="{$item->email}" disabled=""></td>
                                    <td>
{html_options id=id_confid_email name=id_confid_email options=$confidentialites selected=$item->id_confid_email disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="ville">Ville&nbsp;:</label></th>
                                    <td><input type="text" id="ville" name="ville" maxlength="30" value="{$item->ville}" disabled=""></td>
                                    <td>
{html_options id=id_confid_ville name=id_confid_ville options=$confidentialites selected=$item->id_confid_ville disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="pays">Pays&nbsp;:</label></th>
                                    <td>
{html_options id=id_pays name=id_pays options=$pays selected=$item->id_pays disabled=""}
                                    </td>
                                    <td>
{html_options id=id_confid_pays name=id_confid_pays options=$confidentialites selected=$item->id_confid_pays disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="description">Description&nbsp;:</label></th>
                                    <td><textarea id="description" name="description" cols="35" rows="5" disabled="">{$item->description}</textarea></td>
                                    <td>
{html_options id=id_confid_description name=id_confid_description options=$confidentialites selected=$item->id_confid_description disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="actif">Actif&nbsp;:</label></th>
                                    <td><input type="checkbox" id="actif" name="actif" title="Connexion autorisée"{if $item->actif} checked="checked"{/if} disabled=""></td>
                                </tr>
                                <tr>
                                    <th><label for="id_utilisateur_parrainer">Parrain&nbsp;:</label></th>
                                    <td>
{html_options id=id_utilisateur_parrainer name=id_utilisateur_parrainer options=$utilisateurs selected=$item->id_utilisateur_parrainer disabled=""}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="id_niveau_utilisateur">Niveau&nbsp;:</label></th>
                                    <td>
{html_options id=id_niveau_utilisateur name=id_niveau_utilisateur options=$niveaux selected=$item->id_niveau_utilisateur disabled=""}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="submit">
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