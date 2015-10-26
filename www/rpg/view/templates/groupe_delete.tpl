{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="groupe">
                <fieldset class="delete">
                    <legend>Supprimer un Groupe</legend>
                    <form action="?c=groupe" method="post">
                        <input type="hidden" name="id" value="{$item->id}">
                        <table>
                            <tr>
                                <th><label for="nom">Nom&nbsp;:</label></th>
                                <td><input type="text" id="nom" name="nom" value="{$item->nom}" disabled=""></td>
                            </tr>
                            <tr>
                                <th><label for="description">Description&nbsp;:</label></th>
                                <td><textarea id="description" name="description" cols="30"  disabled="">{$item->description}</textarea></td>
                            </tr>
                            <tr>
                                <th><label for="maximum">Maximum&nbsp;:</label></th>
                                <td><input type="number" id="maximum" name="maximum" title="nombre maximum de membres" value="{$item->maximum}" disabled=""></td>
                            </tr>
                            <tr>
                                <th><label for="avatar">Avatar&nbsp;:</label></th>
                                <td>
                                    <img src="{$avatar_directory}/{$item->avatar}" alt="Avatar">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" class="submit">
                                    <input type="submit" name="btn_delete" value="Supprimer">
                                    <input type="submit" name="btn_back" value="Annuler" formnovalidate="">
                                </th>
                            </tr>
                        </table>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}