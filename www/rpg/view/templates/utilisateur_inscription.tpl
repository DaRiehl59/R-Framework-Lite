{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="inscription">
                <form action="?c=utilisateur&amp;a=inscription" method="POST">
                    <table>
                        <tr>
                            <th><label for="pseudo">Identifiant&nbsp;:</label></th>
                            <td><input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="identifiant de connexion"></td>
                        </tr>
                        <tr>
                            <th rowspan="2"><label for="motdepasse">Mot de passe&nbsp;:</label></th>
                            <td><input type="password" id="motdepasse" name="motdepasse" maxlength="32" placeholder="mot de passe"></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="motdepasse2" maxlength="32" placeholder="confirmation du mot de passe"></td>
                        </tr>
                        <tr>
                            <th><label for="pseudo">Pseudo&nbsp;:</label></th>
                            <td><input type="text" name="pseudo" maxlength="20" placeholder="Pseudonyme"></td>
                        </tr>
                        <tr>
                            <th><label for="nom">Nom Réel&nbsp;:</label></th>
                            <td><input type="text" id="nom" name="nom" maxlength="30" placeholder="Nom Réel"></td>
                        </tr>
                        <tr>
                            <th><label for="email">Email&nbsp;:</label></th>
                            <td><input type="email" id="email" name="email" maxlength="255" placeholder="adresse email"></td>
                        </tr>
                        <tr>
                            <th><label for="ville">Ville&nbsp;:</label></th>
                            <td><input type="text" id="ville" name="ville" maxlength="30"></td>
                        </tr>
                        <tr>
                            <th><label for="pays">Pays&nbsp;:</label></th>
                            <td>
                                <select id="pays" name="id_pays" autocomplete="off">
{section name=inscription_sec0 loop=$pays}
                                    <option value="{$pays[inscription_sec0].id}"{if $pays[inscription_sec0].id eq $utilisateur_profil.id_pays} selected=""{/if}>{$pays[inscription_sec0].nom_fr_fr}</option>
{/section}
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}