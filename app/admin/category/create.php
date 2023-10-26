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
    
     if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        if(!empty($name) && !empty($description)){
            $categorty = new CategoryTable(new MySQL());
            $date = date('Y-m-d');
            $data = [':name'=> $name , ':description'=> $description,':create_at'=> $date] ;
            $insert = $categorty->create($data); 
        
            if($insert){
                Http::redirect('admin/category/create.php','success=1');
            }else{
                Http::redirect('admin/category/create.php','fail=1');
            }
        }else{
            Http::redirect('admin/category/create.php','invalid=1');
        }
     }
?>
 <div class="row mt-1">
 <div class="col-2 bg-white position-relative border-bottom border-light" style="height: 650px;">
          <div class="text-center border-bottom fs-4 p-3 text-warning">
          <i class="bi bi-command me-2 text-dark shadow"></i>
            Admin Pannel
          </div>
          <ul class="list-group rounded-0 border-0">
          <?php if(Auth::role() == 'admin') : ?>
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
           <?php endif; ?>   
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
              <?php if(Auth::role() == 'admin') : ?>
              <li class="list-group-item d-flex justify-content-evenly align-items-center p-1 list-group-item-action">
                  <i class="bi bi-list-check fs-5 text-primary"></i>
                  <a href="index.php" class="fs-6 text-decoration-none text-dark">Category</a>
                  <span class="dropdown-toggle me-1" data-bs-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="collapseExample">
                  </span>
              </li>
              <li class="collapse" id="category">
                <div class="text-center p-1">
                    <a href="" class="text-decoration-none text-dark">add category</a>
                 </div>
                 <hr>
              </li>
              <?php endif; ?>
              
          </ul>
          <div class="position-absolute bottom-0 ms-2">
            <div class="mb-2"><i class="bi bi-person-circle me-1"></i><?= Auth::name(); ?></div>
            <a href="" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#logout">
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
            <?php if($_GET['success']) : ?>
                <div class="alert alert-success alert-dismissible fade show p-2 px-3" role="alert">
                    Upload Successfully!
                    <button type="button" class="btn-close mt-2 me-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>    
            <?php if($_GET['fail']) : ?>
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
            <form method="post" class="mt-3">
                <h5 class="mb-4">Add Post Category</h5>
                <div class="mb-2">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control p-1">
                </div>
                <div class="mb-2">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
                <div class="mb-2 d-flex  justify-content-end">
                    <a href="create.php" class="btn btn-primary p-1">Cancel</a>
                    <input type="submit" value="Add" class="btn btn-primary ms-2 p-1" name="submit">
                </div>
            </form>
        </div>
    </div>



<?php 
include('../layout/footer.php');
?>