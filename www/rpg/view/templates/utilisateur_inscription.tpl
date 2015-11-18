{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="inscription">
                <fieldset>
                    <legend>Inscription</legend>
                    <form action="?c=utilisateur&amp;a=subscribe" onSubmit="return checkForm(this);" method="POST">
                        <table>
                            <tr>
                                <th><label for="identifiant">Identifiant<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="text" id="identifiant" name="identifiant" maxlength="20" placeholder="Identifiant de connexion" required=""></td>
                            </tr>
                            <tr>
                                <th rowspan="2"><label for="motdepasse">Mot de passe<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="password" id="motdepasse" name="motdepasse" maxlength="32" placeholder="Mot de passe" required=""></td>
                            </tr>
                            <tr>
                                <td><input type="password" name="motdepasse2" maxlength="32" placeholder="Confirmation" required=""></td>
                            </tr>
                            <tr>
                                <th><label for="pseudo">Pseudo<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="text" name="pseudo" maxlength="20" placeholder="Pseudonyme" required=""></td>
                            </tr>
                            <tr>
                                <th><label for="nom">Nom Réel<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="text" id="nom" name="nom" maxlength="30" placeholder="Nom Réel" required=""></td>
                            </tr>
                            <tr>
                                <th><label for="email">Email<span class="required">*</span>&nbsp;:</label></th>
                                <td><input type="email" id="email" name="email" maxlength="255" placeholder="Adresse email" required=""></td>
                            </tr>
                            <tr>
                                <th><label for="ville">Ville&nbsp;:</label></th>
                                <td><input type="text" id="ville" name="ville" maxlength="30" placeholder="Ville"></td>
                            </tr>
                            <tr>
                                <th><label for="pays">Pays<span class="required">*</span>&nbsp;:</label></th>
                                <td>
                                    <select id="pays" name="id_pays" autocomplete="off">
{section name=inscription_sec0 loop=$pays}
                                        <option value="{$pays[inscription_sec0]->id}"{if $pays[inscription_sec0]->nom_fr_fr eq "France"} selected=""{/if}>{$pays[inscription_sec0]->nom_fr_fr}</option>
{/section}
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" class="submit"><input type="submit" name="btn_inscrire" value="S'inscrire"></th>
                            </tr>
                        </table>
                        <span class="required">* information obligatoire</span>
                    </form>
                </fieldset>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}