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
    <link rel="stylesheet" href="../../css/login.css">
  </head>
  <body>
    <div class="container mt-5" style="width: 380px">
      <div class="card p-3 border-0 shadow">
        <form method="post" action="../../auth/login.php">
          <div class="mb-3 fs-4 text-center">Login to your account</div>
          <div class="mb-3">
            <label for="">Email</label>
            <input
              type="email"
              name="email"
              placeholder="Email Address"
              class="form-control p-2 ps-3"
            />
          </div>
          <div class="mb-3">
            <label for="">Password</label>
            <input
              type="password"
              name="password"
              placeholder="Password"
              class="form-control p-2 ps-3"
            />
          </div>
          <div class="mb-3">
            <input
              type="submit"
              value="Log in"
              class="form-control btn btn-primary"
            />
          </div>
          <div class="border mb-3"></div>
          <div class="d-flex justify-content-center">
            <a href="register.php" id="create" class="p-2">Create a new account</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
