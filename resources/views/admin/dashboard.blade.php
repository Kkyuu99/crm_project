@php
    $user = Auth::user();
    $prefix = $user->role === 'admin' ? 'admin' : 'user';
@endphp

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
                labels: <?php echo json_encode(array_keys($statusCounts)); ?>,
                datasets: [{
                    data: <?php echo json_encode($statusCounts); ?>,
                    backgroundColor: [
                          '#D6F7FF',
                          '#FFF5A6',
                          '#F9BABA',
                          '#9B9AE4'
                    ],
                    borderWidth: 1,
                }]
            },
            
            options: {
                indexAxis: 'y',
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
        <h3>Total Projects  :</h3>
        <p>{{ $totalProjects }}</p>
      </div>
      
      <div class="dashboard-card">
        <h3>Total Tickets : </h3>
        <p>{{ $totalIssues }}</p>
      </div>
      
      <div class="dashboard-card">
        <h3>Total Users : </h3>
        <p>{{ $totalUsers }}</p>
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
      <div class="bg-violet-500 shadow rounded-3xl p-2 flex flex-col items-center">
        <h2 class="text-white text-xl mb-3 text-left font-bold py-2">Tickets by Priority</h2>
        <div class="pie-chart">
          <canvas id="myPieChart"></canvas>
          <div class="donut-hole"></div>
        </div>
      </div>

      <!-- Ticket status -->
      <div class="bg-violet-500 shadow rounded-3xl py-2 flex flex-col px-6 col-span-2">
          <h1 class="text-white text-xl mb-4 text-left font-bold py-2">Ticket by status</h1>
          <div class="bar-chart mr-4">
            <canvas id="myBarChart"></canvas>
          </div>
      </div>
    </section>

      <!-- Table Section (Footer) -->
      <section class="dashboard-gradient text-white shadow rounded-3xl p-6 mt-6 text-center">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
            <tr class="table-header">
              <th class="th-rounded-left">ID</th>
              <th class="th-common">Subject</th>
              <th class="th-common">Assignor</th>
              <th class="th-common">Priority</th>
              <th class="th-common">Status</th>
              <th class="th-rounded-right">Due Date</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($issues as $issue)
                <tr>
                  <td class="table-data">{{ $issue->id }}</td>
                  <td class="table-data">{{ $issue->subject }}</td>
                  <td class="table-data">{{ $issue->user->name }}</td>
                  <td class="table-data">{{ $issue->priority }}</td>
                  <td class="table-data">{{ $issue->issue_status }}</td>
                  <td class="table-data">{{ $issue->due_date }}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>

      <div class="mt-4">
          <a href="{{ route($prefix . '.issue-list') }}" class="text-violet-300 hover:text-violet-600 font-medium text-md">See More</a>
      </div>
    </section>
  </main>
</x-layout>