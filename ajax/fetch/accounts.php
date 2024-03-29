<?php
include("../../dbConnect.php");
if(isset($_POST['rd']) && isset($_POST['rd'])!=="")
{
    $query = "SELECT * FROM account_credentials ORDER BY id DESC";
    $result = mysqli_query($conn,$query);
    $table = "<table class='table table-bordered text-center table-hover table-striped dataTable' style='width:120%;'>
    <thead>
    <tr>
    <th>SR.NO</th>
    <th>FULL NAME</th>
    <th>GMAIL</th>
    <th>TWITTER</th>
    <th>INSTAGRAM</th>
    <th>DISCORD</th>
    <th>TWITCH</th>
    <th>OPERATIONS</th>
    </tr>
    </thead><tbody>";
    $i = 1;
    while($data = mysqli_fetch_assoc($result))
    {
        $table.= "<tr>
        <td>".$i++."</td>
        <td>".$data['name']."</td>
        <td><ul class='list-unstyled'>
        <li class='copied'>".$data['gmail']."</li>
        <li class='copied'>".$data['gmail_password']."</li>
        </td></ul>
        <td><ul class='list-unstyled'>
        <li class='copied'>".$data['twitter']."</li>
        <li class='copied'>".$data['twitter_password']."</li>
        </td></ul>
        <td><ul class='list-unstyled'>
        <li class='copied'>".$data['instagram']."</li>
        <li class='copied'>".$data['instagram_password']."</li>
        </td></ul>
        <td><ul class='list-unstyled'>
        <li class='copied'>".$data['discord']."</li>
        <li class='copied'>".$data['discord_password']."</li>
        </td></ul>
        <td><ul class='list-unstyled'>
        <li class='copied'>".$data['twitch']."</li>
        <li class='copied'>".$data['twitch_password']."</li>
        </td></ul>
        <td>
            <button type='button' class='btn btn-info text-white' title='Edit record'
            onclick='editAccount($data[id])'><i class='fas fa-edit'></i> Edit</button>

            <button type='button' class='btn btn-danger' title='Delete record'
            onclick='deleteAccount($data[id])'><i class='fas fa-trash-alt'></i> Delete</button>
        </td>
        </tr>";
    }
    $table.= "</tbody></table>";
    echo $table;
}
?>
<script>
    $(document).ready(function () {
        $(".dataTable").dataTable();
    });
</script>