import { apiRequest_updateUserStatus } from "../interface/update-user-status.js";

function activate(userId, userFullName) {
    // alert(userId + ". " + userFullName + " activated successfully!");
    activateRowHighlight(userId)
    apiRequest_updateUserStatus(userId, "Active");
}

function disable(userId, userFullName) {
    // alert(userId + ". " + userFullName + " disabled successfully!");
    disableRowHighlight(userId)
    apiRequest_updateUserStatus(userId, "Disabled");

}

function activateRowHighlight(userId) {
    const userRowTemplate = document.querySelector('#userRowTemplate_' + userId);
    const txtUserStatus = document.querySelector('#txtUserStatus_' + userId);
    const btnActivate = document.querySelector('#btnActivate_' + userId);
    const btnDisable = document.querySelector('#btnDisable_' + userId);

    txtUserStatus.innerText = "Active";
    txtUserStatus.classList.add("text-success");
    txtUserStatus.classList.remove("text-danger");

    userRowTemplate.classList.remove("table-danger");
    userRowTemplate.classList.add("table-success");

    btnActivate.classList.add("visually-hidden");
    btnDisable.classList.remove("visually-hidden");
}

function disableRowHighlight(userId) {
    const userRowTemplate = document.querySelector('#userRowTemplate_' + userId);
    const txtUserStatus = document.querySelector('#txtUserStatus_' + userId);
    const btnActivate = document.querySelector('#btnActivate_' + userId);
    const btnDisable = document.querySelector('#btnDisable_' + userId);

    txtUserStatus.innerText = "Disable";
    txtUserStatus.classList.remove("text-success");
    txtUserStatus.classList.add("text-danger");

    userRowTemplate.classList.add("table-danger");
    userRowTemplate.classList.remove("table-success");

    btnActivate.classList.remove("visually-hidden");
    btnDisable.classList.add("visually-hidden");
}


window.display_users_js = {activate, disable}