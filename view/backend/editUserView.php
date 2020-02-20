<!-- $title definition -->

<?php $title = 'Admin - Editer le profil'; ?>

<!-- Content title definition -->

<?php $contentTitle = 'Editer le profil'; ?>

<!-- $content definition -->

<?php ob_start(); ?>

<?php

while ($donnees = $userInfos->fetch())
{

?>

<form class="form" method="POST" action="index.php?action=editUserInfos">

    <div class="row">
        <div class="col-11 mx-auto">
            <div class="card profile-user-card">

                <div class="card-header">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $donnees['userId']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="pseudo" hidden>Pseudo : </label>
                        <input type="text" class="form-control" name="pseudo" value="<?= htmlspecialchars($donnees['pseudo']); ?>"/>
                        <small id="pseudoHelpBlock" class="form-text text-muted">Le pseudo ne doit pas dépasser 25 caractères.</small>
                    </div>
                </div>

                <div class="card-body editProfileView">

                    <div class="profile-card-avatar text-center">
                        <img class="img-thumbnail" src="<?= htmlspecialchars($donnees['avatar']); ?>" alt="User profil picture" />
                    </div>


                    <div class="profile-card-info">
                        <div class="card-title">
                            <div class="form-group">
                                <label for="firstname">Prénom : </label>
                                <input type="text" class="form-control" name="first_name" value="<?= htmlspecialchars($donnees['first_name']); ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Nom : </label>
                                <input type="text" class="form-control" name="last_name" value="<?= htmlspecialchars($donnees['last_name']); ?>"/>
                            </div>
                        </div>

                        <div class="card-text">

                            <div class="form-group">
                                <label for="birthdate">Né(e) le : </label>
                                    <input type="text" class="form-control" name="birth_date" value="<?= $donnees['birth_date']; ?>"/>
                                    <small id="birthDateHelpBlock" class="form-text text-muted">La date doit être au format JJ-MM-AAAA.</small>
                            </div>
                            <div class="form-group">
                                <label for="home">Habite à : </label>
                                <input type="text" class="form-control" name="home" value="<?= htmlspecialchars($donnees['home']); ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="user_about">A propos de moi : </label>
                                <textarea type="text" class="form-control" name="user_about"><?= htmlspecialchars($donnees['about']); ?></textarea>                               
                            </div>
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="text" class="form-control" name="email" value="<?= htmlspecialchars($donnees['email']); ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Tel : </label>
                                <input type="text" class="form-control" name="mobile" value="<?= htmlspecialchars($donnees['mobile']); ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="website">Site internet : </label>
                                <input type="text" class="form-control" name="website" value="<?= htmlspecialchars($donnees['website']); ?>"/>
                            </div>
                            
                            <hr>

                            <?php

                            if (isset($_SESSION['role']) && $_SESSION['role'] == 3)
                            {                           

                                if ($donnees['roleId'] == 1)
                                {
                                    ?>

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxadmin" value="1" name="user_role_id" checked />
                                            <label class="form-check-label" for="rolecheckboxadmin">Admin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxuser" name="user_role_id" value="2" />
                                            <label class="form-check-label" for="rolecheckboxuser">User</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxadmin" value="3" name="user_role_id" />
                                            <label class="form-check-label" for="rolecheckboxadmin">Super-admin</label>
                                        </div>
                                    </div>

                                    <?php
                                }
                                elseif ($donnees['roleId'] == 2)
                                {
                                    ?>

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxadmin" name="user_role_id" value="1" />
                                            <label class="form-check-label" for="rolecheckboxadmin">Admin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxuser" name="user_role_id" value="2" checked />
                                            <label class="form-check-label" for="rolecheckboxuser">User</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxadmin" value="3" name="user_role_id" />
                                            <label class="form-check-label" for="rolecheckboxadmin">Super-admin</label>
                                        </div>
                                    </div>

                                    <?php
                                }
                                elseif ($donnees['roleId'] == 3)
                                {
                                    ?>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxadmin" name="user_role_id" value="1" />
                                            <label class="form-check-label" for="rolecheckboxadmin">Admin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxuser" name="user_role_id" value="2" />
                                            <label class="form-check-label" for="rolecheckboxuser">User</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="rolecheckboxadmin" value="3" name="user_role_id" checked/>
                                            <label class="form-check-label" for="rolecheckboxadmin">Super-admin</label>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                            

                        </div>

                        <input type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary-custom shadow-sm ml-1" value="Enregistrer les modifications"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>                      
                            
<?php
}
$userInfos->closeCursor();

$content = ob_get_clean(); ?>

<?php require('backend_template.php'); ?>
