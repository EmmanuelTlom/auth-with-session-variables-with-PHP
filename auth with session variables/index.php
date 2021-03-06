<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auth with session variables PHP</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

  <div class="container">
    <form method="POST" action="logged-in.php" autocomplete="of">
      <input
        type="text"
        name="Fname"
        class="input-field"
        placeholder="Please Enter your Full Name"
        required
      />
      <input
        type="email"
        name="email"
        class="input-field"
        placeholder="Please Enter your Email"
        required
      />

      <input
        type="password"
        name="password"
        class="input-field"
        placeholder="Please Enter your Password"
        required
      />

      <br />

      <button type="submit" name="submit">Submit</button>
    </form>
  </div>
    
  </body>
</html>
