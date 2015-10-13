                <div id="top_menu">
                    <ul class="main_menu">
                        <li class="profil">
                            <a href="?c=utilisateur&amp;a=profil">
                                <div class="avatar" style='background: url(http://www.gravatar.com/avatar/{$utilisateur['email_hash']}) no-repeat center center / 20px;' alt="profil" title="Profil"></div>
                                {$utilisateur.nom}
                            </a>
                        </li>
                        <li class="accueil"><a href=".">Accueil</a></li>
                        <li>
                            <a href="?c=contact">
                                <div class="icon" style='background: url({$theme}/friends_group.png) no-repeat center center / 30px;' alt="contacts" title="Contacts"></div>
                            </a>
                        </li>
                        <li>
                            <a href="?c=message">
                                <div class="icon" style='background: url({$theme}/new_email.png) no-repeat center center / 30px;' alt="messages" title="Messages"></div>
                            </a>
                        </li>
                        <li>
                            <a href="?c=notification">
                                <div class="icon" style='background: url({$theme}/star.png) no-repeat center center / 30px;' alt="notifications" title="Notifications"></div>
                            </a>
                        </li>
                        <li><a href="#">
                                <div class="icon" style='background: url({$theme}/options_2.png) no-repeat center center / 30px;' alt="options" title="Options"></div>                        </a>
                            <ul class="sub_menu">
{section name=menu_sec0 loop=$personnages}
                                <li>
                                    <a href="?c=personnage&amp;a=controler&amp;id={$personnages[menu_sec0].id}">
                                        <span class="avatar" style='background: url({$personnages[menu_sec0].avatar});' alt="{$personnages[menu_sec0].nom}" title="{$personnages[menu_sec0].nom}"></span>
                                        Contrôler {$personnages[menu_sec0].nom}
                                    </a>
                                </li>
{/section}
                                <li><a href="?c=personage&amp;a=creer">Créer un personage</a></li>
                                <li><a href="?c=utilisateur&amp;a=mon_compte">Mon Compte</a></li>
                                <li><a href="?c=utilisateur&amp;a=deconnexion">Déconnecter</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>