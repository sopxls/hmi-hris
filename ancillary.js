if (document.querySelector(".back-btn")) {
  document.querySelector(".back-btn").addEventListener("click", function () {
    window.location.href = "dashboard.php";
  });
}
// contact number
document.getElementById("contactNo").addEventListener("input", function () {
  let contactInput = this.value;
  let errorMessage = document.getElementById("error-message");
  let pattern = /^09\d{9}$/; // Ensures it starts with 09 and has exactly 11 digits

  if (!pattern.test(contactInput)) {
      errorMessage.textContent = "Invalid format. Use 09XXXXXXXXX (11 digits)";
  } else {
      errorMessage.textContent = ""; // Clears error message when valid
  }
});
document.getElementById("emergencyContact").addEventListener("input", function () {
  let contactInput = this.value;
  let errorMessage = document.getElementById("error-message-em");
  let pattern = /^09\d{9}$/; // Ensures it starts with 09 and has exactly 11 digits

  if (!pattern.test(contactInput)) {
      errorMessage.textContent = "Invalid format. Use 09XXXXXXXXX (11 digits)";
  } else {
      errorMessage.textContent = ""; // Clears error message when valid
  }
});
function toggleFilter() {
  const filterBox = document.getElementById("filterBox");
  filterBox.classList.toggle("expanded");
}

function applyFilter() {
  let filterValue = capitalizeWords(document.getElementById("filterDropdown").value.trim());
  let table = document.getElementById("employeeTable");
  let rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

  let count = 1; // Counter for numbering when filtered
  for (let i = 0; i < rows.length; i++) {
      let statusCell = rows[i].getElementsByTagName("td")[6]; // Status column (Active, Inactive, Terminated)
      let typeCell = rows[i].getElementsByTagName("td")[4]; // Type column (Probationary, Regular, etc.)
      let numberCell = rows[i].getElementsByTagName("td")[0]; // Numbering column

      if (statusCell && typeCell && numberCell) {
          let status = capitalizeWords(statusCell.textContent.trim());
          let type = capitalizeWords(typeCell.textContent.trim());

          if (
              filterValue === "All" || // Show all employees
              status === filterValue || // Filter by Active, Inactive, or Terminated
              type === filterValue  // Matches exact employment type formatting
          ) {
              rows[i].style.display = "";
              numberCell.textContent = count++; // Re-number only visible rows
          } else {
              rows[i].style.display = "none";
          }
      }
  }
}

document
.getElementById("exportBtn")
.addEventListener("click", function (event) {
  event.stopPropagation();
  document.querySelector(".export-container").classList.toggle("show");
});

// Function to determine file name based on filter
function getFileName() {
let filterValue = document.getElementById("filterDropdown").value;
if (filterValue === "active") return "Active Employees";
if (filterValue === "inactive") return "Inactive Employees";
if (filterValue === "terminated") return "Terminated Employees";
return "Employee List"; // Default for "all"
}
document
.getElementById("exportExcel")
.addEventListener("click", function (event) {
  event.stopPropagation(); // Prevent event bubbling

  if (!ancillary_emp || ancillary_emp.length === 0) {
    alert("Error: No employee data available!");
    return;
  }

  // Map employee data for Excel export, including employment history
  let employeeData = ancillary_emp.map((emp) => {
      // Format employment history into a single string
    let employmentHistory = Array.isArray(emp.employmentHistory)
    ? emp.employmentHistory
        .map(
          (history) =>
            `Company: ${history.companyName}, Position: ${history.employmentPositions}, Length: ${history.lengthExp}`
        )
        .join(" | ")
    : "None";

    return {
      "Employee ID": emp.empID,
      "Full Name": `${emp.lastName}, ${emp.firstName} ${
        emp.middleName || ""
      }`,
      Sex: emp.sex,
      Birthdate: emp.birthdate,
      "Contact No.": emp.contactNo,
      Email: emp.email,
      Address: emp.address,
      "Marital Status": emp.maritalStatus,
      Religion: emp.religion,
      Nationality: emp.nationality,
      "PRC License No.": emp.prcNo,
      "PRC Expiry": emp.prcValidity,
      "Health Permit": emp.healthPermit,
      "Permit Validity": emp.permitValidity,
      Position: emp.position,
      Department: emp.department,
      Status: emp.status,
      "Reason for Termination": emp.reasonTermination,
      Type: emp.type,
      "Start Date": emp.startDate,
      "End Date": emp.endDate,
      Salary: emp.salary,
      "PEP Score": emp.pepScore,
      "Period Covered": emp.periodCovered,
      Infraction: emp.infraction,
      "Pag-IBIG No.": emp.pagibig,
      "SSS No.": emp.sss,
      "PhilHealth No.": emp.philhealth,
      TIN: emp.tin,
      "Emergency Contact Person": `${emp.emergencyPersonFirst} ${emp.emergencyPersonMiddle} ${emp.emergencyPersonLast}`,
      "Emergency Contact No.": emp.emergencyContact,
      "Emergency Address": emp.emergencyAddress,
    };
  });

  // Convert data to worksheet
  var ws = XLSX.utils.json_to_sheet(employeeData);
  // Create a workbook and add the sheet
  var wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, ws, "Employees");
  // Save the file
  XLSX.writeFile(wb, getFileName() + ".xlsx");
  document.querySelector(".export-container").classList.remove("show");
});

