<?php 
session_start();

// var_dump($_SESSION);

use App\DAO\UserDAO;

include_once('../incs/menu.php');
require_once('../../App/DAO/DAO.php');
require_once('../../App/DAO/UserDAO.php');
require_once('../../App/Config.php');
require_once('../../App/DB.php');

$userDAO = new UserDAO();

$users = $userDAO->getAll();

?>

<div class="main-content">
        <div class="wrapper">
            <h1>Manage Users</h1>
            <br/><br/>

            <a href="/users/create" class="btn-primary">Add User</a>
            <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

            <?php if(!empty($_SESSION['isLoggedIn'])): ?>
                <?php if (!empty($users)): ?>
                    <?php $sn = 0 ?>
                    <?php foreach ($users as $user): ?>
                        <?php $sn++ ?>
                        <tr>
                            <td>
                                <?= $sn ?>
                            </td>
                            <td>
                                <?= $user->fullname ?>
                            </td>
                            <td>
                                <?= $user->username ?>
                            </td>
                            <td>
                                <div class="container-user-action">
                                    <div class="container-update">
                                        <a href="/users/update.php?id=<?= $user->id ?>" class="btn-secondary">Update</a>
                                    </div>
                                    <div class="container-delete">
                                        <form action="/users/delete.php" method="post">
                                            <button type="submit" name="id" value="<?= $user->id ?>"
                                                    class="btn-danger"
                                                    onclick='return confirm("Delete this user?")'>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            <?php endif ?>
            </table>

        </div>
    </div>

<?php include_once('../incs/footer.php') ?>