<!-- $title definition -->

<?php $title = 'Admin - Profil utilisateur'; ?>

<!-- Content title definition -->

<?php $contentTitle = ''; ?>

<!-- $content definition -->

<?php ob_start(); ?>

<?php

while ($donnees = $userInfos->fetch())
{
?>

<div class="row">

    <div class="col-11 mx-auto">

        <div class="card profile-user-card">

            <h5 class="card-header text-primary-custom"><?= htmlspecialchars($donnees['pseudo']); ?></h5>

            <div class="card-body profileView">
                <div class="profile-card-avatar">

                    <?php
                    if ($donnees['avatar'] != null)
                    {
                        ?>
                        <img class="img-thumbnail" src="<?= htmlspecialchars($donnees['avatar']); ?>" alt="User profil picture" />
                        <?php
                    }
                    else
                    {
                        ?>
                        <img class="img-thumbnail" src="public/images/profile.jpg" alt="User profil picture" />
                        <?php
                    }
                    ?>
                    
                    <div class="form-group mt-2">
                        <a data-toggle="modal" data-target="#updateProfilePictureModal<?= htmlspecialchars($donnees['userId']); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary-custom shadow-sm ml-1"><i class="fas fa-upload mr-1"></i> Modifier la photo de profil</a>
                    </div>
                </div>

                <!-- updateProfilePicture Modal-->
                    <div class="modal fade" id="updateProfilePictureModal<?= htmlspecialchars($donnees['userId']); ?>" tabindex="-1" role="dialog" aria-labelledby="updateProfilePictureLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateProfilePictureLabel">Choisissez votre nouvelle photo</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                
                                <form enctype="multipart/form-data" action="index.php?action=updateProfilePicture&amp;id=<?= htmlspecialchars($donnees['userId']); ?>" method="POST">
                                    <div class="modal-body">
                                        <input name="picture" type="file" />
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary-custom" >Envoyer</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                <div class="profile-card-info">
                    <h5 class="card-title"><?= htmlspecialchars($donnees['first_name']); ?> <?= htmlspecialchars($donnees['last_name']); ?></h5>
                    <p class="card-text">Née le <?= $donnees['birth_date']; ?></p>
                    <p class="card-text">Habite à <?= htmlspecialchars($donnees['home']); ?></p>
                    <p class="card-text"><strong>A propos de moi : </strong> <?= htmlspecialchars($donnees['about']); ?></p>
                    <hr>
                    <p class="card-text"><strong>Email : </strong><?= htmlspecialchars($donnees['email']); ?></p>
                    <p class="card-text"><strong>Tel : </strong><?= htmlspecialchars($donnees['mobile']); ?></p>
                    <p class="card-text"><strong>Site internet : </strong><?= htmlspecialchars($donnees['website']); ?></p>
                    <hr>
                    <p class="card-text"><strong>Rôle : </strong><?= htmlspecialchars($donnees['role']); ?></p>
                    <p class="card-text"><strong>Date de création : </strong><?= $donnees['register_date']; ?></p>
                    <hr>


                    <p class="card-text"><i class="fas fa-newspaper"> <?= $userPostsNb['postsNb']; ?></i> - <i class="fas fa-comments"> <?= $userCommentsNb['commentsNb']; ?></i></p>
                    <hr>
                    <a href="index.php?action=editUser&amp;id=<?= htmlspecialchars($donnees['userId']); ?>" class="btn btn-outline-dark btn-sm" title="Modifier">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                </div>

            </div>
            
        </div>

    </div>

</div>

<?php
}
$userInfos->closeCursor();
?>


                            
<?php $content = ob_get_clean(); ?>

<?php require('backend_template.php'); ?>
