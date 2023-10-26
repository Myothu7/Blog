<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
      body{
        font-family: SFProText-Regular, Helvetica, Arial, sans-serif;
      }
    </style>
  </head>
  <?php 
    include("../../../vendor/autoload.php");

    use App\Database\MySQL;
    use App\Database\PostTable;
    use App\Auth\Auth;
    session_start();
    $post = new PostTable(new MySQL());
    $all_post = $post->view();

?>

  <body style="height: 780px;">
      <nav class="navbar bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand fw-bolder">Blog</a>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
       
        
        <div class="d-flex">
        <div class="mb-2 me-3"><i class="bi bi-person-circle me-1"></i> <?= ucfirst(Auth::name()); ?></div>
            <a href="" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#logout">
            <i class="bi bi-escape"></i>  
          logout</a></div>

          <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalLabel">Log out</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to log-off?</p>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="../../Auth/logout.php" class="btn btn-primary">log out</a>
                    </div>
                </div>
            </div>
          </div>
        </div>  
      </nav>

      <div class="container">
          <?php foreach($all_post as $key): ?>
          <div class="row mt-4">
            <div class="col-4"></div>
            <div class="col-4">
              <div class="card pt-2 px-3 pb-3">
                    <div class="d-flex justify-content-between">
                      <div><?= $key->author ?> (<span><?= $key->date ?></span>) </div>
                      <i class="bi bi-x-lg"></i>
                    </div>
                    <div class="my-2"><?= $key->content ?></div>
                    <div class="text-center">
                      <img src="../../image/<?= $key->photo ?>" alt="">
                    </div>
                    <hr class="m-0 mt-2">
                    <div class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-hand-thumbs-up"></i>
                        Like
                      </div>
                      <div>
                        <i class="bi bi-chat-left"></i>
                        Comment
                      </div>
                      <div>
                        <i class="bi bi-share"></i>
                        Share
                      </div>
                    </div>
                    <hr class="m-0 mb-2">
                </div>
            </div>
            <div class="col-4"></div>
          </div>
          <?php endforeach; ?>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>