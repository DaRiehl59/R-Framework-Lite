{include file="html_header.tpl"}{include file="top.tpl"}
            <div id="main" class="profil">
                <div class="avatar" style='background: url(http://www.gravatar.com/avatar/{$utilisateur_profil.email_hash}) no-repeat center center / 150px;' alt="{$utilisateur.pseudo}" title="{$utilisateur.pseudo}"></div>
                <div class="pseudo" alt="{$utilisateur_profil.pseudo}" title="{$utilisateur_profil.pseudo}">{$utilisateur_profil.pseudo}</div>
                <table>
                    <tr>
                        <th><label>Pseudo&nbsp;:</label></th>
                        <td>{$utilisateur_profil.pseudo}</td>
                    </tr>
                    <tr>
                        <th><label>Nom Réel&nbsp;:</label></th>
                        <td>{$utilisateur_profil.nom}</td>
{if $utilisateur_profil.id eq $utilisateur.id}
                        <td>(Qui peut le voir&nbsp;?
                            <select name="id_confid_nom" autocomplete="off" disabled="">
{section name=profil_sec0 loop=$confidentialite}
                                <option value="{$confidentialite[profil_sec0]->id}"{if $confidentialite[profil_sec0]->id eq $utilisateur_profil.id_confid_nom} selected=""{/if}>{$confidentialite[profil_sec0]->libelle}</option>
{/section}
                            </select>)
                        </td>
{/if}
                    </tr>
                    <tr>
                        <th><label>Email&nbsp;:</label></th>
                        <td>{$utilisateur_profil.email}</td>
{if $utilisateur_profil.id eq $utilisateur.id}
                        <td>(Qui peut le voir&nbsp;?
                            <select name="id_confid_email" autocomplete="off" disabled="">
{section name=profil_sec1 loop=$confidentialite}
                                <option value="{$confidentialite[profil_sec1]->id}"{if $confidentialite[profil_sec1]->id eq $utilisateur_profil.id_confid_email} selected=""{/if}>{$confidentialite[profil_sec1]->libelle}</option>
{/section}
                            </select>)
                        </td>
{/if}
                    </tr>
                    <tr>
                        <th><label>Ville&nbsp;:</label></th>
                        <td>{$utilisateur_profil.ville}</td>
{if $utilisateur_profil.id eq $utilisateur.id}
                        <td>(Qui peut le voir&nbsp;?
                            <select name="id_confid_ville" autocomplete="off" disabled="">
{section name=profil_sec2 loop=$confidentialite}
                                <option value="{$confidentialite[profil_sec2]->id}"{if $confidentialite[profil_sec2]->id eq $utilisateur_profil.id_confid_ville} selected=""{/if}>{$confidentialite[profil_sec2]->libelle}</option>
{/section}
                            </select>)
                        </td>
{/if}
                    </tr>
                    <tr>
                        <th><label>Pays&nbsp;:</label></th>
                        <td>
                            <select name="id_pays" autocomplete="off" disabled="">
                                <option value="0">Inconnu</option>
{section name=profil_sec3 loop=$pays}
                                <option value="{$pays[profil_sec3]->id}"{if $pays[profil_sec3]->id eq $utilisateur_profil.id_pays} selected=""{/if}>{$pays[profil_sec3]->nom_fr_fr}</option>
{/section}
                            </select>
                        </td>
{if $utilisateur_profil.id eq $utilisateur.id}
                        <td>(Qui peut le voir&nbsp;?
                            <select name="id_confid_pays" autocomplete="off" disabled="">
{section name=profil_sec4 loop=$confidentialite}
                                <option value="{$confidentialite[profil_sec4]->id}"{if $confidentialite[profil_sec4]->id eq $utilisateur_profil.id_confid_pays} selected=""{/if}>{$confidentialite[profil_sec4]->libelle}</option>
{/section}
                            </select>)
                        </td>
{/if}
                    </tr>
                </table>
            </div>
{include file="foot.tpl"}
{include file="html_footer.tpl"}