{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="affecter">
                <fieldset class="global">
                    <legend>{$link_name} à un {$itemname}</legend>
                    <h1>
{if isset($item->avatar) and $item->avatar neq ''}
                        <img src="{$avatar_directory}/{$item->avatar}" alt="Avatar">
{/if}
                        {$item}
                    </h1>
                    <form action="?c=affecter&amp;{$FK_name}={$item->id}" method="post">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <fieldset class="members">
                                            <legend>{$linked} ({$linked_items|@count})</legend>
                                            <select name="selected_linked_items[]" multiple="" size="10">
{html_options options=$linked_items}
                                            </select>
                                        </fieldset>
                                    </td>
                                    <th>
                                        <ul class="menu">
                                            <li class="icon32">
                                                <input type="image" src="{$theme}/arrow_left.png" name="btn_ajouter" title="Ajouter">
                                            </li>
                                            <li class="icon32">
                                                <input type="image" src="{$theme}/arrow_right.png" name="btn_enlever" title="Retirer">
                                            </li>
                                        </ul>
                                    </th>
                                    <td>
                                        <fieldset class="others">
                                            <legend>{$unlinked} ({$unlinked_items|@count})</legend>
                                            <select name="selected_unlinked_items[]" multiple="" size="10">
{html_options options=$unlinked_items}
                                            </select>
                                        </fieldset>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">
                                        <input type="submit" formnovalidate="" formaction="?c={$back_controler}&amp;a=read" name="btn_back" value="Retour">
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}