{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="groupe">
                <fieldset class="editer">
                    <legend>Editer un Groupe</legend>
                    <form enctype="multipart/form-data" action="?c=groupe" method="post">
                        <input type="hidden" name="id" value="{$groupe->id}">
                        <table>
                            <tr>
                                <th><label for="nom">Nom<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="text" id="nom" name="nom" maxlength="20" required="" value="{$groupe->nom}"></td>
                            </tr>
                            <tr>
                                <th><label for="description">Description&nbsp;:</label></th>
                                <td><textarea id="description" name="description" cols="30">{$groupe->description}</textarea></td>
                            </tr>
                            <tr>
                                <th><label for="maximum">Maximum<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="number" id="maximum" name="maximum" required="" title="nombre maximum de membres" value="{$groupe->maximum}"></td>
                            </tr>
                            <tr>
                                <th><label for="avatar">Avatar<span class="warning">*</span>&nbsp;:</label></th>
                                <td>
                                    <img src="{$avatar_directory}/{$groupe->avatar}" alt="Avatar">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="{$max_file_size}">
                                    <input type="file" id="avatar" name="userfile">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" class="submit">
                                    <input type="submit" name="btn_update" value="Enregistrer">
                                    <input type="submit" name="btn_back" value="Retour" formnovalidate="">
                                </th>
                            </tr>
                        </table>
                        <span class="required">* information obligatoire</span><br>
                        <span class="warning">* taille maximum : {$max_file_size_str}</span>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}