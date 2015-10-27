{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="droit">
                <fieldset class="delete">
                    <legend>Supprimer un Droit</legend>
                    <form action="?c=droit" method="post">
                        <input type="hidden" name="id" value="{$item->id}">
                        <table>
                            <tr>
                                <th><label for="nom">Nom&nbsp;:</label></th>
                                <td><input type="text" id="nom" name="nom" value="{$item->nom}" disabled=""></td>
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