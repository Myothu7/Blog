<?php 

    include('../layout/header.php');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include('../../../vendor/autoload.php');
    use App\Database\MySQL;
    use App\Database\UserTable;
    use App\Auth\Http;

    use App\Auth\Auth;

    Auth::check();

    $user = new UserTable(new MySQL());
    $data = $user->view();
    $i = 1;

?>
 <div class="row mt-1">
 <div class="col-2 bg-white position-relative border-bottom border-light" style="height: 650px;">
          <div class="text-center border-bottom fs-4 p-3 text-warning">
          <i class="bi bi-command me-2 text-dark shadow"></i>
            Admin Pannel
          </div>
          <ul class="list-group rounded-0 border-0">
              <li class="list-group-item d-flex justify-content-evenly align-items-center p-1 list-group-item-action">
                  <i class="bi bi-person-lines-fill fs-5 me-3 text-primary"></i>
                  <a href="index.php" class="fs-6 text-decoration-none text-dark">Users</a>
                  <span class="dropdown-toggle" data-bs-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="collapseExample">
                  </span>
              </li>
              <li class="collapse" id="user">
                <div class="text-center p-1">
                      <a href="" class="text-decoration-none text-dark">add user</a>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-evenly align-items-center p-1 list-group-item-action">
                  <i class="bi bi-instagram fs-5 me-4 text-primary"></i>
                  <a href="../post/index.php" class="fs-6 text-decoration-none text-dark">Posts</a>
                  <span class="dropdown-toggle" data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false" aria-controls="collapseExample">
                  </span>
              </li>
              <li class="collapse border-0" id="post">
                 <div class="text-center p-1">
                    <a href="../post/create.php" class="text-decoration-none text-dark">add post</a>
                 </div>
              </li>
              <li class="list-group-item d-flex justify-content-evenly align-items-center p-1 list-group-item-action">
                  <i class="bi bi-list-check fs-5 text-primary"></i>
                  <a href="../category/index.php" class="fs-6 text-decoration-none text-dark">Category</a>
                  <span class="dropdown-toggle me-1" data-bs-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="collapseExample">
                  </span>
              </li>
              <li class="collapse" id="category">
                <div class="text-center p-1">
                    <a href="../category/index.php" class="text-decoration-none text-dark">add category</a>
                 </div>
                 <hr>
              </li>
              
          </ul>
          <div class="position-absolute bottom-0 ms-2"><a href="" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#logout">
          <i class="bi bi-escape"></i>  
          logout</a></div>

          <div class="modal fade ms-5" id="logout" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-2">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalLabel">Log out</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mt-2">
                        <p>Are you sure you want to log-off?</p>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="../../Auth/logout.php" class="btn btn-primary">log out</a>
                    </div>
                </div>
            </div>
          </div>
    </div>
<div class="col-10 bg-secondary bg-gradient border-bottom border-light">
    <h3 class="m-4 fw-bolder text-white"><i class="bi bi-forward me-2 text-dark"></i>All Users</h3>
            
    <?php if(isset($_GET['delete'])): ?>
        <div class="alert alert-success alert-dismissible fade show p-2 px-3 w-50 mx-auto mb-3" role="alert">
            Delete Successfully!
            <button type="button" class="btn-close mt-2 me-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>  
    <?php if(isset($_GET['update'])): ?>
        <div class="alert alert-success alert-dismissible fade show p-2 px-3 w-50 mx-auto mb-3" role="alert">
            Update Successfully!
            <button type="button" class="btn-close mt-2 me-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>  
    <table class="table table-striped w-50 mx-auto mt-5">
        <thead>
        <tr>
            <th class="p-2">No</th>
            <th class="p-2">Name</th>
            <th class="p-2">Email</th>
            <th class="p-2">User type</th>
            <th class="p-2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $val): ?>
            <tr>
                <td class="p-1"><?= $i++; ?></td>
                <td class="p-1"><?= $val->name; ?></td>
                <td class="p-1"><?= $val->email; ?></td>
                <td class="p-1"><?= $val->user_type; ?></td>
                <td class="p-1">
                    <a href="edit.php?id=<?= $val->id ?>"><i class="bi bi-box-arrow-in-down-left me-2 text-success"></i></a>
                    <a href="../../Auth/delete.php?id=<?= $val->id ?>"><i class="bi bi-trash text-danger"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php 
include('../layout/footer.php');
?>