<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Node Chart</title>

    <!-- Bootstrap V5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom Css -->
    <link href="dist/css/jquery.orgchart.min.css" rel="stylesheet">

    <style>
        .custom-node {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .custom-node .title {
            font-size: 1.2em;
            font-weight: bold;
        }

        .custom-node .content {
            font-size: 1em;
            margin-top: 5px;
        }

        .custom-node .extra-content {
            margin-top: 10px;
            font-size: 0.9em;
        }

        .custom-node-card-reh.card {
            padding: 15px;
            font-size: 15px;
            max-width: 350px;
            min-width: 250px;
        }

        .custom-node-card-reh .username {
            background: #f0f0f0;
            border-radius: 22px;
            padding: 5px 13px;
            max-width: 88%;
            margin-right: 18px;
        }

        .custom-node-card-reh.card .username .fullname {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .custom-node-card-reh.card .active_inactive {
            background-color: grey;
            color: #fafafa;
            padding: 2px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            margin-left: 10px;
        }

        .custom-node-card-reh .username,
        .custom-node-card-reh .date {
            text-align: left;
        }

        .custom-node-card-reh .usercount {
            text-align: right;
            font-size: 14px;
            font-weight: 500;
        }

        .custom-node-card-reh .actionplane-title {
            font-size: 16px;
            text-align: left;
            color: #4282e9;
        }

        .custom-node-card-reh p {
            margin: 0;
        }

        .custom-node-card-reh .userbadge {
            background-color: #8e6a23;
            color: #fafafa;
            border-radius: 100%;
            height: 25px;
            min-width: 25px;
            width: 25px;
            align-content: space-evenly;
            margin-right: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        .custom-node-card-reh .userstatus {
            background-color: grey;
            color: #fafafa;
            padding: 2px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .custom-node-card-reh .progress-block .progress-value {
            color: #212529;
            font-size: 14px;
            font-weight: 500;
        }

        .custom-node-card-reh .progress-block .progress-bar {
            background-color: #4282e9;
        }

        #chart-container .orgchart .hierarchy::before {
            border-top: 3px solid #80808073 !important;
        }

        #chart-container .orgchart>ul>li>ul li>.node::before,
        #chart-container .orgchart .node:not(:only-child)::after {
            background-color: #80808073 !important;
        }

        .hidden-arrow.dropdown-toggle::after {
            display: none;
        }

        .node-info .hidden-arrow.dropdown-toggle {
            border-radius: 4px;
            color: grey;
        }

        .node-info .dropdown-menu.show li .dropdown-item i {
            color: grey;
        }

        .linked-icon {
            color: grey;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1>Example 01</h1>
    </div>

    <div class="container text-center bg-secondary-subtle">
        <div class="row">
            <div class="col">
                Column
            </div>
            <div class="col">
                Column
            </div>
            <div class="col">
                Column
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="chart-container"></div>
                <!-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle hidden-arrow" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-home me-2"></i>Home</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                    </ul>
                </div> 
                <span class="add-node me-3">
                    <a href="#" class="linked-icon"><i class="fas fa-plus"></i></a>
                </span>
                <span class="edit-node me-3">
                    <a href="#" class="linked-icon"><i class="fas fa-pen"></i></a>
                </span>
                <span class="delete-node">
                    <a href="#" class="linked-icon"><i class="fas fa-trash"></i></a>
                </span>
                -->
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Edit Node Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form here -->
                    <form action="">
                        <div class="row m-0">
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <lable for="">Username</lable>
                                    <input type="text" placeholder="Enter Username" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <lable for="">Title</lable>
                                    <input type="text" placeholder="Enter Title" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <lable for="date">Date</lable>
                                    <input type="date" placeholder="Enter Date" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Node</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form here -->
                    Edit form content
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Node</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this node?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="dist/js/jquery.orgchart.min.js"></script>

    <script>
        'use strict';

        (function ($) {

            $(function () {

                var datascource = {
                    'username': 'Hussam Alkannas',
                    'usercount': '05',
                    'action_plane': '2023 Strategy Action Plan',
                    'date': '31/Dec/24',
                    'userbadge': 'C',
                    'userstatus': 'READY FOR GRADING',
                    'progress': '96.93',
                    'children': [
                        {
                            'username': 'Hussain Abdul Mohsen',
                            'usercount': '02',
                            'action_plane': '2023 Strategy Action Plan',
                            'date': '31/Dec/23',
                            'userbadge': 'C',
                            'userstatus': 'READY FOR GRADING',
                            'progress': '100',
                        },
                        {
                            'username': 'Ahmad Namazi',
                            'usercount': '04',
                            'action_plane': '2023 Strategy Action Plan',
                            'date': '31/Dec/23',
                            'userbadge': 'C',
                            'userstatus': 'READY FOR GRADING',
                            'progress': '61.93',
                        },
                        {
                            'username': 'Faisal Al Missfer',
                            'usercount': '04',
                            'action_plane': '2023 Strategy Action Plan',
                            'date': '31/Dec/23',
                            'userbadge': 'C',
                            'userstatus': 'READY FOR GRADING',
                            'progress': '73.13',
                        },
                        {
                            'username': 'Abdul Aziz Abdullah Alamghir',
                            'usercount': '02',
                            'action_plane': '2023 Strategy Action Plan',
                            'date': '31/Dec/23',
                            'userbadge': 'C',
                            'userstatus': 'READY FOR GRADING',
                            'progress': '96.88',
                        },
                        {
                            'username': 'Wael Haroun Wael Haroun',
                            'active_inactive': 'INACTIVE',
                            'usercount': '02',
                            'action_plane': '2023 Strategy Action Plan',
                            'date': '31/Dec/23',
                            'userbadge': 'C',
                            'userstatus': 'READY FOR GRADING',
                            'progress': '82.22',
                        },
                        {
                            'username': 'Wael Haroun Wael Haroun',
                            'active_inactive': 'INACTIVE',
                            'usercount': '02',
                            'action_plane': '2023 Strategy Action Plan',
                            'date': '31/Dec/23',
                            'userbadge': 'C',
                            'userstatus': 'READY FOR GRADING',
                            'progress': '82.22',
                        },
                    ]
                };

                $(function () {
                    var oc = $('#chart-container').orgchart({
                        'data': datascource,
                        'nodeTemplate': customTemplate,
                        'pan': true,
                        'zoom': true
                    });
                    // $(".orgchart").css("background", "none");
                });

                function customTemplate(data) {
                    return `
                            <div class="card custom-node-card-reh">
                                <div class="d-flex align-items-center justify-content-end">
                                    <div class="dropdown node-info">
                                        <button class="dropdown-toggle hidden-arrow border-0" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus me-2"></i>Add Child</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-pen me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between m-0 mb-2">
                                    <p class="username d-flex align-items-center">
                                        <span class="usernamecase"></span>
                                        <span class="fullname">${data.username}</span>
                                        ${data.active_inactive ? `<span class="active_inactive">${data.active_inactive}</span>` : ''}
                                    </p>
                                    <p class="usercount">
                                        ${data.usercount}
                                    </p>
                                </div>
                                <h3 class="actionplane-title mb-2">${data.action_plane}</h3>
                                <p class="small date text-muted mb-2">${data.date}</p>
                                <div class="d-flex align-items-center justify-content-between m-0 mb-2">
                                    <div><div class="userbadge"><span>${data.userbadge}</span></div></div>
                                    <span class="userstatus">
                                        ${data.userstatus}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between m-0 progress-block">
                                    <div class="progress mt-2 w-100 me-3">
                                        <div class="progress-bar" role="progressbar" style="width: ${data.progress}%;" aria-valuenow="${data.progress}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <span class="progress-value">${data.progress}%</span>
                                    </div>
                                </div>
                            </div>
                        `;
                }

            });

        })(jQuery);
    </script>
</body>

</html>