// PDF Export - Excludes "Action" column & respects filter
document.getElementById('exportPDF').addEventListener('click', function (event) {
  event.stopPropagation();

  var table = document.getElementById("employeeTable");
  if (!table) {
      alert("Error: Table not found!");
      return;
  }
  const { jsPDF } = window.jspdf;
  var doc = new jsPDF();
  doc.text(getFileName(), 14, 16); // Set dynamic title
  var data = [];
  var headers = [];
  var thElements = table.querySelectorAll("thead th:not(:last-child)");
  thElements.forEach(th => headers.push(th.innerText));

  var trElements = table.querySelectorAll("tbody tr");
  trElements.forEach(tr => {
      if (tr.style.display !== "none") { // Only include visible rows
          var rowData = [];
          var tdElements = tr.querySelectorAll("td:not(:last-child)");
          tdElements.forEach(td => rowData.push(td.innerText));
          data.push(rowData);
      }
  });
  doc.autoTable({
      head: [headers],
      body: data,
      startY: 22,
      theme: 'grid'
  });
  doc.save(getFileName() + ".pdf");
});

// PERIOD COVERED DROPDOWN
function populatePeriodCovered() {
  let periodDropdown = document.getElementById("periodCovered");
  let currentYear = new Date().getFullYear(); // Get the current year
  let startYear = 1980; // Earliest year you want to include
  // Clear existing options
  periodDropdown.innerHTML =
    "<option value='' disabled selected>-- select year --</option>";

  // Add single year options
  for (let year = currentYear; year >= startYear; year--) {
    let option = document.createElement("option");
    option.value = year; // Year value (e.g., "2025")
    option.textContent = year; // Display year (e.g., "2025")
    periodDropdown.appendChild(option);
  }
}

document.addEventListener("DOMContentLoaded", populatePeriodCovered);

// Call the function when the page loads
document.addEventListener("DOMContentLoaded", populatePeriodCovered);   

// Close dropdown when clicking outside
document.addEventListener('click', function (event) {
  var exportContainer = document.querySelector('.export-container');
  if (!exportContainer.contains(event.target)) {
      exportContainer.classList.remove('show');
  }
});
// Clear all fields in the form
function clearForm() {
  const form = document.getElementById("employeeForm");  // Make sure the form has an ID (e.g., employeeForm)
  form.reset();  // This will reset all fields in the form to their default values
  
  editIndex = null;  // Reset editIndex for new employee creation
}

// Open Modal and Reset Form
document.getElementById("openModalBtn").addEventListener("click", function () {
  clearForm(); // Reset the form before opening the modal
  document.getElementById("modalOverlay").classList.add("show");
  document.getElementById("employeeModal").classList.add("show");
});
document.getElementById("closeModalBtn").addEventListener("click", closeModal);
document.getElementById("cancelBtn").addEventListener("click", closeModal);
document.getElementById("modalOverlay").addEventListener("click", closeModal);

function closeModal() {
  document.getElementById("modalOverlay").classList.remove("show");
  document.getElementById("employeeModal").classList.remove("show");
}
// COPY ADDRESS TO EMERGENCY ADDRESS IF CHECKED
document.getElementById("sameAddress").addEventListener("change", function () {
  if (this.checked) {
    document.getElementById("emergencyAddress").value = document.getElementById("address").value;
  } else {
    document.getElementById("emergencyAddress").value = "";
  }
});

// LOAD EMPLOYEES ON PAGE LOAD
document.addEventListener("DOMContentLoaded", function () {
  loadEmployees();
  initializeSearchFunction(); // Ensures search initializes after table loads
});

document.addEventListener("DOMContentLoaded", function () {
  console.log("🟢 JavaScript is running...");
  console.log("Checking if the 'Add Experience' button exists:", document.getElementById("addEntry"));

  document.getElementById("employmentHistory").addEventListener("click", function (e) {
    if (e.target.closest(".removeEntry")) {
        console.log("Remove button clicked!"); // Debugging line

        const entry = e.target.closest(".entry, .employment-entry");
        if (entry) {
            console.log("Removing entry:", entry.textContent); // Debugging line
            entry.remove();
        }
    }
});
  // Employee Movement - Remove Entry
  document.getElementById("employeeMovement").addEventListener("click", function (e) {
    if (e.target.closest(".removeEntry")) {
        console.log("Remove button clicked!"); // Debugging line

        const entry = e.target.closest(".entry, .employment-entry");
        if (entry) {
            console.log("Removing entry:", entry.textContent); // Debugging line
            entry.remove();
        }
    }
});
  // Add Employment History Entry
  document.getElementById("addEntry").addEventListener("click", function () {
    const container = document.getElementById("employmentHistory");
    const newEntry = document.createElement("div");
    newEntry.classList.add("row", "entry");
    newEntry.style.alignItems = "center";
    newEntry.innerHTML = `
        <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="companyName[]" form="employeeForm" />
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="text" name="employmentPositions[]" form="employeeForm" />
        </div>
        <div class="form-group">
            <label>Length of Experience</label>
            <input type="text" name="lengthExp[]" form="employeeForm" />
        </div>
        <div style="display: flex; align-items: center; margin-top: 8px;">
            <button type="button" class="removeEntry" style="background: none; border: none; padding: 0;">
                <i class="bi bi-trash" style="font-size: 20px; color: red;"></i>
            </button>
        </div>
    `;
    container.appendChild(newEntry);
});
  // Add Employee Movement Entry
  document.getElementById("addMovement").addEventListener("click", function () {
      console.log("🟢 Add Movement button clicked!");

      const container = document.getElementById("employeeMovement");
      const newEntry = document.createElement("div");
      newEntry.classList.add("entry");
      newEntry.innerHTML = `
          <div class="row">
              <div class="form-group">
                  <label>Type</label>
                  <select name="movementType[]" form="employeeForm" >
                      <option value="" disabled selected>-- select movement type --</option>
                      <option>Merit Increase</option>
                      <option>Promotion</option>
                      <option>Reclassification</option>
                      <option>Regularization</option>
                      <option>Salary Adjustment</option>
                      <option>Transfer</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Effective Date</label>
                  <input type="date" name="effectiveDate[]" form="employeeForm" />
              </div>
              <div class="form-group">
                  <label>Percentage of Mere</label>
                  <input type="text" name="percentageMere[]" form="employeeForm" placeholder="Percentage of mere" />
              </div>
          </div>
          <div class="row">
              <div class="form-group">
                  <label>Position</label>
                  <input type="text" name="positionFrom[]" form="employeeForm" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="positionTo[]" form="employeeForm" placeholder="To" />
              </div>
              <div class="form-group">
                  <label>Employment Status</label>
                  <input type="text" name="statusFrom[]" form="employeeForm" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="statusTo[]" form="employeeForm" placeholder="To" />
              </div>
            </div>
          <div class="row">
              <div class="form-group">
                  <label>Dept/Section</label>
                  <input type="text" name="deptFrom[]" form="employeeForm" placeholder="From" />
          </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="deptTo[]" form="employeeForm" placeholder="To" />
              </div>
          </div>
        <div class="row">
              <div class="form-group">
                  <label>Job Level</label>
                  <input type="text" name="joblevelFrom[]" form="employeeForm" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="joblevelTo[]" form="employeeForm" placeholder="To" />
              </div>
              <div class="form-group">
                  <label>Gross Pay</label>
                  <input type="text" name="grosspayFrom[]" form="employeeForm" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="grosspayTo[]" form="employeeForm" placeholder="To" />
              </div>
        </div>
          <div style="display: flex; justify-content: flex-end; margin-top: 8px;">
              <button type="button" class="removeEntry" style="background: none; border: none; padding: 0;">
                  <i class="bi bi-trash" style="font-size: 20px; color: red;"></i>
              </button>
          </div>
          <hr>
      `;
      container.appendChild(newEntry);
  });
});
// VALIDATION FOR REQUIRED FIELDS
document.getElementById("submitBtn").addEventListener("click", function (event) {
  let isValid = true;
  const requiredFields = document.querySelectorAll("input[required], select[required], textarea[required]");

  requiredFields.forEach((field) => {
    if (!field.value.trim()) {
      field.style.border = "1px solid red";
      isValid = false;
    } else {
      field.style.border = "";
    }
  });
  if (!isValid) {
    event.preventDefault();
    alert("Please fill in all required fields.");
  }
});

