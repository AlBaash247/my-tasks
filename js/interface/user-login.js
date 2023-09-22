import axios from 'https://cdn.jsdelivr.net/npm/axios@1.5.0/+esm';
import store2 from 'https://cdn.jsdelivr.net/npm/store2@2.14.2/+esm'

import { closeLoginModal } from "../controllers/login-modal.js";

export function apiRequest_userLogin(email, password) {

    let jsonRequest = {};
    jsonRequest.email = email;
    jsonRequest.password = password;

    axios.post('../API/user-login.php', jsonRequest)
        .then(function (response) {

            var data = response.data;
            var user = store2.namespace('user');
            user('isLoggedIn', data.is_ok);
            user('user_data', data.user_data);
            alert(user.get('user_data').full_name);
            closeLoginModal();


        })
        .catch(function (error) {
            alert(error);
        })

}