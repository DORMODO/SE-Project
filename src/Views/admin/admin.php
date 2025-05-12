<?php
include '../../Modules/Admin.php';
$admin = new Admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #f4f4f4;
        }

        .btn {
            padding: 8px 12px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-create {
            background-color: #28a745;
            color: white;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <button class="btn btn-create" onclick="openModal()">Add User</button>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch users from the database
                include_once '../../Controllers/DBController.php';
                $db = new DBController();

                if ($db->openConnection()) {
                    $query = "SELECT * FROM user";
                    $result = $db->connection->query($query);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['userId']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['userType']}</td>
                                <td>
                                    <button class='btn btn-edit' onclick=\"window.location.href='edit_user.php?id={$row['userId']}'\">Edit</button>
                                    <a href='admin.php?delete={$row['userId']}' class='btn btn-delete'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Failed to connect to the database</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding User -->
    <div id="addUserModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Add User</h2>
            <form method="POST" action="">
                <label for="userId">User ID:</label><br>
                <input type="text" id="userId" name="userId" required><br><br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                <label for="userType">User Type:</label><br>
                <input type="text" id="userType" name="userType" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit" class="btn btn-create">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('addUserModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('addUserModal').style.display = 'none';
        }
    </script>

    <?php
    // Handle form submission for adding a user
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userType = $_POST['userType'];
        $password = $_POST['password'];

        if ($admin->addUser($userId, $name, $password, $userType, $email)) {
            header("Location: admin.php?success=1");
            exit();
        } else {
            header("Location: admin.php?error=1");
            exit();
        }
    }

    // Handle delete request
    if (isset($_GET['delete'])) {
        $userId = $_GET['delete'];
        if ($admin->deleteUser($userId)) {
            echo "<script>alert('User deleted successfully!'); window.location.href='admin.php';</script>";
        } else {
            echo "<script>alert('Failed to delete user.'); window.location.href='admin.php';</script>";
        }
    }

    // Display success or error messages
    if (isset($_GET['success'])) {
        echo "<script>alert('User added successfully!');</script>";
    } elseif (isset($_GET['error'])) {
        echo "<script>alert('Failed to add user.');</script>";
    }
    ?>
</body>

</html>