// EMPLOYEE DATA HANDLING
let ancillary_emp = [];
let editIndex = null;
document.getElementById("submitBtn").addEventListener("click", function () {
  let empID = document.getElementById("empID").value;
  let firstName = document.getElementById("firstName").value;
  let middleName = document.getElementById("middleName").value;
  let lastName = document.getElementById("lastName").value;
  let position = document.getElementById("position").value;
  let type = document.getElementById("type").value;
  let startDate = document.getElementById("startDate").value;
  let status = document.getElementById("status").value;
  let fullName = `${firstName} ${middleName ? middleName[0] + '.' : ''} ${lastName}`;

  if (!empID || !firstName || !lastName || !sex || !birthdate || !contactNo || !email || !address || !maritalStatus || !nationality || !healthPermit || !department || !emergencyPersonFirst || !emergencyPersonLast || !emergencyAddress || !emergencyContact || !position || !type || !startDate || !status) {
    alert("Please fill in all required fields.");
    return;
  }
  let newEmployee = {
  empID, fullName, firstName, middleName, lastName, position, type, startDate, status,
  sex: document.getElementById("sex").value,
  birthdate: document.getElementById("birthdate").value,
  contactNo: document.getElementById("contactNo").value,
  email: document.getElementById("email").value,
  address: document.getElementById("address").value,
  maritalStatus: document.getElementById("maritalStatus").value,
  religion: document.getElementById("religion").value,
  nationality: document.getElementById("nationality").value,
  prcNo: document.getElementById("prcNo").value,
  prcValidity: document.getElementById("prcValidity").value,
  healthPermit: document.getElementById("healthPermit").value,
  permitValidity: document.getElementById("permitValidity").value,
  department: document.getElementById("department").value,
  reasonTermination: document.getElementById("reasonTermination").value,
  endDate: document.getElementById("endDate").value,
  salary: document.getElementById("salary").value,
  pepScore: document.getElementById("pepScore").value,
  periodCovered: document.getElementById("periodCovered").value,
  infraction: document.getElementById("infraction").value,
  pagibigNo: document.getElementById("pagibigNo").value,
  sssNo: document.getElementById("sssNo").value,
  philhealthNo: document.getElementById("philhealthNo").value,
  tin: document.getElementById("tin").value,
  emergencyPersonFirst: document.getElementById("emergencyPersonFirst").value,
  emergencyPersonMiddle: document.getElementById("emergencyPersonMiddle").value,
  emergencyPersonLast: document.getElementById("emergencyPersonLast").value,
  emergencyAddress: document.getElementById("emergencyAddress").value,
  emergencyContact: document.getElementById("emergencyContact").value
};

// Collect employment history inputs
let companyNames = document.getElementsByName("companyName[]");
let positions = document.getElementsByName("employmentPositions[]");
let lengths = document.getElementsByName("lengthExp[]");

let employmentHistory = [];
for (let i = 0; i < companyNames.length; i++) {
if (companyNames[i].value) { // Only save if company name is entered
  employmentHistory.push({
    companyName: companyNames[i].value,
    employmentPositions: positions[i]?.value || "N/A",
    lengthExp: lengths[i]?.value || "N/A",
  });
}
}

newEmployee.companyName = employmentHistory.map(entry => entry.companyName);
newEmployee.employmentPositions = employmentHistory.map(entry => entry.employmentPositions);
newEmployee.lengthExp = employmentHistory.map(entry => entry.lengthExp);

// Collect employee movement inputs
let movementTypes = document.getElementsByName("movementType[]");
let effectiveDates = document.getElementsByName("effectiveDate[]");
let percentageMeres = document.getElementsByName("percentageMere[]");
let positionsFrom = document.getElementsByName("positionFrom[]");
let positionsTo = document.getElementsByName("positionTo[]");

let employeeMovements = [];
for (let i = 0; i < movementTypes.length; i++) {
if (movementTypes[i].value) { // Only save if movement type is entered
  employeeMovements.push({
    movementType: movementTypes[i].value,
    effectiveDate: effectiveDates[i]?.value || "N/A",
    percentageMere: percentageMeres[i]?.value || "N/A",
    positionFrom: positionsFrom[i]?.value || "N/A",
    positionTo: positionsTo[i]?.value || "N/A",
  });
}
}

newEmployee.movementType = employeeMovements.map(entry => entry.movementType);
newEmployee.effectiveDate = employeeMovements.map(entry => entry.effectiveDate);
newEmployee.percentageMere = employeeMovements.map(entry => entry.percentageMere);
newEmployee.positionFrom = employeeMovements.map(entry => entry.positionFrom);
newEmployee.positionTo = employeeMovements.map(entry => entry.positionTo);

// Save new employee
if (editIndex !== null) {
ancillary_emp[editIndex] = newEmployee;
editIndex = null;
} else {
ancillary_emp.push(newEmployee);
}

saveEmployees();
renderTable();

if (editIndex === null) {
clearMovementFields();
}
closeModal();
});
function formatDate(date) {
  const d = new Date(date);
  const day = d.getDate().toString().padStart(2, '0'); // Add leading zero if necessary
  const month = (d.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-based, so add 1
  const year = d.getFullYear();

  return `${month}/${day}/${year}`; // Return formatted date as MM/DD/YYYY
}
// Store the original employee order before any sorting happens
let nameSortOrder = null; // null = default order, true = ascending, false = descending
let defaultOrder = []; // Stores employees in the order they were added

document.getElementById("nameHeader").addEventListener("click", function () {
if (nameSortOrder === null) {
  // Sort ascending (Last Name, First Name)
  ancillary_emp.sort((a, b) => {
    let fullNameA = `${a.lastName}, ${a.firstName}`;
    let fullNameB = `${b.lastName}, ${b.firstName}`;
    return fullNameA.localeCompare(fullNameB);
  });
  nameSortOrder = true;
  this.innerHTML = `FULL NAME ▲`;
} else if (nameSortOrder === true) {
  // Sort descending (Last Name, First Name)
  ancillary_emp.sort((a, b) => {
    let fullNameA = `${a.lastName}, ${a.firstName}`;
    let fullNameB = `${b.lastName}, ${b.firstName}`;
    return fullNameB.localeCompare(fullNameA);
  });
  nameSortOrder = false;
  this.innerHTML = `FULL NAME ▼`;
} else {
  nameSortOrder = null;
  this.innerHTML = `FULL NAME`;
}

renderTable(); // Re-render the table
});
function capitalizeWords(str) {
str = str.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
return str === "Ojt" ? "OJT" : str;
}
// RENDER FUNCTION
function renderTable() {
let tableBody = document.querySelector("#employeeTable tbody");
tableBody.innerHTML = "";

ancillary_emp.forEach((emp, index) => {
  let statusColor = "green"; // Default color for active
  if (emp.status.toLowerCase() === "inactive") {
      statusColor = "gray"; // Set inactive to gray
  } else if (emp.status.toLowerCase() === "terminated") {
      statusColor = "red"; // Keep terminated as red
  }
  let formattedStartDate = formatDate(emp.startDate);

  let row = document.createElement("tr");
  row.innerHTML = `
        <td>${index + 1}</td>
        <td>${emp.empID}</td>
        <td>
            <span class="emp-name view-btn" data-index="${index}" style="color: blue; cursor: pointer;">
                ${emp.lastName}, ${emp.firstName} ${emp.middleName ? emp.middleName[0] + "." : ""
        }
            </span>
        </td>
        <td>${emp.position}</td>
        <td>${capitalizeWords(emp.type)}</td>
        <td>${formattedStartDate}</td>
         <td style="color: ${statusColor}; font-weight: bold;">
        ${capitalizeWords(emp.status)}
        </td>
        <td>
            <button class="edit-btn" data-index="${index}">
                <i class="bi bi-pencil-fill" style="color: red;"></i>
            </button>
            <button class="delete-btn" data-index="${index}">
                <i class="bi bi-trash-fill" style="color: blue;"></i>
            </button>
        </td>
    `;
  tableBody.appendChild(row);
});
}
// Ensure clicking on "View" button opens the Employee Detail Modal
document.addEventListener("click", function (e) {
  if (e.target.closest(".view-btn")) {
    const index = e.target.closest(".view-btn").getAttribute("data-index");
    viewEmployee(index);
  }
});
// Event delegation for Edit buttons
document.addEventListener("click", function (e) {
  if (e.target.closest(".edit-btn")) {
    const index = e.target.closest(".edit-btn").getAttribute("data-index");
    editEmployee(index); // Check if this runs
  }
});
// Event delegation for View buttons
document.addEventListener("click", function (e) {
  if (e.target.closest(".view-btn")) {
    const index = e.target.closest(".view-btn").getAttribute("data-index");
    viewEmployee(index); // Show employee details
  }
});
// Event delegation for Delete buttons
document.addEventListener("click", function (e) {
  if (e.target.closest(".delete-btn")) {
    const index = e.target.closest(".delete-btn").getAttribute("data-index");
    deleteEmployee(index); // Delete employee
  }
});
// ✅ Fix: Ensure defaultOrder updates whenever a new employee is added
function addEmployee(newEmployee) {
  ancillary_emp.push(newEmployee);

  // Keep track of the default order dynamically
  defaultOrder = [...ancillary_emp];

    saveEmployees();
  renderTable();
}
function editEmployee(index) {
  index = Number(index); // Ensure index is a number
  let emp = ancillary_emp[index];  // Correctly reference the selected employee

  if (!emp) {
      console.error("❌ Employee not found at index:", index);
      return;
  }
  console.log("Editing Employee:", emp);
  console.log("Employment History:", emp.companyName, emp.employmentPositions, emp.lengthExp);
  console.log("Employment Movement:", emp.movementType, emp.effecyiveDate, emp.percentageMere, emp.positionFrom,
    emp.positionTo, emp.statusFrom,emp.statusTo, emp.deptFrom, emp.deptTo, emp.joblevelFrom, emp.joblevelTo,
    emp.grosspayFrom, emp.grosspayTo
  );
  document.getElementById("empID").value = emp.empID;
  document.getElementById("firstName").value = emp.firstName;
  document.getElementById("middleName").value = emp.middleName || '';
  document.getElementById("lastName").value = emp.lastName;
  document.getElementById("position").value = emp.position;
  document.getElementById("startDate").value = emp.startDate;
  document.getElementById("type").value = emp.type;
  document.getElementById("status").value = emp.status;

  // Restore correct values from the employee object
  document.getElementById("sex").value = emp.sex || '';
  document.getElementById("birthdate").value = emp.birthdate || '';
  document.getElementById("contactNo").value = emp.contactNo || '';
  document.getElementById("email").value = emp.email || '';
  document.getElementById("address").value = emp.address || '';
  document.getElementById("maritalStatus").value = emp.maritalStatus || '';
  document.getElementById("religion").value = emp.religion || '';
  document.getElementById("nationality").value = emp.nationality || '';
  document.getElementById("prcNo").value = emp.prcNo || '';
  document.getElementById("prcValidity").value = emp.prcValidity || '';
  document.getElementById("healthPermit").value = emp.healthPermit || '';
  document.getElementById("permitValidity").value = emp.permitValidity || '';

  document.getElementById("department").value = emp.department || '';
  document.getElementById("reasonTermination").value = emp.reasonTermination || '';
  document.getElementById("endDate").value = emp.endDate || '';
  document.getElementById("salary").value = emp.salary || '';
  document.getElementById("pepScore").value = emp.pepScore || "";
  document.getElementById("periodCovered").value = emp.periodCovered || "";
  document.getElementById("infraction").value = emp.infraction || "";

  document.getElementById("pagibigNo").value = emp.pagibigNo || '';
  document.getElementById("sssNo").value = emp.sssNo || '';
  document.getElementById("philhealthNo").value = emp.philhealthNo || '';
  document.getElementById("tin").value = emp.tin || '';

  document.getElementById("emergencyPersonFirst").value = emp.emergencyPersonFirst || '';
  document.getElementById("emergencyPersonMiddle").value = emp.emergencyPersonMiddle || '';
  document.getElementById("emergencyPersonLast").value = emp.emergencyPersonLast || '';
  document.getElementById("emergencyAddress").value = emp.emergencyAddress || '';
  document.getElementById("emergencyContact").value = emp.emergencyContact || '';
  
  const employmentHistoryContainer = document.getElementById("employmentHistory");
  employmentHistoryContainer.innerHTML = ""; // Clear previous entries
  
  for (let i = 0; i < emp.companyName.length; i++) {
      const entry = document.createElement("div");
      entry.classList.add("row", "employment-entry");
      entry.style.alignItems = "center";
      entry.innerHTML = `
          <div class="form-group">
              <label>Company Name</label>
              <input type="text" name="companyName[]" value="${emp.companyName[i]}" />
          </div>
          <div class="form-group">
              <label>Position</label>
              <input type="text" name="employmentPositions[]" value="${emp.employmentPositions[i]}" />
          </div>
          <div class="form-group">
              <label>Length of Experience</label>
              <input type="text" name="lengthExp[]" value="${emp.lengthExp[i]}" />
          </div>
          <div style="display: flex; align-items: center; margin-top: 8px;">
              <button type="button" class="removeEntry" style="background: none; border: none; padding: 0;">
                  <i class="bi bi-trash" style="font-size: 20px; color: red;"></i>
              </button>
          </div>
      `;
      employmentHistoryContainer.appendChild(entry);
  }
  
  function formatDate(date) {
    const d = new Date(date);
    const day = d.getDate().toString().padStart(2, '0'); // Add leading zero if necessary
    const month = (d.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-based, so add 1
    const year = d.getFullYear();
  
    return `${month}/${day}/${year}`; // Return formatted date as MM/DD/YYYY
  }
  const movementContainer = document.getElementById("employeeMovement");
  movementContainer.innerHTML = ""; // Clear previous entries
  let formattedeffectiveDate = formatDate(emp.effectiveDate);

  for (let i = 0; i < emp.movementType.length; i++) {
      const entry = document.createElement("div");
      entry.classList.add("entry");
      entry.innerHTML = `
          <div class="row">
              <div class="form-group">
                  <label>Type</label>
                  <select name="movementType[]">
                      <option value="" disabled>-- select movement type --</option>
                      <option ${emp.movementType[i] === "Merit Increase" ? "selected" : ""}>Merit Increase</option>
                      <option ${emp.movementType[i] === "Promotion" ? "selected" : ""}>Promotion</option>
                      <option ${emp.movementType[i] === "Reclassification" ? "selected" : ""}>Reclassification</option>
                      <option ${emp.movementType[i] === "Regularization" ? "selected" : ""}>Regularization</option>
                      <option ${emp.movementType[i] === "Salary Adjustment" ? "selected" : ""}>Salary Adjustment</option>
                      <option ${emp.movementType[i] === "Transfer" ? "selected" : ""}>Transfer</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Effective Date</label>
                  <input type="date" name="effectiveDate[]" value="${emp.effectiveDate[i] || ""}" />
              </div>
              <div class="form-group">
                  <label>Percentage of Mere</label>
                  <input type="text" name="percentageMere[]" value="${emp.percentageMere[i] || ""}" />
              </div>
          </div>
          <div class="row">
              <div class="form-group">
                  <label>Position</label>
                  <input type="text" name="positionFrom[]" value="${emp.positionFrom[i] || ""}" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="positionTo[]" value="${emp.positionTo[i] || ""}" placeholder="To" />
              </div>
              <div class="form-group">
                  <label>Employment Status</label>
                  <input type="text" name="statusFrom[]" value="${emp.statusFrom[i] || ""}" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="statusTo[]" value="${emp.statusTo[i] || ""}" placeholder="To" />
              </div>
          </div>
          <div class="row">
              <div class="form-group">
                  <label>Dept/Section</label>
                  <input type="text" name="deptFrom[]" value="${emp.deptFrom[i] || ""}" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="deptTo[]" value="${emp.deptTo[i] || ""}" placeholder="To" />
              </div>
          </div>
          <div class="row">
              <div class="form-group">
                  <label>Job Level</label>
                  <input type="text" name="joblevelFrom[]" value="${emp.joblevelFrom[i] || ""}" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="joblevelTo[]" value="${emp.joblevelTo[i] || ""}" placeholder="To" />
              </div>
              <div class="form-group">
                  <label>Gross Pay</label>
                  <input type="text" name="grosspayFrom[]" value="${emp.grosspayFrom[i] || ""}" placeholder="From" />
              </div>
              <div class="form-group">
                  <label style="margin-top: 15px;"></label>
                  <input type="text" name="grosspayTo[]" value="${emp.grosspayTo[i] || ""}" placeholder="To" />
              </div>
          </div>
          <div style="display: flex; justify-content: flex-end; margin-top: 8px;">
              <button type="button" class="removeEntry" style="background: none; border: none; padding: 0;">
                  <i class="bi bi-trash" style="font-size: 20px; color: red;"></i>
              </button>
          </div>
          <hr>
      `;
      movementContainer.appendChild(entry);
  }
  editIndex = index;
  document.getElementById("modalOverlay").classList.add("show");
  document.getElementById("employeeModal").classList.add("show");
}
function deleteEmployee(index) {
  let empID = ancillary_emp[index].empID; // Get employee ID

  if (!confirm(`Are you sure you want to delete employee ID ${empID}?`)) {
      return; // Stop if user cancels
  }
  fetch('delete_ancillary.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ empID: empID })
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          console.log("🗑️ Employee deleted:", empID);
          loadEmployees(); // Refresh table after deletion
      } else {
          console.error("❌ Error deleting employee:", data.message);
      }
  })
  .catch(error => console.error("🔴 Server error:", error));
}
// LOAD EMPLOYEES FROM LOCAL STORAGE
function loadEmployees() {
  fetch("fetch_ancillary.php")
      .then(response => response.json())
      .then(data => {
          console.log("🟢 Fetched Employee Data:", data); // Debug fetched data

          ancillary_emp = Array.isArray(data) ? data : []; // Ensure it's an array
          renderTable();
      })
      .catch(error => console.error("❌ Error fetching employees:", error));
}
// Ensure this function runs when the page loads
document.addEventListener("DOMContentLoaded", function () {
  console.log("🟢 DOM fully loaded. Running loadEmployees()...");
  loadEmployees();
});

