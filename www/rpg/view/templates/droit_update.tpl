{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="droit">
                <fieldset class="update">
                    <legend>Editer un Droit</legend>
                    <form action="?c=droit" method="post">
                        <input type="hidden" name="id" value="{$item->id}">
                        <table>
                            <tr>
                                <th><label for="nom">Nom<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="text" id="nom" name="nom" maxlength="50" required="" value="{$item->nom}"></td>
                            </tr>
                            <tr>
                                <th colspan="2" class="submit">
                                    <input type="submit" name="btn_update" value="Mettre-à-jour">
                                    <input type="submit" name="btn_back" value="Annuler" formnovalidate="">
                                </th>
                            </tr>
                        </table>
                        <span class="required">* information obligatoire</span><br>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}