document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ JavaScript Loaded - Running updateEmployeeCounts()");
    updateEmployeeCounts(); // Call only once
  });
  
  function updateEmployeeCounts() {
      fetch('countImaging.php')
          .then(response => response.json())
          .then(data => {
              console.log("Fetched employee data:", data); // Log fetched data
              
              // Select the elements
              const totalElem = document.getElementById("totalEmployees");
              const activeElem = document.getElementById("activeEmployees");
  
              // Debugging: Check if elements exist
              if (!totalElem || !activeElem) {
                  console.error("⚠️ ERROR: Missing HTML elements for displaying employee counts!");
                  return;
              }
  
              // Update the page
              totalElem.textContent = data.totalEmployees || "0";
              activeElem.textContent = data.activeEmployees || "0";
  
              console.log("✅ Successfully updated employee count on the page!");
          })
          .catch(error => console.error("❌ Fetch error:", error));
  }
  