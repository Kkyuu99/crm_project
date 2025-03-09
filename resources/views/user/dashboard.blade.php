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
                      
                  }]
              },
              options: {
                  responsive: true,
                  layout: {
                     padding: {
                         top: 20 // Adds space above the pie chart
                     }
                  },
                  plugins: {
                      legend: {
                          position: 'bottom',
                          labels: {
                              color: '#FFFFFF',
                              boxWidth: 12,
                              padding : 20,
                              usePointStyle: true,
                              font: {
                                  size: 14,
                              }
                        },
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
                  borderWidth: 0,
                  cutout: '50%',
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
                    borderWidth: 1,
                }]
            },

            options: {
            responsive: true,
            scales: {
              x: {
            ticks: {
                color: '#FFFFFF' // X-axis labels color
            }
        },
        y: {
            beginAtZero: true,
            ticks: {
                color: '#FFFFFF' // Y-axis labels color
            }
        }
    },
            plugins: {
                legend: {
                    display: false, 
                    labels: {
                        color: '#FFFFFF' // Labels color
                    }
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
    <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
      
      <div class="dashboard-card">
        <h3>Total Tickets : </h3>
        <p>{{ $totalIssues }}</p>
      </div>

      <div class="dashboard-card">
        <h3>Today’s Due : </h3>
        <p>{{ $dueTodayIssues }}</p>
      </div>

      <div class="dashboard-card">
        <h3>Overdue Tickets : </h3>
        <p>{{ $overdueIssues }}</p>
      </div>

      <div class="dashboard-card">
        <h3>Closed Tickets : </h3>
        <p>{{ $closedIssues }}</p>
      </div>
    </section>
  </header>

   <!-- Main Content Section -->
   <main class="flex-1 px-6">
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

      <!-- Pie Chart and Legend -->
      <div class="bg-violet-500 shadow rounded-3xl p-4 flex flex-col">
        <h3 class="text-lg font-semibold text-white px-4 text-left">Tickets by Priority</h3>
        <div class="pie-chart">
          <canvas id="myPieChart"></canvas>
          <div class="donut-hole"></div>
        </div>
      </div>

      <div class="dashboard-gradient shadow rounded-3xl p-4 flex flex-col px-6 col-span-2 items-center">
        <div class="flex justify-start items-center w-full mb-4">
          <h3 class="text-lg font-semibold text-white">Total Projects : </h3>
          <p class="text-3xl font-bold text-white px-2">{{ $projectCount }}</p>
        </div>
        
        <table class="w-full text-left border-collapse text-white">
          <thead>
            <tr class="bg-white text-violet-500">
              <th class="border-b rounded-tl-lg px-2">No.</th>
              <th class="border-b px-2">ID</th>
              <th class="border-b px-2">Project name</th>
              <th class="border-b px-2">Project type</th>
              <th class="border-b rounded-tr-lg px-2">Status</th>
            </tr>
          </thead>
          <tbody class="text-white">
            @foreach ($projects as $project)
              <tr>
                <td class="border-b p-2">{{ $loop->iteration }}</td>
                <td class="border-b p-2">{{ $project->id }}</td>
                <td class="border-b p-2">{{ $project->project_name }}</td>
                <td class="border-b p-2">{{ $project->project_type }}</td>
                <td class="border-b p-2">{{ $project->status }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="mt-4">
          <a href="{{ route($prefix . '.project-list') }}" class="text-violet-300 hover:text-violet-600 font-medium text-md">See More</a>
        </div>

      </div>

      
      
    </section>
    <!-- Table Section (Footer) -->
    <section class="bg-violet-500 text-white shadow rounded-3xl p-6 mt-6 text-center">
      <!-- Bar Chart -->
      <h1 class="text-lg font-semibold text-white px-4 text-left mb-4">Ticket Created</h1>
      <div class="bar-chart mr-4">
        <canvas id="myBarChart"></canvas>
      </div>
    </section>
  </main>
</x-layout>