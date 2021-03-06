<!-- $title definition -->

<?php $this->_title = 'Tableau de bord'; ?>


<!-- Content title definition -->

<?php $this->_contentTitle = 'Tableau de bord'; ?>

<!-- $content definition -->

<?php ob_start(); ?>

<!-- Content Card Row -->
<div class="row">

    <!-- Post number card -->
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card border-left-primary-custom shadow h-100 py-2 dashboard-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary-custom text-uppercase mb-1"><a href="index.php?action=adminPosts">Nombre de posts</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $publishedPostsNb ?> publiés / <?= $totalPostsNb ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comment number card -->
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card border-left-primary-custom shadow h-100 py-2 dashboard-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary-custom text-uppercase mb-1"><a href="index.php?action=adminComments">Nombre de commentaires</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $approvedCommentsNb ?> approuvés / <?= $totalCommentsNb ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User number card -->
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card border-left-primary-custom shadow h-100 py-2 dashboard-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary-custom text-uppercase mb-1"><a href="index.php?action=adminUsers">Nombre d'utilisateurs</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $usersNb ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>

<!-- Recent Post Row -->

<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 dashboard-recent-cards">
            <!-- Card Header - Accordion -->
            <a href="#recentPostsCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="recentPostsCard">
                <h6 class="m-0 font-weight-bold text-primary-custom">Articles récents</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="recentPostsCard">
                <div class="card-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                         <tr>
                            <th scope="col" class="responsive-table-custom">Id</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Chapô</th>
                            <th scope="col"  class="responsive-table-custom">Date de création</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($recentPosts as $post)
                            {
                                if ($post->getStatus() == 2) {
                                    echo '<tr>';
                                } else {
                                    echo '<tr class="table-success-custom">';
                                }
                            ?>
                                <th scope="row"  class="responsive-table-custom"><?= htmlspecialchars($post->getId(), ENT_QUOTES); ?></th>
                                <td><?= htmlspecialchars($post->getPseudo(), ENT_QUOTES); ?></td>
                                <td><?= htmlspecialchars($post->getTitle(), ENT_QUOTES); ?></td>
                                <td><?= substr(htmlspecialchars($post->getChapo(), ENT_QUOTES), 0, 50); ?>...</td>
                                <td class="responsive-table-custom"><?= $post->getDateCreation(); ?></td>
                                <td>
                                    
                                <?php 
                                if ($post->getStatus() == 2) {
                                    ?>

                                    <a href="index.php?action=publishPostDashboard&amp;id=<?= htmlspecialchars($post->getId(), ENT_QUOTES); ?>&amp;currstatus=<?= htmlspecialchars($post->getStatus(), ENT_QUOTES); ?>&amp;ct=<?= $session->get('csrf_token'); ?>" class="mr-2" title="Ne plus publier"><i class="fas fa-toggle-on"></i></a>

                                    <?php
                                } else {
                                    ?>

                                    <a href="index.php?action=publishPostDashboard&amp;id=<?= htmlspecialchars($post->getId(), ENT_QUOTES); ?>&amp;currstatus=<?= htmlspecialchars($post->getStatus(), ENT_QUOTES); ?>&amp;ct=<?= $session->get('csrf_token'); ?>" class="mr-2"><i class="fas fa-toggle-off" title="Publier"></i></a>

                                    <?php
                                }
                                ?>
                                    <a href="index.php?action=adminPostView&amp;id=<?= htmlspecialchars($post->getId(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?action=editPostView&amp;id=<?= htmlspecialchars($post->getId(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Modifier">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a data-toggle="modal" data-target="#deletePostModal<?= htmlspecialchars($post->getId(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- deletePost Modal-->
                            <div class="modal fade" id="deletePostModal<?= htmlspecialchars($post->getId(), ENT_QUOTES); ?>" tabindex="-1" role="dialog" aria-labelledby="deletePostLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deletePostLabel">Voulez-vous vraiment supprimer ce post ?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Cliquez sur "Valider" pour supprimer définitivement ce post.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                                            <a class="btn btn-primary-custom" href="index.php?action=deletePostDashboard&amp;id=<?= htmlspecialchars($post->getId(), ENT_QUOTES); ?>&amp;ct=<?= $session->get('csrf_token'); ?>">Valider</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comments-Users Row -->

<div class="row">

    <!-- Comments panel -->

    <div class="col-lg-6">
        <div class="card shadow mb-4 dashboard-recent-cards">

            <!-- Card Header - Accordion -->
            <a href="#recentCommentsCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="recentCommentsCard">
                <h6 class="m-0 font-weight-bold text-primary-custom">Commentaires récents</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="recentCommentsCard">
                <div class="card-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col" class="responsive-table-custom">Id</th>
                                <th scope="col">Auteur</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach($recentComments as $comment) {
                                if ($comment->getStatus() == 2) {
                                    echo '<tr>';
                                } else {
                                    echo '<tr class="table-success-custom">';
                                }
                            ?>
                                <th scope="row" class="responsive-table-custom"><?= htmlspecialchars($comment->getId(), ENT_QUOTES); ?></th>
                                <td><?= htmlspecialchars($comment->getUserPseudo(), ENT_QUOTES); ?></td>
                                <td><?= substr(htmlspecialchars($comment->getContent(), ENT_QUOTES), 0, 50); ?>...</td>
                                <td><?= $comment->getCommentDate(); ?></td>
                                <td>
                                    <a href="index.php?action=adminPostView&amp;id=<?= htmlspecialchars($comment->getPostId(), ENT_QUOTES); ?>"class="btn btn-outline-dark btn-sm" title="Voir l'article concerné">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    <?php
                                    if ($comment->getStatus() == 1) {
                                        ?>

                                        <a href="index.php?action=approveCommentDashboard&amp;id=<?= htmlspecialchars($comment->getId(), ENT_QUOTES); ?>&amp;ct=<?= $session->get('csrf_token'); ?>" class="btn btn-outline-dark btn-sm" title="Approuver">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    
                                        <?php
                                    }
                                    ?>
                                    
                                    <a data-toggle="modal" data-target="#deleteCommentModal<?= htmlspecialchars($comment->getId(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Supprimer">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- deleteComment Modal-->
                            <div class="modal fade" id="deleteCommentModal<?= htmlspecialchars($comment->getId(), ENT_QUOTES); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteCommentLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteCommentLabel">Voulez-vous vraiment supprimer ce commentaire ?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Cliquez sur "Valider" pour supprimer définitivement ce commentaire</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                                            <a class="btn btn-primary-custom" href="index.php?action=deleteCommentDashboard&amp;id=<?= htmlspecialchars($comment->getId(), ENT_QUOTES); ?>&amp;ct=<?= $session->get('csrf_token'); ?>">Valider</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    


    <!-- Users panel -->

    <div class="col-lg-6">
        <div class="card shadow mb-4 dashboard-recent-cards">
            <!-- Card Header - Accordion -->
            <a href="#recentUsersCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="recentUsersCard">
                <h6 class="m-0 font-weight-bold text-primary-custom">Utilisateurs</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="recentUsersCard">
                <div class="card-body">
                    <table class="table table-hover table-responsive">
                        <thead>
                         <tr>
                            <th scope="col" class="responsive-table-custom">Id</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rôle</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($users as $user) {
                            ?>
                            <tr>
                                <th scope="row" class="responsive-table-custom"><?= htmlspecialchars($user->getId(), ENT_QUOTES); ?></th>
                                <td><?= htmlspecialchars($user->getPseudo(), ENT_QUOTES); ?></td>
                                <td><?= htmlspecialchars($user->getEmail(), ENT_QUOTES); ?></td>
                                <td><?= htmlspecialchars($user->getRole(), ENT_QUOTES); ?></td>
                                <td>
                                    <a href="index.php?action=profileUser&amp;id=<?= htmlspecialchars($user->getId(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?action=editUser&amp;id=<?= htmlspecialchars($user->getId(), ENT_QUOTES); ?>" class="btn btn-outline-dark btn-sm" title="Modifier">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>


                            <?php
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<?php $this->_content = ob_get_clean(); ?>
