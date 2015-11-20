{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="utilisateur">
                <fieldset class="update">
                    <legend>Editer un Utilisateur</legend>
                    <form enctype="multipart/form-data" action="?c=utilisateur&amp;a=read" onSubmit="return checkForm(this);" method="post">
                        <input type="hidden" name="id" value="{$item->id}">
                        <table>
                            <tbody>
                                <tr>
                                    <th><label for="identifiant">Identifiant<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="identifiant" name="identifiant" maxlength="20" required="" value="{$item->identifiant}"></td>
                                </tr>
                                <tr>
                                    <th rowspan="2"><label for="motdepasse">Mot de passe&nbsp;:</label></th>
                                    <td><input type="password" id="motdepasse" name="motdepasse" maxlength="32" placeholder="Mot de passe"></td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="motdepasse2" maxlength="32" placeholder="Confirmation"></td>
                                </tr>
                                <tr>
                                    <th><label for="pseudo">Pseudo<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="pseudo" name="pseudo" maxlength="20" required="" value="{$item->pseudo}"></td>
                                </tr>
                                <tr>
                                    <th><label for="avatar">Avatar<span class="warning">*</span>&nbsp;:</label></th>
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
                                        <input type="hidden" name="MAX_FILE_SIZE" value="{$max_file_size}">
                                        <input type="file" id="avatar" name="userfile">
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="prenom">Prénom<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="prenom" name="prenom" maxlength="30" required="" value="{$item->prenom}"></td>
                                    <td>
{html_options id=id_confid_prenom name=id_confid_prenom options=$confidentialites selected=$item->id_confid_prenom}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="nom">Nom<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="nom" name="nom" maxlength="30" required="" value="{$item->nom}"></td>
                                    <td>
{html_options id=id_confid_nom name=id_confid_nom options=$confidentialites selected=$item->id_confid_nom}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="naissance">Naissance<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="date" id="naissance" name="naissance" max="{($naissance_max)|date_format:"%Y-%m-%d"}" required="" value="{$item->naissance}"></td>
                                    <td>
{html_options id=id_confid_naissance name=id_confid_naissance options=$confidentialites selected=$item->id_confid_naissance}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="sexe">Sexe&nbsp;:</label></th>
                                    <td>
{html_radios id=sexe name=sexe options=$sexes selected=$item->sexe}
                                    </td>
                                    <td>
{html_options id=id_confid_sexe name=id_confid_sexe options=$confidentialites selected=$item->id_confid_sexe}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="email">Email<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="email" id="email" name="email" maxlength="255" required="" value="{$item->email}"></td>
                                    <td>
{html_options id=id_confid_email name=id_confid_email options=$confidentialites selected=$item->id_confid_email}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="ville">Ville&nbsp;:</label></th>
                                    <td><input type="text" id="ville" name="ville" maxlength="30" value="{$item->ville}"></td>
                                    <td>
{html_options id=id_confid_ville name=id_confid_ville options=$confidentialites selected=$item->id_confid_ville}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="pays">Pays<span class="required">*</span>&nbsp;:</label></th>
                                    <td>
{html_options id=id_pays name=id_pays options=$pays selected=$item->id_pays}
                                    </td>
                                    <td>
{html_options id=id_confid_pays name=id_confid_pays options=$confidentialites selected=$item->id_confid_pays}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="description">Description&nbsp;:</label></th>
                                    <td><textarea id="description" name="description" cols="35" rows="5">{$item->description}</textarea></td>
                                    <td>
{html_options id=id_confid_description name=id_confid_description options=$confidentialites selected=$item->id_confid_description}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="actif">Actif&nbsp;:</label></th>
                                    <td><input type="checkbox" id="actif" name="actif" title="Connexion autorisée"{if $item->actif} checked="checked"{/if}></td>
                                </tr>
                                <tr>
                                    <th><label for="id_utilisateur_parrainer">Parrain&nbsp;:</label></th>
                                    <td>
{html_options id=id_utilisateur_parrainer name=id_utilisateur_parrainer options=$utilisateurs selected=$item->id_utilisateur_parrainer}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="id_niveau_utilisateur">Niveau<span class="required">*</span>&nbsp;:</label></th>
                                    <td>
{html_options id=id_niveau_utilisateur name=id_niveau_utilisateur options=$niveaux selected=$item->id_niveau_utilisateur required=""}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="submit">
                                        <input type="submit" name="btn_update" value="Mettre-à-jour">
                                        <input type="submit" name="btn_back" value="Annuler" formnovalidate="">
                                    </th>
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