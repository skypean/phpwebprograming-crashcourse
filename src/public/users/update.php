<?php 
use App\DAO\UserDAO;

include_once('../incs/menu.php');
require_once('../../App/DAO/DAO.php');
require_once('../../App/DAO/UserDAO.php');
require_once('../../App/Config.php');
require_once('../../App/DB.php');

if (isset($_GET['id'])){
    $uid = (int)$_GET['id'];

    $userDAO = new UserDAO();

    $user = $userDAO->getUser($uid);
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update User</h1>
        <br />
        <br />

        <form action="/users/update" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?= $user->fullname ?? '' ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?= $user->id ?? '' ?>">
                        <input type="submit" name="submit" value="Update" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include_once('../incs/footer.php') ?>
