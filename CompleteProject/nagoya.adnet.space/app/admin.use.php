<?php
//base

include(BASE_DIR.'app/Config.php');
include(BASE_DIR.'app/Helpers.php');

//controllers
include(BASE_DIR.'app/controllers/admin/Controller.php');
include(BASE_DIR.'app/controllers/admin/NotificationsController.php');
include(BASE_DIR.'app/controllers/admin/LoginController.php');
include(BASE_DIR.'app/controllers/admin/ConstructionController.php');
include(BASE_DIR.'app/controllers/admin/ConstructionStatusController.php');
include(BASE_DIR.'app/controllers/admin/WeekPlanController.php');

//models
include(BASE_DIR.'app/models/Model.php');
include(BASE_DIR.'app/models/Notification.php');
include(BASE_DIR.'app/models/administrator.php');
include(BASE_DIR.'app/models/ConstructionStatus.php');
include(BASE_DIR.'app/models/WeekPlan.php');