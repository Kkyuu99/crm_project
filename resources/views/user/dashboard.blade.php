<x-layout>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
          const ctx = document.getElementById('myPieChart').getContext('2d');
          const myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ['Urgent', 'Medium', 'High', 'Low'],
              datasets: [{
                label: 'Ticket Priority Distribution',
                data: [5, 50, 15, 30],
                backgroundColor: [
                  '#D6F7FF',
                  '#FFF5A6',
                  '#F9BABA',
                  '#9B9AE4'
                ],
                hoverOffset: 10
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'bottom',
                  labels: {
                    color: '#FFFFFF',
                  }
                },
                tooltip: {
                  enabled: true,
                  callbacks: {
                    label: function(tooltipItem) {
                      return `${tooltipItem.label}: ${tooltipItem.raw}%`;
                    },
                    title: function(tooltipItem) {
                      return 'Priority';
                    }
                  }
                }
              },
              cutout: '50%' // Donut chart effect
            }
          });
        });
      </script>
  <header class="w-full p-6">
    <section class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
      <!-- Total Tickets -->
      <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
        <h3 class="text-lg font-semibold text-white">Total Tickets</h3>
        <p class="text-2xl font-bold text-white">{{ $totalIssues }}</p>
      </div>
      <!-- Due Today Tickets -->
      <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
        <h3 class="text-lg font-semibold text-white">Due Today Tickets</h3>
        <p class="text-2xl font-bold text-white">{{ $dueTodayIssues }}</p>
      </div>
      <!-- Overdue Tickets -->
      <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
        <h3 class="text-lg font-semibold text-white">Overdue Tickets</h3>
        <p class="text-2xl font-bold text-white">{{ $overdueIssues }}</p>
      </div>
      <!-- Closed Tickets -->
      <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
        <h3 class="text-lg font-semibold text-white">Closed Tickets</h3>
        <p class="text-2xl font-bold text-white">{{ $closedIssues }}</p>
      </div>
    </section>
  </header>

   <!-- Main Content Section -->
   <main class="flex-1 p-6">
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

      <!-- Pie Chart and Legend -->
      <div class="bg-violet-500 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <h2 class="text-white text-xl mb-4">Tickets by Priority</h2>

        <div class="pie-chart">
            <canvas id="myPieChart" class="w-50 h-50 "></canvas>

          <div class="donut-hole"></div>
        </div>


      </div>

      <form class="w-full bg-violet-500 text-white shadow rounded-lg p-5 mt-8 col-span-2">
        <h1 class="font-extrabold w-full justify-center text-white text-xs">Ticket Overview</h1><br>
        <div class="flex">
          <!-- Y-Axis Labels -->
          <div class="flex flex-col justify-between h-64 pr-4 text-white text-sm ">
            <span>100</span>
            <span>80</span>
            <span>60</span>
            <span>40</span>
            <span>20</span>
            <span>0</span>
          </div>
          <div class="flex place-items-end space-x-6 border-b-2 h-64 px-4 py-2">

            <!-- Bar 1 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-48 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Jan</span>
            </div>
            <!-- Bar 2 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-32 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Feb</span>
            </div>
            <!-- Bar 3 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-40 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Mar</span>
            </div>
            <!-- Bar 4 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-52 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Apr</span>
            </div>
            <!-- Bar 5 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-24 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">May</span>
            </div>
            <!-- Bar 6 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-32 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Jun</span>
            </div>
            <!-- Bar 7 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-16 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Jul</span>
            </div>
            <!-- Bar 8 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-52 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Aug</span>
            </div>
            <!-- Bar 9 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-32 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Sep</span>
            </div>
            <!-- Bar 10 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-24 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Oct</span>
            </div>
            <!-- Bar 11 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-16 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Nov</span>
            </div>
            <!-- Bar 12 -->
            <div class="flex flex-col items-center">
              <div class="bg-teal-200 w-3 h-40 rounded-t-md"></div>
              <span class="mt-2 text-sm text-yellow-500">Dec</span>
            </div>
          </div>
        </div>
      </form>
    </section>


    <!-- Table Section (Footer) -->
    <section class="bg-violet-500 text-white shadow rounded-lg p-6 mt-6">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr>
              <th class="border-b p-4">ID</th>
              <th class="border-b p-4">Req By</th>
              <th class="border-b p-4">Subject</th>
              <th class="border-b p-4">Assignor</th>
              <th class="border-b p-4">Priority</th>
              <th class="border-b p-4">Status</th>
              <th class="border-b p-4">Created Date</th>
              <th class="border-b p-4">Due Date</th>
              <th class="border-b p-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="border-b p-4">#4363</td>
              <td class="border-b p-4">John</td>
              <td class="border-b p-4">.......</td>
              <td class="border-b p-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg></td>
              <td class="border-b p-4">Medium</td>
              <td class="border-b p-4">Open</td>
              <td class="border-b p-4">01/01/2025</td>
              <td class="border-b p-4">03/01/2025</td>
              <td class="border-b p-4">......</td>
            </tr>
            <tr>
              <td class="border-b p-4">#2641</td>
              <td class="border-b p-4">Jess</td>
              <td class="border-b p-4">.......</td>
              <td class="border-b p-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg></td>
              <td class="border-b p-4">Low</td>
              <td class="border-b p-4">Closed</td>
              <td class="border-b p-4">02/01/2025</td>
              <td class="border-b p-4">11/01/2025</td>
              <td class="border-b p-4">......</td>
            </tr>
            <tr>
              <td class="border-b p-4">#5442</td>
              <td class="border-b p-4">Elen</td>
              <td class="border-b p-4">.......</td>
              <td class="border-b p-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg></td>
              <td class="border-b p-4">Low</td>
              <td class="border-b p-4">Closed</td>
              <td class="border-b p-4">11/01/2025</td>
              <td class="border-b p-4">15/01/2025</td>
              <td class="border-b p-4">......</td>
            </tr>
            <tr>
              <td class="border-b p-4">#4298</td>
              <td class="border-b p-4">Karen</td>
              <td class="border-b p-4">.......</td>
              <td class="border-b p-4"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg></td>
              <td class="border-b p-4">High</td>
              <td class="border-b p-4">Open</td>
              <td class="border-b p-4">11/01/2025</td>
              <td class="border-b p-4">19/01/2025</td>
              <td class="border-b p-4">......</td>
            </tr>
          </tbody>
      </div>

      </table>
    </section>
  </main>
</x-layout>