function initializeSearchFunction() {
  let searchInput = document.getElementById("searchInput");
  let searchButton = document.getElementById("searchBtn");

  if (!searchInput || !searchButton) {
    console.error("Search elements not found! Make sure searchInput and searchBtn exist.");
    return;
  }
  // Trigger search on button click or input change
  searchInput.addEventListener("input", searchEmployees); // Trigger search as you type
  searchButton.addEventListener("click", searchEmployees); // Fallback for button click
  searchInput.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      searchEmployees();
    }
  });
}
// Search functionality (debounced)
let debounceTimer;
function searchEmployees() {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(function () {
    let searchValue = document.getElementById("searchInput").value.trim().toLowerCase();
    let rows = document.querySelectorAll("#employeeTable tbody tr");

    rows.forEach((row) => {
      let empID = row.children[1].textContent.trim().toLowerCase();
      let name = row.children[2].textContent.trim().toLowerCase();

      // Only search by EmpID or Name
      row.style.display = empID.includes(searchValue) || name.includes(searchValue) ? "" : "none";
    });
  }, 300); // Adjust debounce delay as needed
}
function capitalizeWords(str) {
  if (!str) return "N/A"; // Handle empty values
  str = str.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
  return str === "Ojt" ? "OJT" : str; // Keep "OJT" in uppercase
}

