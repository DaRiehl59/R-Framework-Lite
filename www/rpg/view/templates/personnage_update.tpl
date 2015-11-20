{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="personnage">
                <fieldset class="update">
                    <legend>Editer un Personnage</legend>
                    <form enctype="multipart/form-data" action="?c=personnage" method="post">
                        <input type="hidden" name="id" value="{$item->id}">
                        <table>
                            <tbody>
                                <tr>
                                    <th><label for="id_utilisateur">Propriétaire<span class="required">*</span>&nbsp;:</label></th>
                                    <td>
{html_options id=id_utilisateur name=id_utilisateur options=$utilisateurs selected=$item->id_utilisateur}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="id_univers">Univers<span class="required">*</span>&nbsp;:</label></th>
                                    <td>
{if isset($id_univers)}
{html_options id=id_univers name=id_univers options=$univers selected=$id_univers required="" onChange="
if(this.value != '')
{
    if(this.value != '{$item->id_univers}')
        this.form.action='?c=personnage&amp;a=update&amp;id={$item->id}&amp;id_univers='+this.value;
    else
        this.form.action='?c=personnage&amp;a=update&amp;id={$item->id}';
}
this.form.submit();"
}
{else}
{html_options id=id_univers name=id_univers options=$univers selected=$item->id_univers required="" onChange="
if(this.value != '')
{
    this.form.action='?c=personnage&amp;a=update&amp;id={$item->id}&amp;id_univers='+this.value;
}
this.form.submit();"
}
{/if}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="id_race">Race<span class="required">*</span>&nbsp;:</label></th>
                                    <td>
{if isset($id_univers)}
{html_options id=id_race name=id_race options=$races required=""}
{else}
{html_options id=id_race name=id_race options=$races selected=$item->id_race required=""}
{/if}
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="nom">Nom<span class="required">*</span>&nbsp;:</label></th>
                                    <td><input type="text" id="nom" name="nom" maxlength="20" required="" value="{$item->nom}"></td>
                                </tr>
                                <tr>
                                    <th><label for="description">Description&nbsp;:</label></th>
                                    <td><textarea id="description" name="description" cols="30" rows="5">{$item->description}</textarea></td>
                                </tr>
                                <tr>
                                    <th><label for="avatar">Avatar<span class="warning">*</span>&nbsp;:</label></th>
                                    <td>
{if $item->avatar neq ''}
                                        <img src="{$avatar_directory}/{$item->avatar}" alt="Avatar">
{/if}
                                        <input type="hidden" name="MAX_FILE_SIZE" value="{$max_file_size}">
                                        <input type="file" id="avatar" name="userfile">
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="actif">Actif&nbsp;:</label></th>
                                    <td><input type="checkbox" id="actif" name="actif" title="Personnage activé" {if $item->actif} checked="checked"{/if}></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="submit">
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