<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Statistics</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Markazi+Text:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
          body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
          }
          .page-header {
            display: flex;
            justify-content: space-between; /* Keep space between left and center */
            align-items: center;
            padding: 10px 10px;
            background: #fff;
            border-bottom: 1px solid #ddd;
            padding-top: 15px;
            padding-bottom: 25px;
          }
          .header-left {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 5px;
            margin-left: 10px;
          }
          .header-center {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: 50%;
            transform: translateX(-50%); /* Center the logo */
            margin-top: 5px;
          }
          .header-left .back-btn {
            background: none;
            border: none;
            font-size: 18px;
            font-weight: bold;
            font-family: "Inter";
            color: #6d2323;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
          }
          .header-left .back-btn i {
            font-size: 18px;
          }
          .header-center .page-logo {
            height: 35px;
          }
          .dashboard-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
          }
          .main-container {
            max-width: 1500px; /* Adjust width as needed */
            margin: 0 auto; /* Centers the content */
            padding: 0 20px; /* Adds inner space on both sides */
          }
          .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            min-height: 120px;  
          }
          .card-number {
            font-size: 35px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 30px;
          }
          .card-label {
            display: flex;
            flex-direction: column;
            position: absolute;
            bottom: 15px;
            left: 30px;
            color: #6d2323;
          }
          .card-label i {
            font-size: 35px;
            font-weight: bold;
            color: #6d2323;

          }
          .charts-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
          }
          .chart-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-weight: bold;
          }
          .card span {
            font-weight: bold;
          }
          .chart-layout {
          display: flex;
          justify-content: space-between;
          align-items: center; /* Centers the chart and legend vertically */
          gap: 20px;
          padding: 20px;
          }
          .chart-wrapper {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          gap: 20px;
          flex: 1;
          }
          #genderChart, #departmentChart, #typeChart {
          width: 30px;
          height: 30px;
          padding: 50px;
          }
          .custom-legend {
          display: flex;
          flex-direction: column;
          align-items: flex-start;
          font-weight: bold;
          }
          .legend-item {
          display: flex;
          align-items: center;
          gap: 10px;
          }
          .legend-circle {
          width: 12px;
          height: 12px;
          border-radius: 50%;
          }
          .strikethrough {
          text-decoration: line-through;
          opacity: 0.6;
          } 
        </style>
      </head>
      <body>
        <header class="page-header">
          <div class="header-left">
            <button class="back-btn">
              <i class="bi bi-arrow-left-circle"></i> BACK
            </button>
          </div>
          <div class="header-center">
            <img src="logo.png" alt="Logo" class="page-logo" />
          </div>
        </header>
        <main class="main-container">
          <section class="dashboard-container">
            <div class="card">
              <div class="card-number" id="totalEmployees" name="totalEmployees">0</div>
              <div class="card-label">
                <i class="bi bi-people-fill"></i>
                <span>TOTAL EMPLOYEES</span>
              </div>
            </div>
            <div class="card">
              <div class="card-number" id="departmentTotal">0</div>
              <div class="card-label">
                <i class="bi bi-building"></i>
                <span>TOTAL DEPARTMENTS</span>
              </div>
            </div>
            <div class="card">
              <div class="card-number" id="totalActiveEmployees" name="totalActiveEmployees"  ></div>
              <div class="card-label">
                <i class="bi bi-person-check"></i>
                <span>ACTIVE EMPLOYEES</span>
              </div>
            </div>
          </section>
          <section class="charts-container">
            <div class="chart-card">GENDER
            <div class="gender-chart-container">
              </div>
              <div class="chart-wrapper">
                <canvas id="genderChart"></canvas>
                <div id="genderLegend" class="custom-legend"></div>
              </div>
            </div>
            <div class="chart-card">EMPLOYEES BY DEPARTMENT
              <div class="department-chart-container">
              </div>
              <div class="chart-wrapper">
                <canvas id="departmentChart"></canvas>
                <div id="departmentLegend" class="custom-legend"></div>
              </div>
            </div>
            <div class="chart-card">EMPLOYMENT TYPE
              <div class="type-chart-container">
              </div>
              <div class="chart-wrapper">
                <canvas id="typeChart"></canvas>
                <div id="typeLegend" class="custom-legend"></div>
              </div>
            </div>
          </section>
        </main>
        <script>

  if (document.querySelector(".back-btn")) {
    document.querySelector(".back-btn").addEventListener("click", function () {
      window.location.href = "dashboard.php";
    });
  }
      // Fetch employee count from the database
  fetch('employeesCount.php')
    .then(response => response.json())
    .then(data => {
      const totalEmployees = data.total || 0;
      document.getElementById('totalEmployees').textContent = totalEmployees;

    })
    .catch(error => console.error('Error fetching employee count:', error));
    fetch('departmentCount.php')
    .then(response => response.json())
    .then(data => {
      if (data.total_departments) {
        document.getElementById('departmentTotal').textContent = data.total_departments;
      } else {
        console.error("Error fetching department count:", data.error);
      }
    })
    .catch(error => console.error("Fetch error:", error));

    fetch('activeEmployees.php')
    .then(response => response.json())
    .then(data => {
      console.log('Total Active Employees:', data.total_active);
      document.getElementById('totalActiveEmployees').textContent = data.total_active;
    })
    .catch(error => console.error('Error fetching active employees count:', error));
    fetch('genderCount.php')
  .then(response => response.json())
  .then(data => {
    console.log('Gender Counts:', data);

    // Convert data keys to labels and values to dataset
    const genderLabels = Object.keys(data).map(sex =>
      sex.charAt(0).toUpperCase() + sex.slice(1)
    );

    const genderData = Object.values(data);
    const genderCtx = document.getElementById('genderChart')?.getContext('2d');

    if (genderCtx) {
      const genderColors = ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0'];
      const genderChart = new Chart(genderCtx, {
        type: 'doughnut',
        data: {
          labels: genderLabels,
          datasets: [{
            label: 'Total',
            data: genderData,
            backgroundColor: genderColors,
            hoverOffset: 13
          }]
        },
        options: {
          animation: false,
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });
      // Create legend dynamically
      const genderLegendContainer = document.getElementById('genderLegend');
      genderLegendContainer.innerHTML = '';

      genderLabels.forEach((sex, index) => {
        const legendItem = document.createElement('div');
        legendItem.className = 'legend-item';
        legendItem.innerHTML = `
          <div class="legend-circle" style="background-color: ${genderColors[index % genderColors.length]}"></div>
          <span class="legend-text">${sex}</span>
        `;
        legendItem.addEventListener('click', () => {
          const meta = genderChart.getDatasetMeta(0);
          const item = meta.data[index];
          item.hidden = !item.hidden;
          genderChart.update();
          legendItem.classList.toggle('strikethrough', item.hidden);
        });

        genderLegendContainer.appendChild(legendItem);
      });
    }
  })
  .catch(error => console.error('Error fetching gender count:', error));

  // Define all departments
  const allDepartments = [
    "Admin", "Ancillary Services", "Clinic Management", "Customer Services",
    "Finance", "Human Resources", "Imaging", "Laboratory",
    "Medical Exam and Evaluation", "Nursing", "Psychometry",
    "Records", "Registration", "Sales"
  ];

  const departmentCount = allDepartments.reduce((count, dept) => {
    count[dept] = 0;
    return count;
  }, {});

  fetch('countPerDepartment.php')
  .then(response => response.json())
  .then(departmentCount => {
    // Convert table names to readable department names
    const departmentLabels = [
      "Admin", "Ancillary Services", "Clinic Management", "Customer Services",
      "Finance", "Human Resources", "Imaging", "Laboratory",
      "Medical Exam and Evaluation", "Nursing", "Psychometry",
      "Records", "Registration", "Sales"
    ];

    // Map the table data to the correct order
    const tableNames = [
      "admin_emp", "ancillary_emp", "clinic_emp", "customer_emp",
      "finance_emp", "hr_emp", "imaging_emp", "laboratory_emp",
      "medical_emp", "nursing_emp", "psychometry_emp",
      "records_emp", "registration_emp", "sales_emp"
    ];

    const departmentData = tableNames.map(table => departmentCount[table] || 0);

    const departmentCtx = document.getElementById('departmentChart')?.getContext('2d');

    if (departmentCtx) {
      const departmentColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#8A2BE2', '#FF6347', '#4682B4', '#32CD32', '#FFD700', '#DA70D6', '#20B2AA', '#8B0000'];
      const departmentChart = new Chart(departmentCtx, {
        type: 'doughnut',
        data: {
          labels: departmentLabels,
          datasets: [{
            label: 'Total',
            data: departmentData,
            backgroundColor: departmentColors,
            hoverOffset: 13
          }]
        },
        options: {
          animation: false,
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });
      const departmentLegendContainer = document.getElementById('departmentLegend');
      departmentLegendContainer.innerHTML = '';
      departmentLabels.forEach((dept, index) => {
        const legendItem = document.createElement('div');
        legendItem.className = 'legend-item';
        legendItem.innerHTML = `
          <div class="legend-circle" style="background-color: ${departmentColors[index % departmentColors.length]}"></div>
          <span class="legend-text">${dept}</span>
        `;
        legendItem.addEventListener('click', () => {
          const meta = departmentChart.getDatasetMeta(0);
          const item = meta.data[index];
          item.hidden = !item.hidden;
          departmentChart.update();
          legendItem.classList.toggle('strikethrough', item.hidden);
        });
        departmentLegendContainer.appendChild(legendItem);
      });
    }
  })
  .catch(error => console.error("Fetch error:", error));
  fetch('countType.php') // Adjust the path if needed
  .then(response => response.json())
  .then(typeCount => {
    const typeLabels = Object.keys(typeCount).map(type => {
      if (type === "probationary") return "Probationary";
      if (type === "regular") return "Regular";
      if (type === "fixed") return "Fixed";
      if (type === "oncall") return "OnCall";  // Updated mapping
      if (type === "consultant") return "Consultant";
      if (type === "ojt") return "OJT";
      return type.charAt(0).toUpperCase() + type.slice(1);
    });
    const typeData = Object.values(typeCount);
    const typeCtx = document.getElementById('typeChart')?.getContext('2d');

    if (typeCtx) {
      // Updated colors array to cover 6 types
      const typeColors = ['#4BC0C0', '#FF9F40', '#9966FF', '#36A2EB', '#FF6384', '#FFCE56'];

      const typeChart = new Chart(typeCtx, {
        type: 'doughnut',
        data: {
          labels: typeLabels,
          datasets: [{
            label: 'Total',
            data: typeData,
            backgroundColor: typeColors,
            hoverOffset: 13
          }]
        },
        options: {
          animation: false,
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });
      const typeLegendContainer = document.getElementById('typeLegend');
      typeLegendContainer.innerHTML = '';

      typeLabels.forEach((type, index) => {
        const legendItem = document.createElement('div');
        legendItem.className = 'legend-item';
        legendItem.innerHTML = `
          <div class="legend-circle" style="background-color: ${typeColors[index % typeColors.length]}"></div>
          <span class="legend-text">${type}</span>
        `;
        legendItem.addEventListener('click', () => {
          const meta = typeChart.getDatasetMeta(0);
          const item = meta.data[index];
          item.hidden = !item.hidden;
          typeChart.update();
          legendItem.classList.toggle('strikethrough', item.hidden);
        });
        typeLegendContainer.appendChild(legendItem);
      });
    }
  })
  .catch(error => console.error("Fetch error:", error));
          </script>
        </body>
      </html>