<?php
if (isset($_POST['P-submit'])) {
  wphw_opt();
  insert();
}

function wphw_opt()
{

  $link = mysqli_connect("localhost", "root", "", "myfirstplugins");
  $sql = "CREATE TABLE FistPlugins(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, username varchar(255) NOT NULL,fname varchar(255) NOT NULL,password varchar(255) NOT NULL, descriptions varchar(255) NOT NULL, Options varchar(255) NOT NULL)";
  $result = mysqli_query($link, $sql);
  return $result;
}

function insert()
{

  $link = mysqli_connect("localhost", "root", "", "myfirstplugins");
  $username = $_POST['username'];
  $fname = $_POST['fname'];
  $password = $_POST['password'];
  $descriptions = $_POST['descriptions'];
  $Options = $_POST['Options'];

  if (empty($_POST['username']) || empty($_POST['fname']) || empty($_POST['password']) || empty($_POST['descriptions']) || empty($_POST['Options'])) {
  } else {
    $query = "insert INTO FistPlugins (username,fname,password,descriptions,Options)" . "VALUES ('$username','$fname','$password', '$descriptions', '$Options')";
    $result = mysqli_query($link, $query);
  }
}

?>

<div class="wrap">
  <div id="icon-options-general" class="icon32"> <br>
  </div>
  <h2>Plugin Settings</h2>
  <?php if (isset($_POST['P-submit'])) : ?>
    <div id="message" class="updated below-h2">
      <p>Content successfully added</p>
    </div>
  <?php endif; ?>
  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Enter your information and press enter</strong></h3>
      <form method="post" action="">
        <table class="form-table">
          <tr>
            <th scope="row"></th>
            <td><input type="text" name="username" value="" style="width:350px;" placeholder="Username" /></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><input type="text" name="fname" value="" style="width:350px;" placeholder="Full name" /></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><input type="password" name="password" value="" style="width:350px;" placeholder="Password" /></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><textarea name="descriptions" value="" style="width:350px;" placeholder="Description"></textarea></td>
          </tr>

          <tr>
            <th scope="row"></th>
            <td><select name="Options" style="width:350px;">
                <option value="">--Select--</option>
                <option name="OptionA" value="OptionA">Admin</option>
                <option name="OptionB" value="OptionB">User</option>
            </td>
          </tr>

          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;padding-bottom:10px;">
              <input type="submit" name="P-submit" value="Save" class="button-primary" style="width:10%;" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>