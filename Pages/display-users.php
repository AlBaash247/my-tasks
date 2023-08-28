<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="d-flex mt-5">
            <div class="row justify-content-center w-100">
                <div class="col-12 col-xxl-10 p-0">

                    <table class="table table-hover">
                        <thead>
                            <tr class="table-light">
                                <th scope="col" class="display-4">id</th>
                                <th scope="col" class="display-4">Full Name</th>
                                <th scope="col" class="display-4">Email</th>
                                <th scope="col" class="display-4">Status</th>
                                <th scope="col" class="display-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">

                            <tr id="userRowTemplate_1" class="table-success">
                                <td id="txtUserId_1" class="fs-2 display-6 py-3">1</td>
                                <td id="txtUserFullName_1" class="fs-2 display-6 py-3">Mark</td>
                                <td id="txtUserEmail_1" class="fs-2 display-6 py-3">Mark@mail.com</td>
                                <td id="txtUserStatus_1" class="fs-2 display-6 py-3 fw-bolder text-success">Active</td>
                                <td class="py-3">
                                    <button id="btnActivate_1" onclick="activate(1,'Mark')" class="btn btn-lg text-uppercase fs-4 display-6 py-2 px-4 btn-success visually-hidden">Activate</button>
                                    <button id="btnDisable_1" onclick="disable(1,'Mark')" class="btn btn-lg text-uppercase fs-4 display-6 py-2 px-4 btn-danger">Disable</button>
                                </td>
                            </tr>
                            <?= printUsers() ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>


    <script>
        function activate(userId, userFullName) {
            // alert(userId + ". " + userFullName + " activated successfully");
            activateRowHighlight();
        }

        function disable(userId, userFullName) {
            // alert(userId + ". " + userFullName + " disabled successfully");
            disableRowHighlight(userId);
        }

        function activateRowHighlight(userId) {
            const userRowTemplate = document.querySelector("#userRowTemplate_" + userId);
            const txtUserStatus = document.querySelector("#txtUserStatus_" + userId);
            const btnActivate = document.querySelector("#btnActivate_" + userId);
            const btnDisable = document.querySelector("#btnDisable_" + userId);

            txtUserStatus.innerText = "Active";
            txtUserStatus.classList.add("text-success");
            txtUserStatus.classList.remove("text-danger");

            userRowTemplate.classList.remove("table-danger");
            userRowTemplate.classList.add("table-success");

            btnActivate.classList.add("visually-hidden");
            btnDisable.classList.remove("visually-hidden");


        }

        function disableRowHighlight(userId) {
            const userRowTemplate = document.querySelector("#userRowTemplate_" + userId);
            const txtUserStatus = document.querySelector("#txtUserStatus_" + userId);
            const btnActivate = document.querySelector("#btnActivate_" + userId);
            const btnDisable = document.querySelector("#btnDisable_" + userId);

            txtUserStatus.innerText = "Disabled";
            txtUserStatus.classList.remove("text-success");
            txtUserStatus.classList.add("text-danger");

            userRowTemplate.classList.add("table-danger");
            userRowTemplate.classList.remove("table-success");

            btnActivate.classList.remove("visually-hidden");
            btnDisable.classList.add("visually-hidden");


        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>

<?php

function printUsers()
{
    require_once '../php/get-users.php';

    foreach (getResponse() as $user) {
        $template = <<<HTML
        <tr id="userRowTemplate_$user[id]" class="table-success">
            <td id="txtUserId_$user[id]" scope="row" class="fs-2 display-6 py-3">$user[id]</td>
            <td id="txtUserFullName_$user[id]" class="fs-2 display-6 py-3">$user[full_name]</td>
            <td id="txtUserEmail_$user[id]" class="fs-2 display-6 py-3">$user[email]</td>
            <td id="txtUserStatus_$user[id]" class="fs-2 display-6 py-3 fw-bolder text-success">Active</td>
            <td class="py-3">
                <button id="btnActivate_$user[id]" onclick="activate($user[id], '$user[full_name]')" 
                class="btn bt-lg text-uppercase fs-4 display-6 py-2 px-4 btn-success visually-hidden">Activate</button>

                <button id="btnDisable_$user[id]" onclick="disable($user[id], '$user[full_name]')" 
                class="btn bt-lg text-uppercase fs-4 display-6 py-2 px-4 btn-danger">Disable</button>
            </td>
        </tr>
        HTML;

        echo $template;
    }
}

?>