// Employee Detail Modal
function viewEmployee(index) {
if (!ancillary_emp || !ancillary_emp[index]) {
    console.error("❌ Error: Employee data not found for index:", index);
    return;
}

let emp = ancillary_emp[index];

// 🔍 Debugging Logs
console.log("🟢 Viewing Employee:", emp);
console.log("🔵 Employment History Data:", emp.companyName, emp.employmentPositions, emp.lengthExp);
console.log("🔵 Employee Movement Data:", emp.movementType, emp.effectiveDate, emp.positionFrom, emp.positionTo);

console.log("🟢 Employee Data:", emp);
console.log("📅 Birthdate:", emp.birthdate);
console.log("📅 PRC Validity:", emp.prcValidity);
console.log("📅 Permit Validity:", emp.permitValidity);
console.log("📅 Start Date:", emp.startDate);
console.log("📅 End Date:", emp.endDate);

if (!emp.companyName || emp.companyName.length === 0) {
    console.warn("⚠️ No Employment History received.");
}
if (!emp.movementType || emp.movementType.length === 0) {
    console.warn("⚠️ No Employee Movement received.");
} 
  // Employee Basic Details
  document.getElementById("detailEmpID").textContent = emp.empID || "N/A";
  document.getElementById("detailFullName").textContent = `${emp.firstName || ""} ${emp.middleName || ""} ${emp.lastName || ""}`.trim();
  document.getElementById("detailSex").textContent = emp.sex || "N/A";
  document.getElementById("detailBirthdate").textContent = emp.birthdate || "N/A";
  document.getElementById("detailContactNo").textContent = emp.contactNo || "N/A";
  document.getElementById("detailEmail").textContent = emp.email || "N/A";
  document.getElementById("detailAddress").textContent = emp.address || "N/A";
  document.getElementById("detailMaritalStatus").textContent = emp.maritalStatus || "N/A";
  document.getElementById("detailReligion").textContent = emp.religion || "N/A";
  document.getElementById("detailNationality").textContent = capitalizeWords(emp.nationality) || "N/A";
  document.getElementById("detailPRCNo").textContent = emp.prcNo || "N/A";
  document.getElementById("detailPRCExpiry").textContent = emp.prcValidity|| "N/A";

  // Health Permit Logic
  let healthPermitElement = document.getElementById("detailHealthPermit");
  healthPermitElement.textContent = emp.healthPermit === "Yes" ? "With Health Permit" : "Without Health Permit";
  healthPermitElement.style.color = emp.healthPermit === "Yes" ? "green" : "red";
  healthPermitElement.style.fontStyle = "italic";

  document.getElementById("detailPermitValidity").textContent = emp.permitValidity || "N/A";
  document.getElementById("detailPosition").textContent = capitalizeWords(emp.position) || "N/A";
  document.getElementById("detailDepartment").textContent = capitalizeWords(emp.department) || "N/A";
  document.getElementById("detailReasonTermination").textContent = ""; // Clear first
  document.getElementById("detailReasonTermination").textContent = emp.reasonTermination || "N/A";
  document.getElementById("detailType").textContent = capitalizeWords(emp.type) || "N/A";
  document.getElementById("detailStartDate").textContent = emp.startDate || "N/A";
  document.getElementById("detailEndDate").textContent = emp.endDate || "N/A";
  document.getElementById("detailSalary").textContent = emp.salary || "N/A";
  document.getElementById("detailPeriodCovered").textContent = emp.periodCovered || "N/A";
  document.getElementById("detailInfraction").textContent = emp.infraction || "N/A";

  // Update Status Badge and Text
  const statusBadge = document.getElementById("detailStatusBadge");
  const statusText = document.getElementById("detailStatus");

  statusText.textContent = capitalizeWords(emp.status) || "N/A";


  statusBadge.textContent = emp.status ? emp.status.toUpperCase() : "N/A";
  if (emp.status && emp.status.toLowerCase() === "active") {
    statusBadge.style.backgroundColor = "green";
  } else if (emp.status && emp.status.toLowerCase() === "inactive") {
    statusBadge.style.backgroundColor = "gray";
  } else if (emp.status && emp.status.toLowerCase() === "terminated") {
    statusBadge.style.backgroundColor = "red";
  } else {
    statusBadge.style.backgroundColor = "gray"; // Default for unknown status
  }

  // Fix PEP Score (Restored exactly as you originally had it)
  let pepScoreElement = document.getElementById("detailPepScore");
  let pepScore = parseFloat(emp.pepScore);
  pepScoreElement.textContent = emp.pepScore || "N/A";
  pepScoreElement.style.color = pepScore <= 2 ? "red" : "green";

  // Government IDs
  document.getElementById("detailPagibigNo").textContent =
    emp.pagibigNo || "N/A";
  document.getElementById("detailSSSNo").textContent = emp.sssNo || "N/A";
  document.getElementById("detailPhilhealthNo").textContent =
    emp.philhealthNo || "N/A";
  document.getElementById("detailTIN").textContent = emp.tin || "N/A";

  // Emergency Contact
  document.getElementById("detailEmergencyPerson").textContent = `${emp.emergencyPersonFirst || ""} ${emp.emergencyPersonMiddle || ""} ${emp.emergencyPersonLast || ""}`.trim();
  document.getElementById("detailEmergencyContact").textContent = emp.emergencyContact || "N/A";
  document.getElementById("detailEmergencyAddress").textContent = emp.emergencyAddress || "N/A";

  console.log("🔵 Employment History Data:", emp.companyName, emp.employmentPositions, emp.lengthExp);

  // Employment History
  let employmentHistoryContent = document.getElementById("employmentHistoryContent");
  employmentHistoryContent.innerHTML = ""; // Clear previous content

if (emp.companyName && emp.companyName.length > 0) {
for (let i = 0; i < emp.companyName.length; i++) {
  const entry = document.createElement("div");
  entry.classList.add("employee-entry");
  entry.innerHTML = `
      <p><strong>Company Name:</strong> ${emp.companyName[i] || "N/A"}</p>
      <p><strong>Position:</strong> ${emp.employmentPositions[i] || "N/A"}</p>
      <p><strong>Length of Experience:</strong> ${emp.lengthExp[i] || "N/A"}</p>
     `;
  employmentHistoryContent.appendChild(entry);
}
} else {
employmentHistoryContent.innerHTML = "<p>No employment history available.</p>";
}
console.log("🔵 Employee Movement Data:", emp.movementType, emp.effectiveDate, emp.positionFrom, emp.positionTo, emp.statusFrom, emp.statusTo,
  emp.deptFrom, emp.deptTo, emp.joblevelFrom, emp.joblevelTo, emp.grosspayFrom, emp.grosspayTo);

  // Employee Movement
  let employeeMovementContent = document.getElementById("employeeMovementContent");
  employeeMovementContent.innerHTML = ""; // Clear previous content
  
  if (emp.movementType && emp.movementType.length > 0) {
    for (let i = 0; i < emp.movementType.length; i++) {
      const entry = document.createElement("div");
      entry.classList.add("employee-entry");
      entry.innerHTML = `
          <p><strong>Type:</strong> ${emp.movementType[i] || "N/A"}</p>
          <p><strong>Effective Date:</strong> ${emp.effectiveDate[i] || "N/A"}</p>
          <p><strong>Percentage of Mere:</strong> ${emp.percentageMere[i] || "N/A"}</p>
          <p><strong>Position:</strong> ${emp.positionFrom[i] || "N/A"} → ${emp.positionTo[i] || "N/A"}</p>
          <p><strong>Employment Status:</strong> ${emp.statusFrom[i] || "N/A"} → ${emp.statusTo[i] || "N/A"}</p>
          <p><strong>Dept/Section:</strong> ${emp.deptFrom[i] || "N/A"} → ${emp.deptTo[i] || "N/A"}</p>
          <p><strong>Job Level:</strong> ${emp.joblevelFrom[i] || "N/A"} → ${emp.joblevelTo[i] || "N/A"}</p>
          <p><strong>Gross Pay:</strong> ${emp.grosspayFrom[i] || "N/A"} → ${emp.grosspayTo[i] || "N/A"}</p>
          <hr>
      `;
      employeeMovementContent.appendChild(entry);
    }
  } else {
    employeeMovementContent.innerHTML = "<p>No movements available.</p>";
  }
  
  // ✅ Open the Employee Detail Modal
  document.getElementById("employeeDetailsModal").style.display = "block";
}

