<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./output.css" rel="stylesheet">
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <form class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-md" action="/update-profile" method="POST">
        <h1 class="text-xl font-bold text-left mb-4">New Project</h1>
        <hr class="mb-6">
    
        <div class="overflow-auto scrollbar scrollbar-blue-500 scrollbar-track-[#AB96FA]">
            <table class="w-full border-collapse border border-gray-950 p-60 mb-3">
                <thead class="bg-[#EEEEEE]">
                    <tr class="font-normal text-xs text-[#17147B] ">
                        <th class="border border-gray-300 px-2 py-1">Project-id</th>
                        <th class="border border-gray-300 px-2 py-1">Project Type</th>
                        <th class="border border-gray-300 px-2 py-1">Project Name</th>
                        <th class="border border-gray-300 px-2 py-1">Organization Name</th>
                        <th class="border border-gray-300 px-2 py-1">Contact Name</th>
                        <th class="border border-gray-300 px-2 py-1">Contact Email</th>
                        <th class="border border-gray-300 px-2 py-1">Contact Phone</th>
                        <th class="border border-gray-300 px-2 py-1">Created Date</th>
                        <th class="border border-gray-300 px-2 py-1">Status</th>
                        <th class="border border-gray-300 px-2 py-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Row 1-->
                    <tr class="text-xs w-auto">
                        <td class="border border-gray-300 px-2 py-1">P001</td>
                        <td class="border border-gray-300 px-2 py-1">Type A</td>
                        <td class="border border-gray-300 px-2 py-1">Project A</td>
                        <td class="border border-gray-300 px-2 py-1">Organization A</td>
                        <td class="border border-gray-300 px-2 py-1">John</td>
                        <td class="border border-gray-300 px-2 py-1">john@gmail.com</td>
                        <td class="border border-gray-300 px-2 py-1">09 - 799456324</td>
                        <td class="border border-gray-300 px-2 py-1">15-01-2022</td>
                        <td class="border border-gray-300 px-2 py-1 text-[#FD0E0E]">Inactive</td>
                        <td class="border border-gray-300 px-2 py-1"></td>
                    </tr>

                    <!--Row 2-->
                    <tr class="text-xs">
                        <td class="border border-gray-300 px-2 py-1">P002</td>
                        <td class="border border-gray-300 px-2 py-1">Type B</td>
                        <td class="border border-gray-300 px-2 py-1">Project B</td>
                        <td class="border border-gray-300 px-2 py-1">Organization B</td>
                        <td class="border border-gray-300 px-2 py-1">Jess</td>
                        <td class="border border-gray-300 px-2 py-1">jess@gmail.com</td>
                        <td class="border border-gray-300 px-2 py-1">09 - 786123780</td>
                        <td class="border border-gray-300 px-2 py-1">10-03-2023</td>
                        <td class="border border-gray-300 px-2 py-1 text-[#088808]">Active</td>
                        <td class="border border-gray-300 px-2 py-1"></td>
                    </tr>

                    <!--Row 3-->
                    <tr class="text-xs">
                        <td class="border border-gray-300 px-2 py-1">P003</td>
                        <td class="border border-gray-300 px-2 py-1">Type C</td>
                        <td class="border border-gray-300 px-2 py-1">Project C</td>
                        <td class="border border-gray-300 px-2 py-1">Organization C</td>
                        <td class="border border-gray-300 px-2 py-1">Elen</td>
                        <td class="border border-gray-300 px-2 py-1">elen12@gmail.com</td>
                        <td class="border border-gray-300 px-2 py-1">09 - 4219987542</td>
                        <td class="border border-gray-300 px-2 py-1">16-07-2024</td>
                        <td class="border border-gray-300 px-2 py-1 text-[#088808]">Active</td>
                        <td class="border border-gray-300 px-2 py-1"></td>
                    </tr>

                    <!--Row 4-->
                    <tr class="text-xs">
                        <td class="border border-gray-300 px-2 py-1">P004</td>
                        <td class="border border-gray-300 px-2 py-1">Type D</td>
                        <td class="border border-gray-300 px-2 py-1">Project D</td>
                        <td class="border border-gray-300 px-2 py-1">Organization D</td>
                        <td class="border border-gray-300 px-2 py-1">Karen</td>
                        <td class="border border-gray-300 px-2 py-1">karen@gmail.com</td>
                        <td class="border border-gray-300 px-2 py-1">09 - 970653187</td>
                        <td class="border border-gray-300 px-2 py-1">15-01-2025</td>
                        <td class="border border-gray-300 px-2 py-1 text-[#FD0E0E]">Inactive</td>
                        <td class="border border-gray-300 px-2 py-1"></td>
                    </tr>
                </tbody>
            </table>
        </div>

            <div class="flex justify-start space-x-4">
            <button type="submit" class=" px-3 py-0 bg-[#AB96FA] text-white text-sm font-semibold rounded-lg shadow-md hover:bg-violet-400">
                Add new
            </button>
            </div>
    </form>

</body>
</html>