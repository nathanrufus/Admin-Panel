<?php
include '../includes/session_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="/Admin-Panel/assets/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header, .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px 0;
        }
        .nav {
            background-color: #333;
            overflow: hidden;
        }
        .nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .nav a:hover, .dropdown:hover .dropbtn {
            background-color: #ddd;
            color: black;
        }
        .dropdown {
            float: left;
            overflow: hidden;
        }
        .dropdown .dropbtn {
            font-size: 16px;  
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>University Admin Panel</h1>
    </div>
    <div class="nav">
        <a href="/Admin-Panel/index.php">Home</a>
        
        <div class="dropdown">
            <button class="dropbtn">User Management 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/add_user.php">Add User</a>
                <a href="/Admin-Panel/admin/view_users.php">View User Profiles</a>
                <a href="/Admin-Panel/admin/roles_permissions.php">Assign Roles</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Course Management 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/add_course.php">Add Course</a>
                <a href="/Admin-Panel/admin/view_courses.php">View Courses</a>
                <a href="/Admin-Panel/admin/assign_instructors.php">Assign Instructors</a>
                <a href="/Admin-Panel/admin/manage_enrolments.php">Manage Enrolments</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Department Management 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/add_department.php">Add Department</a>
                <a href="/Admin-Panel/admin/view_departments.php">View Departments</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Event Management 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/add_event.php">Add Event</a>
                <a href="/Admin-Panel/admin/view_events.php">View Events</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Support Management 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/manage_tickets.php">Manage Tickets</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Settings and Configuration 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/general_settings.php">General Settings</a>
                <a href="/Admin-Panel/admin/roles_permissions.php">User Roles and Permissions</a>
                <a href="/Admin-Panel/admin/backup_restore.php">Backup & Restore</a>
                <a href="/Admin-Panel/admin/system_logs.php">System Logs</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Reports and Analytics 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/generate_reports.php">Generate Reports</a>
                <a href="/Admin-Panel/admin/view_analytics.php">View Analytics</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Communication 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/send_emails.php">Send Emails</a>
                <a href="/Admin-Panel/admin/manage_notifications.php">Manage Notifications</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Security 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/Admin-Panel/admin/manage_access_control.php">Manage Access Control</a>
                <a href="/Admin-Panel/admin/audit_logs.php">Audit Logs</a>
            </div>
        </div>

        <a href="/Admin-Panel/logout.php">Logout</a>
    </div>
    <div class="content">
