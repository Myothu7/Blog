<?php 
    include('../layout/header.php');
?>

<!-- create category -->
<?php 
include('../../../vendor/autoload.php');
use App\Database\MySQL;
use App\Database\CategoryTable;
use App\Auth\Http;
use App\Auth\Auth;
    
Auth::check();
 
$data = new CategoryTable(new MySQL());
$category = $data->index();
session_start();

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
                    <a href="../category/create.php" class="text-decoration-none text-dark">add category</a>
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
    <div class="col-10 d-flex flex-column align-items-center justify-content-center bg-secondary bg-gradient border-bottom border-light">
        
        <div class="card p-3 border-0 shadow" style="width:380px;">
            <?php if(isset($_GET['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show p-2 px-3" role="alert">
                    Upload Successfully!
                    <button type="button" class="btn-close mt-2 me-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>    
            <?php if($_GET['error']) : ?>
                <div class="alert alert-success alert-dismissible fade show p-2 px-3" role="alert">
                    Upload fail!
                    <button type="button" class="btn-close mt-2 me-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>  
            <?php if($_GET['invalid']) : ?>
                <div class="alert alert-danger alert-dismissible fade show p-2 px-3" role="alert">
                    Required feild
                    <button type="button" class="btn-close mt-2 me-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form method="post" action="../../action/post/create.php"  enctype="multipart/form-data">
                <h4 class="mb-1 text-primary fw-bolder">Add Post</h4>
                <hr class="mb-3">
                <div class="mb-2">
                    <label for="">title</label>
                    <input type="text" name="title" class="form-control p-1">
                </div>
                <div class="mb-2">
                    <label for="">Content</label>
                    <textarea name="content" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
                    <input type="hidden" name="author_id" value="<?= $_SESSION['auth']['id']; ?>">
                <div class="mb-2">
                    <label for="">category</label>
                    <select name="category_id" id="" class="form-select p-1">
                        <option value="" hidden>--select option--</option>
                        <?php foreach($category as $val): ?>
                            <option value="<?= $val->id ?>"><?= $val->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="">photo</label>
                    <input type="file" class="form-control p-1" name="photo" accepts="image/*" id="photo">
                    <div class="mt-1 position-relative" style="display:none" id="div">
                        <img src="" alt="img" class="form-control" id="img">
                        <span class="position-absolute top-0 start-100 translate-middle" id="change-img">
                            <i class="bi bi-folder-x"></i>
                        </span>
                    </div>
                </div>
                <hr class="mb-3 mt-2">
                <div class="mb-2 d-flex  justify-content-end">
                    <a href="create.php" class="btn btn-primary p-1">Cancel</a>
                    <input type="submit" value="Add" class="btn btn-primary ms-2 p-1" name="submit">
                </div>
            </form>
        </div>
    </div>
    </div>
  <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="create.js"></script>
</body>
</html>