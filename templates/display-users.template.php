<?php

function printUsers()
{
    require '../API/get-users.php';
    foreach (getResponse() as $user) {


        echo getTemplate($user);
    }
}

function getTemplate($user)
{

    $template = "";

    if (strtolower($user['status']) == 'active') {
        $template = <<<HTML

                            <tr id="userRowTemplate_$user[id]" class="table-success">
                                <td id="txtUserId_$user[id]" class="fs-2 display-6 py-3">$user[id]</td>
                                <td id="txtUserFullName_$user[id]" class="fs-2 display-6 py-3">$user[full_name]</td>
                                <td id="txtUserEmail_$user[id]" class="fs-2 display-6 py-3">$user[email]</td>
                                <td id="txtUserStatus_$user[id]" class="fs-2 display-6 py-3 fw-bolder text-success">$user[status]</td>
                                <td class="py-3">
                                    <button id="btnActivate_$user[id]" onclick="window.display_users_js.activate($user[id],'$user[full_name]')" class="btn btn-lg text-uppercase fs-4 display-6 py-2 px-4 btn-success visually-hidden">Activate</button>
                                    <button id="btnDisable_$user[id]" onclick="window.display_users_js.disable($user[id],'$user[full_name]')" class="btn btn-lg text-uppercase fs-4 display-6 py-2 px-4 btn-danger">Disable</button>
                                </td>
                            </tr>

HTML;
    } else {
        $template = <<<HTML

        <tr id="userRowTemplate_$user[id]" class="table-danger">
            <td id="txtUserId_$user[id]" class="fs-2 display-6 py-3">$user[id]</td>
            <td id="txtUserFullName_$user[id]" class="fs-2 display-6 py-3">$user[full_name]</td>
            <td id="txtUserEmail_$user[id]" class="fs-2 display-6 py-3">$user[email]</td>
            <td id="txtUserStatus_$user[id]" class="fs-2 display-6 py-3 fw-bolder text-danger">$user[status]</td>
            <td class="py-3">
                <button id="btnActivate_$user[id]" onclick="window.display_users_js.activate($user[id],'$user[full_name]')" class="btn btn-lg text-uppercase fs-4 display-6 py-2 px-4 btn-success">Activate</button>
                <button id="btnDisable_$user[id]" onclick="window.display_users_js.disable($user[id],'$user[full_name]')" class="btn btn-lg text-uppercase fs-4 display-6 py-2 px-4 btn-danger visually-hidden">Disable</button>
            </td>
        </tr>

HTML;
    }

    return $template;
}
