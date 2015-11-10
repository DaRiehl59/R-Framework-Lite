{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="personnage">
                <fieldset class="delete">
                    <legend>Supprimer un Groupe</legend>
                    <form action="?c=personnage" method="post">
                        <input type="hidden" name="id" value="{$item->id}">
                        <table>
                            <tbody>
                                <tr>
                                    <th><label for="nom">Nom&nbsp;:</label></th>
                                    <td><input type="text" id="nom" name="nom" value="{$item->nom}" disabled=""></td>
                                </tr>
                                <tr>
                                    <th><label for="avatar">Avatar&nbsp;:</label></th>
                                    <td>
                                        <img src="{$avatar_directory}/{$item->avatar}" alt="Avatar">
                                    </td>
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