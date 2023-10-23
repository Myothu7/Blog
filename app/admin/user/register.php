<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../css/register.css">
  </head>
  <body>
    <?php 
      // include('validate.php');
    ?>
    <div class="container mt-5" style="width: 380px">
      <div class="card p-3 border-0 shadow">
        <?php if($_POST['success']) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              Registration successfully!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>  
        <form method="post" action="../../auth/register.php">
          <div class="mb-3 fs-4 text-center fw-bolder text-success">
            Sign up
          </div>
          <div class="mb-3">
            <div class="text-danger"><?= $name_err ?></div>
            <label for="">Name</label>
            <input type="text" name="name" class="form-control p-2 ps-3"/>
          </div>
          <div class="mb-3">
            <div class="text-danger fst-italic"><?= $email_err ?></div>
            <label for="">Email</label>
            <input type="email" name="email" class="form-control p-2 ps-3" />
          </div>
          <div class="mb-3">
          <div class="mb-3">
            <label for="">User type</label>
            <select name="user_type" class="form-select">
              <option value="" selected hidden>-- select option --</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
              <option value="auhor">Author</option>
            </select>
          </div>  
          <div class="text-danger fst-italic"> <?= $password_err ?></div>
            <label for="">Password</label>
            <input
              type="password"
              name="password"
              class="form-control p-2 ps-3"
            />
          </div>
          <div class="mb-3">
          <div class="text-danger fst-italic"> <?= $confirm_password_err ?></div>
            <label for="">Confirm password</label>
            <input
              type="password"
              name="confirm_password"
              class="form-control p-2 ps-3"
            />
          </div>
          <div class="mb-3 d-flex justify-content-center">
            <input type="submit" value="Sign up" class="btn btn-primary px-3" name="submit"/>
          </div>
          <div class="text-center text-muted fst-italic">
            you have account login <a href="login.php">here</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
