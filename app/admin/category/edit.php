<?php 
    include('../layout/header.php');
?>

<!-- create category -->
<?php 
include('../../../vendor/autoload.php');
use App\Database\MySQL;
use App\Database\CategoryTable;
use App\Auth\Http;

$categorty = new CategoryTable(new MySQL());
$data = $categorty->edit($_GET['id']);
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
                  <a href="../user/index.php" class="fs-6 text-decoration-none text-dark">Users</a>
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
                  <a href="" class="fs-6 text-decoration-none text-dark">Posts</a>
                  <span class="dropdown-toggle" data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false" aria-controls="collapseExample">
                  </span>
              </li>
              <li class="collapse border-0" id="post">
                 <div class="text-center p-1">
                    <a href="" class="text-decoration-none text-dark">add post</a>
                 </div>
              </li>
              <li class="list-group-item d-flex justify-content-evenly align-items-center p-1 list-group-item-action">
                  <i class="bi bi-list-check fs-5 text-primary"></i>
                  <a href="" class="fs-6 text-decoration-none text-dark">Category</a>
                  <span class="dropdown-toggle me-1" data-bs-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="collapseExample">
                  </span>
              </li>
              <li class="collapse" id="category">
                <div class="text-center p-1">
                    <a href="create.php" class="text-decoration-none text-dark">add category</a>
                 </div>
                 <hr>
              </li>
              
          </ul>
          <div class="position-absolute bottom-0 ms-2"><a href="" class="text-decoration-none text-danger">
          <i class="bi bi-escape"></i>  
          logout</a></div>
    </div>
    <div class="col-10 d-flex flex-column align-items-center justify-content-center bg-secondary bg-gradient border-bottom border-light">
        <div class="card p-3 border-0 shadow" style="width:380px;">
            <form method="post" class="mt-3" action="../../action/category/update.php">
                <h5 class="mb-4">Update Post Category</h5>
                <div class="mb-2">
                    <input type="hidden" name="id" value="<?= $data->id ?>">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control p-1" value="<?= $data->name ?>">
                </div>
                <div class="mb-2">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control"><?= $data->description ?></textarea>
                </div>
                <div class="mb-2 d-flex  justify-content-end">
                    <a href="index.php" class="btn btn-primary p-1">Cancel</a>
                    <input type="submit" value="Add" class="btn btn-primary ms-2 p-1" name="submit">
                </div>
            </form>
        </div>
    </div>



<?php 
include('../layout/footer.php');
?>