<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./output.css" rel="stylesheet">
</head>
<body>

  <style>
    .pie-chart {
        width: 200px;
        height: 200px;
        background: conic-gradient(
            #D6F7FF 0% 50%,
            #FFF5A6 50% 65%,
            #F9BABA 65% 95%,
            #9B9AE4 95% 100%
        );
        border-radius: 50%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .donut-hole {
        width: 100px;
        height: 100px;
        background: #745CC9;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .legend {
        display: flex;
        justify-content: space-evenly;
        width: 80%;
        margin-top: 20px;
    }

    .legend div {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .legend span {
        font-size: 14px;
    }

    status {

    }
  </style>

    <header class="w-full p-6">
        <section class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
          <!-- Total Projects -->
          <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
            <h3 class="text-lg font-semibold text-white">Total Projects</h3>
            <p class="text-2xl font-bold text-white">4</p>
          </div>
          <!-- Total Tickets -->
          <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
            <h3 class="text-lg font-semibold text-white">Total Tickets</h3>
            <p class="text-2xl font-bold text-white">20</p>
          </div>
          <!-- Total Users -->
          <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
            <h3 class="text-lg font-semibold text-white">Total Users</h3>
            <p class="text-2xl font-bold text-white">17</p>
          </div>
          <!-- Closed Tickets -->
          <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
            <h3 class="text-lg font-semibold text-white">Closed Tickets</h3>
            <p class="text-2xl font-bold text-white">10</p>
          </div>
        </section>
      </header>

    <!-- Main Content Section -->
  <main class="flex-1 p-6">
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

      
      <!-- Pie Chart and Legend -->
      <div>
      <div class="bg-violet-500 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <h2 class="text-white text-xl mb-4">Tickets by Priority</h2>
        <div class="pie-chart">
          <div class="donut-hole"></div>
        </div>

        <div class="legend text-white">
          <div class="flex flex-col">
            <div class="flex items-center space-x-1">
              <div class="w-3 h-3 bg-purple-300 rounded-full"></div>
              <span>Urgent - 5%</span>
            </div>
            <div class="flex items-center space-x-1">
              <div class="w-3 h-3 bg-blue-300 rounded-full"></div>
              <span>Medium - 50%</span>
            </div>
          </div>

          <div class="flex flex-col">
            <div class="flex items-center space-x-1">
              <div class="w-3 h-3 bg-yellow-300 rounded-full"></div>
              <span>High - 15%</span>
            </div>
            <div class="flex items-center space-x-1">
              <div class="w-3 h-3 bg-pink-300 rounded-full"></div>
              <span>Low - 30%</span>
            </div>
          </div>
        </div>
      </div>
      </div>

    <!-- Tickets by Status-->
     <div>
      <div class="w-full bg-violet-500 shadow rounded-lg p-6 flex flex-col items-center justify-center">  
      <h1 class="font-semibold w-full justify-center text-white text-lg">Ticket by status</h1>
      <div name="status"></div>
      <div class="w-full max-w-lg mx-auto space-y-4">
          <!-- Skill 1 -->
      <div class="mb-5">
          <div>
            <span class="text-sm font-semibold text-white mb-5">Open</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black text-xs shadow-xl">
          <div class="bg-red-400 h-5 rounded-full w-[60%] font-semibold text-center">60</div>
      </div>

      <!-- Skill 2 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Pending</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-yellow-200 h-5 rounded-full w-[35%]">35</div>
      </div>

      <!-- Skill 3 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Unsloved</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-blue-400 h-5 rounded-full w-[10%]">10</div>
      </div>

      <!-- Skill 4 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Closed</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-teal-300 h-5 rounded-full w-[55%]">55</div>
      </div>
      </div>
      </div>
      </div>

      <!-- Tickets Category-wise-->
      <div>
      <div class="w-full bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">  
      <h3 class="font-semibold w-full justify-center text-white text-lg">Ticket by status</h3><br>
      <div class="w-full max-w-lg mx-auto space-y-4">
          <!-- Skill 1 -->
      <div class="mb-5">
          <div>
            <span class="text-sm font-semibold text-white mb-5">Open</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black text-xs shadow-xl">
          <div class="bg-red-400 h-5 rounded-full w-[60%] font-semibold text-center">60</div>
      </div>

      <!-- Skill 2 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Pending</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-yellow-200 h-5 rounded-full w-[35%]">35</div>
      </div>

      <!-- Skill 3 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Unsloved</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-blue-400 h-5 rounded-full w-[10%]">10</div>
      </div>

      <!-- Skill 4 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Closed</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-teal-300 h-5 rounded-full w-[55%]">55</div>
      </div>
      </div>
      </div>

    <!-- Tickets by Status-->
    <div class="bg-violet-500 shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">  
      <h1 class="font-semibold w-full justify-center text-white text-lg">Ticket by status</h1><br>
      <div class="w-full max-w-lg mx-auto space-y-4">
          <!-- Skill 1 -->
      <div class="mb-5">
          <div>
            <span class="text-sm font-semibold text-white mb-5">Open</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black text-xs shadow-xl">
          <div class="bg-red-400 h-5 rounded-full w-[60%] font-semibold text-center">60</div>
      </div>

      <!-- Skill 2 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Pending</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-yellow-200 h-5 rounded-full w-[35%]">35</div>
      </div>

      <!-- Skill 3 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Unsloved</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-blue-400 h-5 rounded-full w-[10%]">10</div>
      </div>

      <!-- Skill 4 -->
      <div>
          <div>
            <span class="text-sm font-semibold text-white">Closed</span>
      </div>
      <div class="w-[15rem] rounded-full bg-white h-5 text-black font-semibold text-xs text-center">
          <div class="bg-teal-300 h-5 rounded-full w-[55%]">55</div>
      </div>
      </div>
      </div>
      </div>

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
    
</body>
</html>