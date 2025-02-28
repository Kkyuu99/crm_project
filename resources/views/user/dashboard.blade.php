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
                                  size: 14
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
                    display: true, 
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
      <!-- Total Tickets -->
      <div class="bg-violet-500 shadow-lg rounded-3xl py-4 flex justify-center items-center">
        <h3 class="text-lg font-semibold text-white">Total Tickets : </h3>
        <p class="text-3xl font-bold text-white px-2">{{ $totalIssues }}</p>
      </div>
      <!-- Due Today Tickets -->
      <div class="bg-violet-500 shadow-lg rounded-3xl py-4 flex justify-center items-center">
        <h3 class="text-lg font-semibold text-white">Due Today Tickets : </h3>
        <p class="text-3xl font-bold text-white px-2">{{ $dueTodayIssues }}</p>
      </div>
      <!-- Overdue Tickets -->
      <div class="bg-violet-500 shadow-lg rounded-3xl py-4 flex justify-center items-center">
        <h3 class="text-lg font-semibold text-white">Overdue Tickets : </h3>
        <p class="text-3xl font-bold text-white px-2">{{ $overdueIssues }}</p>
      </div>
      <!-- Closed Tickets -->
      <div class="bg-violet-500 shadow-lg rounded-3xl py-4 flex justify-center items-center">
        <h3 class="text-lg font-semibold text-white">Closed Tickets : </h3>
        <p class="text-3xl font-bold text-white px-2">{{ $closedIssues }}</p>
      </div>
    </section>
  </header>

   <!-- Main Content Section -->
   <main class="flex-1 px-6">
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

      <!-- Pie Chart and Legend -->
      <div class="bg-violet-500 shadow rounded-3xl p-2 flex flex-col items-center">
        <h2 class="text-white text-xl mb-8 font-bold text-left">Tickets by Priority</h2>
        <div class="pie-chart">
          <canvas id="myPieChart" width="270" height="270"></canvas>
          <div class="donut-hole"></div>
        </div>
      </div>
      <div class="bg-violet-500 shadow rounded-3xl py-2 flex flex-col px-6 col-span-2">
        <div class="flex items-center mb-4">
          <h3 class="text-lg font-semibold text-white">Total Projects : </h3>
          <p class="text-3xl font-bold text-white px-2">{{ $projectCount }}</p>
        </div>
        
        <table class="w-full text-left border-collapse text-white">
          <thead>
            <tr>
              <th class="border-b p-4">No.</th>
              <th class="border-b p-4">ID</th>
              <th class="border-b p-4">Project name</th>
              <th class="border-b p-4">Project type</th>
              <th class="border-b p-4">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
              <tr class=>
                <td class="border-b p-4">{{ $loop->iteration }}</td>
                <td class="border-b p-4">{{ $project->id }}</td>
                <td class="border-b p-4">{{ $project->project_name }}</td>
                <td class="border-b p-4">{{ $project->project_type }}</td>
                <td class="border-b p-4">{{ $project->status }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
  </div>
      
    </section>
<!-- Table Section (Footer) -->
<section class="bg-violet-500 text-white shadow rounded-3xl p-6 mt-6 text-center">
            <!-- Bar Chart -->
            <h1 class="text-white text-xl font-bold text-left">Ticket Overview</h1>
            <canvas id="myBarChart" width="400" height="200"></canvas>
    </section>
  </main>
</x-layout>