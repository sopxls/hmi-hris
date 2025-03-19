if (document.querySelector(".login-form-btn")) {
  document
    .querySelector(".login-form-btn")
    .addEventListener("click", function () {
      window.location.href = "dashboard.php";
    });
}
if (document.querySelector("logout")) {
  document.querySelector("logout").addEventListener("click", function () {
    window.location.href = "index.php";
  });
}
if (document.querySelector("admin")) {
  document.querySelector("admin").addEventListener("click", function () {
    window.location.href = "admin.php";
  });
}
if (document.querySelector("hr")) {
  document.querySelector("hr").addEventListener("click", function () {
    window.location.href = "hr.php";
  });
}
if (document.querySelector(".back-btn")) {
  document.querySelector(".back-btn").addEventListener("click", function () {
    window.location.href = "dashboard.php";
  });
}
// Search Functionality (Trigger on Button Click or Enter Key)
if (document.querySelector(".search-btn")) {
  document.querySelector(".search-btn").addEventListener("click", function () {
    let searchQuery = document.querySelector(".search-input").value;
    alert("Searching for: " + searchQuery);
  });
}

// Allow "Enter" Key for Search
if (document.querySelector(".search-input")) {
  document
    .querySelector(".search-input")
    .addEventListener("keypress", function (event) {
      if (event.key === "Enter") {
        event.preventDefault(); // Prevent form submission
        document.querySelector(".search-btn").click();
      }
    });
}
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("addEmployeeModal");
  const openBtn = document.getElementById("add-employee-btn"); // Replace with your actual button ID
  const closeBtn = document.getElementById("closeModal");

  openBtn.addEventListener("click", function () {
    modal.style.display = "block";
  });

  closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});
document.querySelector(".close").addEventListener("click", function () {
  document.getElementById("addEmployeeModal").style.display = "none";
});
document
  .getElementById("cancelEmployee")
  .addEventListener("click", function () {
    document.getElementById("addEmployeeModal").style.display = "none";
  });
  document.getElementById("submitBtn").addEventListener("click", function(event) {
    let requiredFields = document.querySelectorAll("[required]");
    let isValid = true;

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.style.border = "1.5px solid rgb(187, 26, 26)"; // Highlight empty fields
        } else {
            field.style.border = ""; // Reset if filled
        }
    });

    if (!isValid) {
        event.preventDefault(); // Prevent submission if any field is empty
        alert("Please fill in all required fields.");
    }
});s

  document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("addEmployeeModal");
  const addEmployeeBtn = document.getElementById("addEmployeeBtn");
  const closeModalBtns = document.querySelectorAll(".close-modal");
  const submitBtn = document.getElementById("submitBtn");
  const tableBody = document.querySelector(".table-container tbody");
  let employeeCount = tableBody.rows.length; // Keeps track of row numbers

  // Open modal
  addEmployeeBtn.addEventListener("click", function () {
    modal.style.display = "block";
  });

  // Close modal (both close button and cancel button)
  closeModalBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      modal.style.display = "none";
    });
  });

  // Close modal if clicked outside
  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });

  // Submit button - Add data to table
  submitBtn.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent form submission

    // Get values from modal inputs
    const empID = document.getElementById("empID").value;
    const empName = document.getElementById("empName").value;
    const empPosition = document.getElementById("empPosition").value;
    const empType = document.getElementById("empType").value;
    const empStatus = document.getElementById("empStatus").value;

    if (!empID || !empName || !empPosition || !empType || !empStatus) {
      alert("Please fill in all required fields.");
      return;
    }

    // Create a new row and insert values
    const newRow = document.createElement("tr");
    newRow.innerHTML = `
      <td>${++employeeCount}</td>
      <td>${empID}</td>
      <td>${empName-field}</td>
      <td>${empPosition}</td>
      <td>${empType}</td>
      <td>${empStatus}</td>
      <td class="actions">
        <button class="edit-btn"> <i class="bi bi-pencil-fill"></i></button>
        <button class="delete-btn"><i class="bi bi-trash-fill"></i></button>
      </td>
    `;

    tableBody.appendChild(newRow);

    // Clear modal inputs
    document.getElementById("employeeForm").reset();

    // Close modal
    modal.style.display = "none";
  });

  // Delete row functionality
  tableBody.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-btn")) {
      event.target.closest("tr").remove();
      employeeCount--; // Update row count
      updateRowNumbers(); // Reorder row numbers
    }
  });

  // Function to update row numbers after deletion
  function updateRowNumbers() {
    let rows = tableBody.querySelectorAll("tr");
    rows.forEach((row, index) => {
      row.cells[0].textContent = index + 1;
    });
  }
});
if (document.querySelector("account")) {
  document.querySelector("account").addEventListener("click", function () {
    window.location.href = "account.php";
  });
}
