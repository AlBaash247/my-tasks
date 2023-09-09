<?php require_once '../templates/display-users.template.php' ?>

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

                            <?php printUsers() ?>

                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>

    <script type="module" src="../js/controllers/display-users.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>