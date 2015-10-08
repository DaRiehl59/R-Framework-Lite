{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main">
                <div class="avatar_profil" style='background: url(http://www.gravatar.com/avatar/{$utilisateur['email_hash']}) no-repeat center center / 100px;' alt="{$utilisateur['pseudo']}" title="{$utilisateur['pseudo']}"></div>
                <table>
                    <tr>
                        <th><label>Pseudo&nbsp;:</label></th>
                        <td>{$utilisateur['pseudo']}</td>
                    </tr>
                    <tr>
                        <th><label>Nom&nbsp;:</label></th>
                        <td>{$utilisateur['nom']}</td>
                    </tr>
                    <tr>
                        <th><label>Email&nbsp;:</label></th>
                        <td>{$utilisateur['email']}</td>
                    </tr>
                </table>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}