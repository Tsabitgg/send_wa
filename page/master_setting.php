<?php

session_start();
require_once '../Config/db.php';

$current_page = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['isAuthenticated'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$name = $_SESSION['name'];

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="../src/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Homepage</title>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- asidebar -->
        <aside id="sidebar" class="w-60 min-h-screen bg-repeat-y transition transform" style="background-image: url('../assets/img/2151554909.jpg');">
            <div class="p-4 text-white bg-sky-900">
                <div class="flex items-center">
                    <img class="w-16 h-16 rounded-full" src="../assets/img/1.png" alt="Profile Picture">
                    <div class="ml-4">
                        <h4 class="font-semibold"><?php echo htmlspecialchars($name); ?></h4>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <p class="text-green-500">Online</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <nav class="mt-20">
                <div class="flex items-center justify-between p-3 cursor-pointer" id="menu-button">
                    <div class="flex items-center">
                        <svg class="w-10 h-10 text-cyan-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>
                        <span class="ml-2 text-cyan-50 from-neutral-300">Open Api Whatsapp System</span>
                    </div>
                </div>
                <ul class="text-gray-300">
                    <li class="px-4 py-2 ml-12 mb-4 hover:bg-white hover:text-black">

                        <a href="homepage.php" class="flex items-center">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            Dokumentasi
                        </a>
                    </li>
                    <li class="px-4 py-2 ml-12 mb-4 hover:bg-white hover:text-black ">
                        <a href="sandbox.php" class="flex items-center ">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                            </svg>
                            Sandbox
                        </a>
                    </li>
                    <li class="px-4 py-2 ml-12 mb-4 hover:bg-white hover:text-black <?php echo ($current_page == 'master_setting.php') ? 'bg-white underline underline-offset-8 rounded-l text-sky-800' : ''; ?>">
                        <a href="master_setting.php" class="flex items-center">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>

                            Master Setting
                        </a>
                    </li>
                </ul>
                <div>
                    <a href="logout.php" class="flex items-center px-4 py-2 text-white hover:bg-white hover:text-black">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12h-6m6 0l-3-3m3 3l-3 3m-6-6h7.5M5.25 6h-2.25C2.56 6 1.875 6.621 1.875 7.5v9c0 .879.684 1.5 1.125 1.5h2.25" />
                        </svg>
                        Logout
                    </a>
                </div>
            </nav>
        </aside>

        <div class="flex-1">
            <!-- Top -->
            <div class="flex justify-between items-center mb-1 bg-sky-800 min-h-14 shadow-sm shadow-slate-400">
                <div class="flex items-center justify-center space-x-3">
                    <svg id='hamburger' class="ml-2 w-6 h-6 text-gray-300 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <img class="h-12 w-auto" src="../assets/img/Logo_512.png" alt="Your Company">
                    <span class="text-lg font-bold text-white">API WhatsApp</span>
                </div>
            </div>
            <!-- header -->
            <header id="sandbox" class="flex justify-between items-center mb-5 min-h-14 bg-slate-50 shadow-sm shadow-slate-400">
                <h1 class="ml-10 text-lg font-semibold">Master setting</h1>
            </header>

            <!-- main -->
            <div class="bg-white shadow-md rounded-lg ml-10 p-6 max-w-4xl w-full">
                <h2 class="text-2xl font-semibold mb-4">Data Table</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">No</th>
                                <th class="py-2 px-4 bg-gray-200 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">User</th>
                                <th class="py-2 px-4 bg-gray-200 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">Password</th>
                                <th class="py-2 px-4 bg-gray-200 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">Project</th>
                                <th class="py-2 px-4 bg-gray-200 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">Database</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='py-2 px-4 border-b border-gray-300 text-sm text-gray-700'>" . $row["id"] . "</td>";
                                    echo "<td class='py-2 px-4 border-b border-gray-300 text-sm text-gray-700'>" . htmlspecialchars($row["username"]) . "</td>";
                                    echo "<td class='py-2 px-4 border-b border-gray-300 text-sm text-gray-700'>" . htmlspecialchars($row["password"]) . "</td>";
                                    echo "<td class='py-2 px-4 border-b border-gray-300 text-sm text-gray-700'>" . htmlspecialchars($row["project"]) . "</td>";
                                    echo "<td class='py-2 px-4 border-b border-gray-300 text-sm text-gray-700'>" . htmlspecialchars($row["database"]) . "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>



    </div>

    <script src="../js/script.js"></script>

</body>

</html>