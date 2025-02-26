<x-layout>
  <script>
      window.onload = function() {
          const ctx = document.getElementById('myPieChart').getContext('2d');
          new Chart(ctx, {
              type: 'doughnut',
              data: {
                  labels: ['Urgent', 'Medium', 'High', 'Low'],
                  datasets: [{
                      label: 'Ticket Priority Distribution',
                      data: [
                        <?php echo json_encode($urgentPercentage); ?>,
                        <?php echo json_encode($mediumPercentage); ?>,
                        <?php echo json_encode($highPercentage); ?>,
                        <?php echo json_encode($lowPercentage); ?>
                      ],
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
                              title: function() {
                                  return 'Priority';
                              }
                          }
                      }
                  },
                  cutout: '50%'
              }
          });

        const ctxBar = document.getElementById('myBarChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Tickets Created',
                    data: <?php echo json_encode($issuesCount); ?>,
                    backgroundColor: '#D6F7FF',
                    borderWidth: 1
                }]
            },
            
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    };
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
      <div class="bg-violet-500 shadow rounded-lg p-2 flex flex-col items-center">
        <h2 class="text-white text-xl mb-8 text-left">Tickets by Priority</h2>
        <div class="pie-chart">
            <canvas id="myPieChart" width="300" height="300"></canvas>
          <div class="donut-hole"></div>
        </div>
      </div>

          <!-- Bar Chart -->
          <div class="bg-violet-500 shadow rounded-lg p-2 flex flex-col items-center col-span-2">
            <h1 class="text-white text-xl mb-8 text-left">Ticket Overview</h1>
            <canvas id="myBarChart" width="400" height="200"></canvas>
        </div>
      </form>
    </section>
          <!-- Table Section (Footer) -->
      <section class="bg-violet-500 text-white shadow rounded-lg p-6 mt-6 text-center">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr>
              <th class="border-b p-4">ID</th>
              <th class="border-b p-4">Subject</th>
              <th class="border-b p-4">Assignor</th>
              <th class="border-b p-4">Priority</th>
              <th class="border-b p-4">Status</th>
              <th class="border-b p-4">Due Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($issues as $issue)
              <tr class=>
                <td class="border-b p-4">{{ $issue->id }}</td>
                <td class="border-b p-4">{{ $issue->subject }}</td>
                <td class="border-b p-4">{{ $issue->assignor_user }}</td>
                <td class="border-b p-4">{{ $issue->priority }}</td>
                <td class="border-b p-4">{{ $issue->issue_status }}</td>
                <td class="border-b p-4">{{ $issue->due_date }}</td>
              </tr>
            @endforeach
          </tbody>
      </div>

      </table>
    </section>
  </main>
</x-layout>