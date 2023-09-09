import axios from 'https://cdn.jsdelivr.net/npm/axios@1.5.0/+esm';

export function apiRequest_updateUserStatus(id, status) {

    let jsonRequest = {};
    jsonRequest.id = id;
    jsonRequest.status = status;

    axios.post('../API/update-user-status.php', jsonRequest)
    .then(function(response){
        alert(JSON.stringify(response.data));
    })
    .catch(function(error){
        alert(error);
    })

}