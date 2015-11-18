{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="utilisateur">
                <fieldset class="list">
                    <legend>Liste des Utilisateurs</legend>
                    <div>
{include file="html_icon_definitions.tpl"}
                        <table>
                            <tbody>
{section name=liste_sec0 loop=$items}
                                <tr>
                                    <td>
                                        <a href="?c=utilisateur&amp;a=update&amp;id={$items[liste_sec0]->id}" title="Editer">
{if $items[liste_sec0]->avatar neq ''}
                                            <img src="{$avatar_directory}/{$items[liste_sec0]->avatar}" alt="Avatar">
{else}
                                            &nbsp;
{/if}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?c=utilisateur&amp;a=update&amp;id={$items[liste_sec0]->id}" title="Editer">
                                            {$items[liste_sec0]->nom}
                                        </a>
                                    </td>
                                    <th>
                                        <ul class="menu">
                                            <li class="icon">
                                                <a href="?c=utilisateur&amp;a=update&amp;id={$items[liste_sec0]->id}" title="Editer">
                                                    <div class="icon" name="update"></div>
                                                </a>
                                            </li>
{if $items[liste_sec0]->actif eq 0}
                                            <li class="icon">
                                                <a href="?c=utilisateur&amp;a=active&amp;id={$items[liste_sec0]->id}" title="Activer ce droit">
                                                    <div class="icon" name="unlock"></div>
                                                </a>
                                            </li>
{/if}
{if $items[liste_sec0]->actif eq 1}
                                            <li class="icon">
                                                <a href="?c=utilisateur&amp;a=desactive&amp;id={$items[liste_sec0]->id}" title="Désactiver ce droit">
                                                    <div class="icon" name="lock"></div>
                                                </a>
                                            </li>
{/if}
                                            <li class="icon">
                                                <a href="?c=affecter&amp;id_utilisateur={$items[liste_sec0]->id}" title="Affecter à un groupe">
                                                    <div class="icon" name="assign"></div>
                                                </a>
                                            </li>
                                            <li class="icon">
                                                <a href="?c=utilisateur&amp;a=delete&amp;id={$items[liste_sec0]->id}" title="Supprimer">
                                                    <div class="icon" name="delete"></div>
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
                    <legend>Ajouter un Utilisateur</legend>
                    <form enctype="multipart/form-data" action="?c=utilisateur&amp;a=read" method="post">
                        <table>
                            <tbody>
                                <tr>
                                    <th><label for="identifiant">Identifiant<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="identifiant" name="identifiant" maxlength="20" required=""></td>
                                </tr>
                                <tr>
                                    <th><label for="motdepasse">Mot de passe<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="password" id="motdepasse" name="motdepasse" maxlength="32" required=""></td>
                                </tr>
                                <tr>
                                    <th><label for="pseudo">Pseudo<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="pseudo" name="pseudo" maxlength="20" required=""></td>
                                </tr>
                                <tr>
                                    <th><label for="avatar">Avatar<span class="warning">*</span>&nbsp;:</label></th>
                                    <td>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="{$max_file_size}">
                                        <input type="file" id="avatar" name="userfile">
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="nom">Nom Réel<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="nom" name="nom" maxlength="20" required=""></td>
                                    <td>
{html_options id=id_confid_nom name=id_confid_nom options=$confidentialites selected=$id_confidentialite}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="email">Email<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="email" id="email" name="email" maxlength="255" required=""></td>
                                    <td>
{html_options id=id_confid_email name=id_confid_email options=$confidentialites selected=$id_confidentialite}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="ville">Ville&nbsp;:</label></th>
                                    <td><input type="text" id="ville" name="ville" maxlength="30"></td>
                                    <td>
{html_options id=id_confid_ville name=id_confid_ville options=$confidentialites selected=$id_confidentialite}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="pays">Pays<span class="required">*</span>&nbsp;:</label></th>
                                    <td>
{html_options id=id_pays name=id_pays options=$pays selected=$id_pays}
                                    </td>
                                    <td>
{html_options id=id_confid_pays name=id_confid_pays options=$confidentialites selected=$id_confidentialite}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="description">Description&nbsp;:</label></th>
                                    <td><textarea id="description" name="description" cols="35" rows="5"></textarea></td>
                                    <td>
{html_options id=id_confid_description name=id_confid_description options=$confidentialites selected=$id_confidentialite}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="actif">Actif&nbsp;:</label></th>
                                    <td><input type="checkbox" id="actif" name="actif" title="Groupe activé" checked="checked"></td>
                                </tr>
                                <tr>
                                    <th><label for="id_utilisateur_parrainer">Parrain&nbsp;:</label></th>
                                    <td>
{html_options id=id_utilisateur_parrainer name=id_utilisateur_parrainer options=$utilisateurs selected=$session_utilisateur['id']}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="id_niveau">Niveau<span class="required">*</span>&nbsp;:</label></th>
                                    <td>
{html_options id=id_niveau name=id_niveau options=$niveaux selected=$id_niveau required=""}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="submit"><input type="submit" name="btn_ajouter" value="Ajouter"></th>
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