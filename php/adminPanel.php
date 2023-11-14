<title>Admin Panel</title>
  <style>
      .btnGoBack {
        background-color: hsl(186, 100%, 19%);
        color: hsl(0, 0%, 100%);
        font-weight: 700;
        padding: 12px 36px;
        display: flex;
        align-items: center;
        gap: 8px;
        border-radius: 6px;
        overflow: hidden;
      }

      .has-before,
      .has-after {
        position: relative;
        z-index: 1;
      }

      a {
        color: inherit;
        text-decoration: none;
      }

      .title-md {
        font-size: 16px;
      }

      .btnGoBack:is(:hover, :focus-visible)::before {
        transform: translateX(100%);
      }
      .btnGoBack::before {
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: hsl(0, 0%, 13%);
        border-radius: 6px;
        transition: 0.5s ease;
        z-index: -1;
      }
      .has-before::before,
      .has-after::after {
        content: "";
        position: absolute;
      }
    table {
      width: 100%;
      margin-top: 66px;
    }
    a {
      border: 1px solid transparent;
    background-color: hsl(186, 100%, 19%);
    color: white;
    border-radius: 5px;
    padding: 2px 4px;
    text-decoration: none;
    transition: color 0.2s ease;
    }
    
    tr th
    {
      background-color: hsl(186, 100%, 19%);
      color: white;
    }
    
    th, td {
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    .inputform
    {
    margin-top: 51px;
    padding: 1px 6px;
    padding-bottom: 45px;
    }
    form {
      margin-bottom: 16px;
    }
    input[type=text], input[type=password] {
      text-align: center;
      padding: 8px;
      width: 230px;
      border-radius: 20px;
      border: 1px solid hsl(186, 100%, 19%);
    }
    input[type=submit] {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background-color: #45a049;
    }
    .addForm button:hover {
      color: #019BA9;
      cursor: pointer;
    }
    .boxForUserCount {
      padding: 20px;
      background-color: hsl(186, 100%, 19%);
      width: 15%;
      border-radius: 20px;
      color: white;
    }

    .boxForCount {
      padding: 20px;
      color: white;
      background-color: hsl(186, 100%, 19%);
      width: 15%;
      border-radius: 20px;
      margin: 10px;
      text-align: center;
      transition: transform 0.3s ease; 
    }

    .boxForCount:hover {
      transform: scale(1.1);
    }

    .navCountAdminPanel{
      display: flex;
      justify-content: center;
      margin-top: 70px;
    }

    form button {
      transition: transform ease 0.3s;
    }

    form button:hover {
      transform: scale(1.1);
    }

    .edit
    {
      margin-left: 10px;
    padding: 2px 8px;
    }
    .edit:hover
    {
      color: hsl(186, 100%, 19%);
      background-color: white;
    }
    .delete:hover
    {
      background-color: white;
      color: hsl(186, 100%, 19%);
    }
    .add 
    {
      color: white;
      background-color: hsl(186, 100%, 19%);
    }
    .add:hover
    {
      color: hsl(186, 100%, 19%);
      background-color: white;
    }
    </style>
    <div style="width: 135px; margin: 10px 10px; font-size: 10px">
      <a
        href="../loginAndSignUp.html"
        class="btnGoBack has-before title-md"
        style="height: 15px"
        >Go Back</a
      >
    </div>
    <hr>
      <h1 align="center" style="padding: 8px; color: hsl(186, 100%, 19%); position: relative;">Admin Panel</h1>
    <hr>



<!-- Display Table -->
<table id="tableUserAdmin">
    <tr>
        <th style="border-radius: 22px 0px 0px 0px;">User Id</th>
        <th>Full Name</th>
        <th>Phone Number</th>
        <th>Role [1 → Superadmin | 2 → Admin | 3 → User]</th>
        <th style="border-radius: 0px 22px 0px 0px;">Actions</th>
    </tr>
    <?php
    include 'connectToDatabase.php';

    // Retrieve data from the "users" table
    $selectQuery = "SELECT * FROM users";
    $result = $conn->query($selectQuery);

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>{$row['user_id']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['phone_number']}</td>
                <td>{$row['role_id']}</td>
                <td>
                    <a class='delete' href='deleteData.php?id={$row['user_id']}&userId={$row['user_id']}&fullName={$row['full_name']}&phoneNumber={$row['phone_number']}&role={$row['role_id']}'> Delete </a>
                    <a class='edit' href='editData.php?id={$row['user_id']}&userId={$row['user_id']}&fullName={$row['full_name']}&phoneNumber={$row['phone_number']}&role={$row['role_id']}'> Edit </a>
                </td>
            </tr>
            ";
      }
    } else {
      echo "<tr><td colspan='5'>No data found.</td></tr>";
    }

    $result->close();
    $conn->close();
    ?>
</table>



<?php
echo "
 </table><br>";
?>

<br><br><br>
<hr>
<form method="post" action="addDataAdminPanel.php" class="inputForm">

    <h1>Add</h1>
    <div class="addForm">
      <!-- <label>User Id :</label>
      <input type="text" name="userId"  placeholder="User Id" required autocomplete="off">
       -->
      <label>Full Name :</label>
      <input type="text" name="fullName"  placeholder="Full Name" required autocomplete="off">
      
      <label>Phone Number :</label>
      <input type="text" name="phoneNumber"  placeholder="Phone Number" required autocomplete="off">

      <label>Password :</label>
      <input type="password" name="password"  placeholder="Password" required autocomplete="off">

      <label>Role:</label>
      <input type="text" placeholder="1 -> SuperAdmin | 2 -> Admin" name="role" required autocomplete="off" value="3">
      <button class="add" type="submit" style="width: 75px; height: 34px;border: 1px solid transparent; border-radius: 20px">Add</button>
      
    </div>
  </form><br><br><br>