// PRINT EMPLOYEE DETAIL
function printEmployeeDetails() {
  const modal = document.getElementById("employeeDetailsModal");
  if (!modal || modal.style.display === "none") {
    alert("Error: Employee details modal is not open or not found!");
    return;
  }
  const modalContent = modal.innerHTML;

  const printWindow = window.open("", "_blank", "width=800,height=600");
  if (!printWindow) {
    alert("Popup blocked! Allow popups and try again.");
    return;
  }
  printWindow.document.open();
  printWindow.document.write(`
  <html>
    <head>
      <title>Employee Details</title>
      <style>
        body { font-family: Inter, sans-serif; padding: 20px; }
        .employee-section-first, .employee-section {
          background-color: #f9f9f9 !important;
          padding: 10px;
          -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
        }

        .employee-section-title { 
          background-color: rgb(162, 160, 160) !important;
          font-size: 13px; color: black; padding: 8px; font-weight: bold;
          text-align: center; display: block;
          -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
        }
        .employee-modal-header h2, #employee-export-btn, #employee-print-btn, .employee-ekis-btn, .employee-close-btn, .employee-status-badge {
          display: none !important;
        }
        .employee-section-content { background: #f9f9f9; font-size: 13px; padding: 8px; display: grid; gap: 6px; }
        .employee-grid-2 { grid-template-columns: 1fr 1fr; }
        p { margin: 4px 0; }
        .employee-grid-3 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 10px;
        }
      </style>
    </head>
    <body>
      ${modalContent}
    </body>
  </html>
`);
  printWindow.document.close();

  setTimeout(() => {
    printWindow.print();
    printWindow.close();

    // Ensure modal can be closed afterward
    setTimeout(() => {
      modal.style.display = "block"; // Ensures modal is still visible
    }, 300);
  }, 500);
}

