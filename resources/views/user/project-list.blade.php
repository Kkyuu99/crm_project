<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blue': '#17147B',
                        'soft-purple': '#9B4D96'  /* Custom purple color */
                    }
                }
            }
        }
    </script>
    <title>Project List</title>
</head>
<body >

    <h1 class="text-4xl font-bold text-black mb-8 text-center">Projects</h1>

    <!-- Table Horizontal and Vertical Scroll -->
    <div class="overflow-x-auto overflow-y-auto max-w-full px-4 mb-8 border border-gray-300 rounded-md scrollbar-thin scrollbar-thumb-soft-purple scrollbar-track-gray-200">
        <table class="table-auto border-collapse border border-gray-300 min-w-[1500px] text-left">
            <thead>
                <tr class="bg-white text-blue">
                    <th class="border border-gray-300 px-19 py-6 text-xl">Project-id</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Project Type</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Project Name</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Organization Name</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Contact Name</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Contact Email</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Contact Phone</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Created Date</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Status</th>
                    <th class="border border-gray-300 px-19 py-6 text-xl">Action</th>
                </tr>
            </thead>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-6 text-xl">P001</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Type A</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Project A</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Organization A</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">John</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">john@gmail.com</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">09-799456324</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">15-01-2022</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl text-green-500">Inactive</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-8 py-6 text-xl">P002</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Type B</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Project B</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Organization B</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">Alice</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">alice@gmail.com</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">09-788456321</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl">01-02-2023</td>
                    <td class="border border-gray-300 px-8 py-6 text-xl text-green-500">Active</td>

                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex items-center justify-end bg-gray-100 p-2 rounded-md w-fit ml-auto">
        <!-- Left Arrow -->
        <button
          class="arr left bg-gray-100 inline-flex items-center px-6 rounded-md cursor-pointer hover:bg-gray-200 transition text-sm"
          aria-label="Previous"
          title="Previous">
          <span>&lt;</span>
        </button>

        <!-- Center Label -->
        <div
          class="bg-soft-purple text-white px-6 py-1 rounded-md font-medium text-sm mx-2">
          1
        </div>

        <!-- Right Arrow -->
        <button
          class="arr right bg-gray-100 inline-flex items-center px-6 rounded-md cursor-pointer hover:bg-gray-200 transition text-sm"
          aria-label="Next"
          title="Next">
          <span>&gt;</span>
        </button>
      </div>


    </div>

</body>
</html>
