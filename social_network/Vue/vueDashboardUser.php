<?php
require_once "templates/templateDashboard.php";
echo "$header";
?>
        <div id="resulte"></div>

    <table class="table table-striped table-hover">
        <div id="error"></div>
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Firstname</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Avatar_url</th>
            <th scope="col">Status</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?= $tableBody ?>
        </tbody>
    </table>
<?php
echo "$footer";
?>