// Ensure the close button works after printing
function closeDetailsModal() {
  const modal = document.getElementById("employeeDetailsModal");
  if (modal) {
    modal.style.display = "none";
  }
}

// Attach event listeners for closing the modal
document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    closeDetailsModal();
  }
});
document.addEventListener("click", function (event) {
  const modal = document.getElementById("employeeDetailsModal");
  if (event.target === modal) {
    closeDetailsModal();
  }
});
// Function to close the modal
function closeDetailsModal() {
  document.getElementById("employeeDetailsModal").style.display = "none";
}
// Add event listener to close modal when clicking outside of it
window.addEventListener("click", function (event) {
  var modal = document.getElementById("employeeDetailsModal");
  if (event.target === modal) {
    // Check if the clicked area is the modal background
    closeDetailsModal();
  }
});
// Optional: Close modal when pressing "Esc" key
document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    closeDetailsModal();
  }
});
function saveEmployees() {
  console.log("🔄 Saving employees...");
  fetch("update_ancillary.php", {
      method: "POST",
      body: new FormData(document.getElementById("employeeForm"))
  })
  .then(response => response.json())
  .then(data => {
      console.log("✅ Employee saved:", data);
      if (data.success) {
          alert("Employee saved successfully!");
          loadEmployees(); // Refresh data after saving
      } else {
          alert("Save failed: " + data.error);
      }
  })
  .catch(error => console.error("❌ Error saving employee:", error));
}