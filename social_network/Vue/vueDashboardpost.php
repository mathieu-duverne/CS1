<?php
require_once "templates/templateDashboard.php";
echo "$header";
?>
    <div id="resulte"></div>

    <table class="table table-striped table-hover">
        <div id="error"></div>

        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Texte</th>
            <th scope="col">Id_user</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?= $tableBody ?>
        </tbody>
    </table>

<?php
echo "$footer";
