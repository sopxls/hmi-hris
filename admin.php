<?php
include "employee_db.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="dept.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Markazi+Text:wght@400..700&display=swap" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>
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
        <div style="display: flex; justify-content: center; gap: 30px; margin: 15px;">
      <div class="card" style="width: 150px; padding: 15px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); font-family: 'Inter', sans-serif; text-align: center;">
        <div class="card-number" id="totalEmployees" style="font-weight: bold; font-size: 20px;">0</div>
        <div class="card-icon-label" style="color: #6d2323; font-size: 13px;">
          <span id="totalEmployees">Total Employees</span>
        </div>
      </div>
      <div class="card" style="width: 150px; padding: 15px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); font-family: 'Inter', sans-serif; text-align: center;">
        <div class="card-number" id="activeEmployees" style="font-weight: bold; font-size: 20px;">0</div>
        <div class="card-icon-label" style="color: #6d2323; font-size: 13px;">
          <span id="activeEmployees">Active Employees</span>
        </div>
      </div>
    </div>
    <div class="top-section">
        <!-- Left Section: Search Bar -->
        <div class="left-section">
            <div class="search-container">
                <button id="searchBtn" class="bi bi-search"></button>
                <input type="text" id="searchInput" class="search-input" placeholder="Search employee...">
            </div>
            <!-- Filter Button with Dropdown -->
            <div class="filter-container" id="filterBox">
                <button id="filterBtn" class="bi bi-filter" onclick="toggleFilter()"></button>
                <select id="filterDropdown" onchange="applyFilter()">
                    <option value="" disabled selected>Filter</option>
                    <option value="all">All Employees</option>
                    <hr>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="terminated">Terminated</option>
                    <hr>
                    <option value="probationary">Probationary</option>
                    <option value="regular">Regular</option>
                    <option value="fixed">Fixed</option>
                    <option value="oncall">On Call</option>
                    <option value="consultant">Consultant</option>
                    <option value="ojt">OJT</option>
                </select>
            </div>
        </div>
        <!-- Right Section: Add Employee & Export Button -->
        <div class="right-section">
            <button id="openModalBtn" class="open-modal-btn">+ Add Employee</button>
            <div class="export-container">
                <button id="exportBtn" class="bi bi-download"></button>
                <div class="dropdown-content">
                    <button id="exportExcel">Download as Excel</button>
                    <button id="exportPDF">Download as PDF</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Overlay -->
    <div id="modalOverlay" class="modal-overlay"></div>
    <!-- Modal -->
    <div id="employeeModal" class="modal">
      <div class="modal-header">
        <h2>Add Employee</h2>
        <button id="closeModalBtn" class="close">&times;</button>
      </div>
      <div class="modal-body p-0">
        <!-- Personal Info Section -->
        <div class="section-box">
          <h3 class="section-title">Personal Information</h3>
          <form action="#" method="POST"
          class="employee-form" name="employeeForm" id="employeeForm">
          <div class="row">
            <div class="form-group">
              <label>First Name</label
              ><input type="text" name="firstName" id="firstName" required />
            </div>
            <div class="form-group">
              <label>Middle Name</label><input type="text" name="middleName" id="middleName" />
            </div>
            <div class="form-group">
              <label>Last Name</label
              ><input type="text" name="lastName" id="lastName" required />
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label>Sex</label>
              <select name="sex" id="sex" required>
                <option value="" disabled selected>-- select one --</option>
                <option>Male</option>
                <option>Female</option>
                <option>Non-binary</option>
              </select>
            </div>
            <div class="form-group">
              <label>Birthdate</label
              ><input type="date" name="birthdate" id="birthdate" required />
            </div>
            <div class="form-group">
                <label>Contact No.</label>
                <input
                  type="tel"
                  name="contactNo"
                  id="contactNo"
                  required
                  pattern="\d{11}"
                  title="Enter a valid 11-digit phone number"
                />
                <span id="error-message" style="color: red; font-size: 10px;"></span>
            </div>
          </div>
          <div class="row">
            <div class="form-group email-field">
              <label>Email</label><input type="email" name="email" id="email" required/>
            </div>
            <div class="form-group address-field">
              <label>Address</label><input type="text" name="address" id="address" required/>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label>Marital Status</label>
              <select name="maritalStatus" id="maritalStatus" required>
                <option value="" disabled selected>-- select one --</option>
                <option>Single</option>
                <option>Married</option>
                <option>Separated</option>
                <option>Divorced</option>
                <option>Widowed</option>
              </select>
            </div>
            <div class="form-group">
              <label>Religion</label><input type="text" name="religion" id="religion" />
            </div>
            <div class="form-group">
              <label>Nationality</label>
              <select name="nationality" id="nationality" required>
                <option value="" disabled selected>-- select one --</option>
                <option value="afghan">Afghan</option>
                <option value="albanian">Albanian</option>
                <option value="algerian">Algerian</option>
                <option value="american">American</option>
                <option value="andorran">Andorran</option>
                <option value="angolan">Angolan</option>
                <option value="antiguans">Antiguans</option>
                <option value="argentinean">Argentinean</option>
                <option value="armenian">Armenian</option>
                <option value="australian">Australian</option>
                <option value="austrian">Austrian</option>
                <option value="azerbaijani">Azerbaijani</option>
                <option value="bahamian">Bahamian</option>
                <option value="bahraini">Bahraini</option>
                <option value="bangladeshi">Bangladeshi</option>
                <option value="barbadian">Barbadian</option>
                <option value="barbudans">Barbudans</option>
                <option value="batswana">Batswana</option>
                <option value="belarusian">Belarusian</option>
                <option value="belgian">Belgian</option>
                <option value="belizean">Belizean</option>
                <option value="beninese">Beninese</option>
                <option value="bhutanese">Bhutanese</option>
                <option value="bolivian">Bolivian</option>
                <option value="bosnian">Bosnian</option>
                <option value="brazilian">Brazilian</option>
                <option value="british">British</option>
                <option value="bruneian">Bruneian</option>
                <option value="bulgarian">Bulgarian</option>
                <option value="burkinabe">Burkinabe</option>
                <option value="burmese">Burmese</option>
                <option value="burundian">Burundian</option>
                <option value="cambodian">Cambodian</option>
                <option value="cameroonian">Cameroonian</option>
                <option value="canadian">Canadian</option>
                <option value="cape verdean">Cape Verdean</option>
                <option value="central african">Central African</option>
                <option value="chadian">Chadian</option>
                <option value="chilean">Chilean</option>
                <option value="chinese">Chinese</option>
                <option value="colombian">Colombian</option>
                <option value="comoran">Comoran</option>
                <option value="congolese">Congolese</option>
                <option value="costa rican">Costa Rican</option>
                <option value="croatian">Croatian</option>
                <option value="cuban">Cuban</option>
                <option value="cypriot">Cypriot</option>
                <option value="czech">Czech</option>
                <option value="danish">Danish</option>
                <option value="djibouti">Djibouti</option>
                <option value="dominican">Dominican</option>
                <option value="dutch">Dutch</option>
                <option value="east timorese">East Timorese</option>
                <option value="ecuadorean">Ecuadorean</option>
                <option value="egyptian">Egyptian</option>
                <option value="emirian">Emirian</option>
                <option value="equatorial guinean">Equatorial Guinean</option>
                <option value="eritrean">Eritrean</option>
                <option value="estonian">Estonian</option>
                <option value="ethiopian">Ethiopian</option>
                <option value="fijian">Fijian</option>
                <option value="filipino">Filipino</option>
                <option value="finnish">Finnish</option>
                <option value="french">French</option>
                <option value="gabonese">Gabonese</option>
                <option value="gambian">Gambian</option>
                <option value="georgian">Georgian</option>
                <option value="german">German</option>
                <option value="ghanaian">Ghanaian</option>
                <option value="greek">Greek</option>
                <option value="grenadian">Grenadian</option>
                <option value="guatemalan">Guatemalan</option>
                <option value="guinea-bissauan">Guinea-Bissauan</option>
                <option value="guinean">Guinean</option>
                <option value="guyanese">Guyanese</option>
                <option value="haitian">Haitian</option>
                <option value="herzegovinian">Herzegovinian</option>
                <option value="honduran">Honduran</option>
                <option value="hungarian">Hungarian</option>
                <option value="icelander">Icelander</option>
                <option value="indian">Indian</option>
                <option value="indonesian">Indonesian</option>
                <option value="iranian">Iranian</option>
                <option value="iraqi">Iraqi</option>
                <option value="irish">Irish</option>
                <option value="israeli">Israeli</option>
                <option value="italian">Italian</option>
                <option value="ivorian">Ivorian</option>
                <option value="jamaican">Jamaican</option>
                <option value="japanese">Japanese</option>
                <option value="jordanian">Jordanian</option>
                <option value="kazakhstani">Kazakhstani</option>
                <option value="kenyan">Kenyan</option>
                <option value="kittian and nevisian">Kittian and Nevisian</option>
                <option value="kuwaiti">Kuwaiti</option>
                <option value="kyrgyz">Kyrgyz</option>
                <option value="laotian">Laotian</option>
                <option value="latvian">Latvian</option>
                <option value="lebanese">Lebanese</option>
                <option value="liberian">Liberian</option>
                <option value="libyan">Libyan</option>
                <option value="liechtensteiner">Liechtensteiner</option>
                <option value="lithuanian">Lithuanian</option>
                <option value="luxembourger">Luxembourger</option>
                <option value="macedonian">Macedonian</option>
                <option value="malagasy">Malagasy</option>
                <option value="malawian">Malawian</option>
                <option value="malaysian">Malaysian</option>
                <option value="maldivan">Maldivan</option>
                <option value="malian">Malian</option>
                <option value="maltese">Maltese</option>
                <option value="marshallese">Marshallese</option>
                <option value="mauritanian">Mauritanian</option>
                <option value="mauritian">Mauritian</option>
                <option value="mexican">Mexican</option>
                <option value="micronesian">Micronesian</option>
                <option value="moldovan">Moldovan</option>
                <option value="monacan">Monacan</option>
                <option value="mongolian">Mongolian</option>
                <option value="moroccan">Moroccan</option>
                <option value="mosotho">Mosotho</option>
                <option value="motswana">Motswana</option>
                <option value="mozambican">Mozambican</option>
                <option value="namibian">Namibian</option>
                <option value="nauruan">Nauruan</option>
                <option value="nepalese">Nepalese</option>
                <option value="new zealander">New Zealander</option>
                <option value="ni-vanuatu">Ni-Vanuatu</option>
                <option value="nicaraguan">Nicaraguan</option>
                <option value="nigerien">Nigerien</option>
                <option value="north korean">North Korean</option>
                <option value="northern irish">Northern Irish</option>
                <option value="norwegian">Norwegian</option>
                <option value="omani">Omani</option>
                <option value="pakistani">Pakistani</option>
                <option value="palauan">Palauan</option>
                <option value="panamanian">Panamanian</option>
                <option value="papua new guinean">Papua New Guinean</option>
                <option value="paraguayan">Paraguayan</option>
                <option value="peruvian">Peruvian</option>
                <option value="polish">Polish</option>
                <option value="portuguese">Portuguese</option>
                <option value="qatari">Qatari</option>
                <option value="romanian">Romanian</option>
                <option value="russian">Russian</option>
                <option value="rwandan">Rwandan</option>
                <option value="saint lucian">Saint Lucian</option>
                <option value="salvadoran">Salvadoran</option>
                <option value="samoan">Samoan</option>
                <option value="san marinese">San Marinese</option>
                <option value="sao tomean">Sao Tomean</option>
                <option value="saudi">Saudi</option>
                <option value="scottish">Scottish</option>
                <option value="senegalese">Senegalese</option>
                <option value="serbian">Serbian</option>
                <option value="seychellois">Seychellois</option>
                <option value="sierra leonean">Sierra Leonean</option>
                <option value="singaporean">Singaporean</option>
                <option value="slovakian">Slovakian</option>
                <option value="slovenian">Slovenian</option>
                <option value="solomon islander">Solomon Islander</option>
                <option value="somali">Somali</option>
                <option value="south african">South African</option>
                <option value="south korean">South Korean</option>
                <option value="spanish">Spanish</option>
                <option value="sri lankan">Sri Lankan</option>
                <option value="sudanese">Sudanese</option>
                <option value="surinamer">Surinamer</option>
                <option value="swazi">Swazi</option>
                <option value="swedish">Swedish</option>
                <option value="swiss">Swiss</option>
                <option value="syrian">Syrian</option>
                <option value="taiwanese">Taiwanese</option>
                <option value="tajik">Tajik</option>
                <option value="tanzanian">Tanzanian</option>
                <option value="thai">Thai</option>
                <option value="togolese">Togolese</option>
                <option value="tongan">Tongan</option>
                <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                <option value="tunisian">Tunisian</option>
                <option value="turkish">Turkish</option>
                <option value="tuvaluan">Tuvaluan</option>
                <option value="ugandan">Ugandan</option>
                <option value="ukrainian">Ukrainian</option>
                <option value="uruguayan">Uruguayan</option>
                <option value="uzbekistani">Uzbekistani</option>
                <option value="venezuelan">Venezuelan</option>
                <option value="vietnamese">Vietnamese</option>
                <option value="welsh">Welsh</option>
                <option value="yemenite">Yemenite</option>
                <option value="zambian">Zambian</option>
                <option value="zimbabwean">Zimbabwean</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label>PRC License No.</label
              ><input
                type="number"
                name="prcNo"
                id="prcNo"
                pattern="\d{7}"
                title="Enter a valid 7-digit PRC License No."/>
            </div>
            <div class="form-group">
              <label>PRC Validity</label><input name="prcValidity" type="date" id="prcValidity" />
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label>With Health Permit?</label
              ><select name="healthPermit" id="healthPermit">
                <option value="" disabled selected>-- Yes or No --</option>
                <option>Yes</option>
                <option>No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Permit Validity</label
              ><input name="permitValidity" type="date" id="permitValidity" />
            </div>
          </div>
        </div>
        <!-- Employment Info Section -->
        <div class="section-box">
          <h3 class="section-title">Employment Information</h3>
          <div class="row">
            <div class="form-group">
              <label>Employee ID No.</label
              ><input name="empID" type="number" id="empID" required />
            </div>
            <div class="form-group">
              <label>Status</label
              ><select name="status" id="status" required>
                <option value="" disabled selected>-- select one --</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="terminated">Terminated</option>
              </select>
            </div>
            <div class="form-group">
              <label>Reason for Termination</label
              ><input type="text" name="reasonTermination" id="reasonTermination"/>
            </div>
          </div>
          <div class="row"> 
          <div class="form-group">
              <label>Type</label><select name="type" id="type" required>
                <option value="" disabled selected>-- select one --</option>
                <option value="probationary">Probationary</option>
                <option value="regular">Regular</option>
                <option value="fixed">Fixed</option>
                <option value="oncall">On Call</option>
                <option value="consultant">Consultant</option>
                <option value="ojt">OJT</option>
              </select>
            </div>
            <div class="form-group">
              <label>Position</label
              ><input name="position" type="text" id="position" required />
            </div>
            <div class="form-group">
              <label>Department</label
              ><select name="department" id="department" required>
                <option value="" disabled selected>-- select one --</option>
                <option>Admin</option>
                <option>Ancillary Services</option>
                <option>Clinic Management</option>
                <option>Customer Services</option>
                <option>Finance</option>
                <option>Human Resources</option>
                <option>Imaging</option>
                <option>Laboratory</option>
                <option>Medical Exam & Evaluation</option>
                <option>Nursing</option>
                <option>Psychometry</option>
                <option>Records</option>
                <option>Registration</option>
                <option>Sales</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label>Start Date</label
              ><input name="startDate" type="date" id="startDate" name="startDate" required/>
            </div>
            <div class="form-group">
              <label>End Date</label><input name="endDate" type="date" id="endDate" />
            </div>
            <div class="form-group">
              <label>Salary</label><input name="salary" type="number" id="salary" />
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label>PEP Score</label
              ><input type="number" id="pepScore" name="pepScore" min="1" max="5"/>
            </div>
            <div class="form-group">
              <label>PEP Period Covered</label
              ><select name="periodCovered" id="periodCovered" min="1" max="5">
              </select>
            </div>
            <div class="form-group">
              <label>Infraction</label
              ><input type="text" id="infraction" name="infraction" min="1" max="5"/>
            </div>
          </div>
          </div>
        </div>
          <!-- Employment History Section -->
    <div class="section-box">
        <h3 class="section-title">Employment History</h3>
        <div id="employmentHistory"></div>
        <button type="button" class="addEntry" id="addEntry">+ Add Experience</button>
    </div>
    <!-- Employee Movement Section -->
    <div class="section-box">
        <h3 class="section-title">Employee Movement</h3>
        <div id="employeeMovement"></div>
        <button type="button" class="addEntry" id="addMovement">+ Add Movement</button>
    </div>
        <!-- Government Contributions -->
        <div class="section-box">
          <h3 class="section-title">Government ID's Number</h3>
          <div class="row">
            <div class="form-group">
              <label>Pag-IBIG No.</label><input name="pagibigNo" type="number" id="pagibigNo" />
            </div>
            <div class="form-group">
              <label>SSS No.</label><input name="sssNo" type="number" id="sssNo"/>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label>PhilHealth No.</label
              ><input name="philhealthNo" type="text" id="philhealthNo" />
            </div>
            <div class="form-group">
              <label>TIN</label><input name="tin" type="text" id="tin" />
            </div>
          </div>
          <!-- Emergency Contact -->
          <h3 class="section-title">Emergency Contact</h3>
          <div class="row">
            <div class="form-group">
              <label>First Name</label
              ><input name="emergencyPersonFirst" type="text" id="emergencyPersonFirst" required/>
            </div>
            <div class="form-group">
              <label>Middle Name</label
              ><input name="emergencyPersonMiddle" type="text" id="emergencyPersonMiddle" />
            </div>
            <div class="form-group">
              <label>Last Name</label
              ><input name="emergencyPersonLast" type="text" id="emergencyPersonLast" required/>
            </div>
          </div>
          <div class="row">
            <div class="form-group emergency-address">
              <label>Address</label><input name="emergencyAddress" type="text" id="emergencyAddress" required/>
            </div>
            <div class="form-group emergency-contact">
                <label>Contact No.</label>
                <input
                  type="tel"
                  name="emergencyContact"
                  id="emergencyContact"
                  required
                  pattern="\d{11}"
                  title="Enter a valid 11-digit phone number"/>
                <span id="error-message-em" style="color: red; font-size: 10px;"></span>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="checkbox-group">
              <input name="sameAddress" type="checkbox" id="sameAddress" />
              <label for="sameAddress">Same as the address above?</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="cancelBtn" name="cancelBtn" class="cancel-btn">Cancel</button>
          <button type="submit" id="submitBtn" name="submitBtn" class="submit-btn">Submit</button>
        </div>
        </form>
      </div>
    </div>
    <!-- Employee Details Modal -->
    <div id="employeeDetailsModal" class="employee-modal">
        <div class="employee-modal-content">
          <div class="employee-modal-header">
            <h2>EMPLOYEE INFORMATION</h2>
            <button onclick="printEmployeeDetails()" id="employee-print-btn" class="bi bi-printer">  PRINT</button>
            <span id="detailStatusBadge" class="employee-status-badge">ACTIVE</span>
            <button onclick="closeDetailsModal()" class="employee-ekis-btn">&times;</button>
          </div>
          <div class="employee-section-first">
            <div class="employee-section-title">PERSONAL INFORMATION</div>
            <div class="employee-section-content employee-grid-2">
              <p><strong>Name:</strong> <span id="detailFullName"></span></p>
              <p><strong>Sex:</strong> <span id="detailSex"></span></p>
              <p><strong>Contact No.:</strong> <span id="detailContactNo"></span></p>
              <p><strong>Birthdate:</strong> <span id="detailBirthdate"></span></p>
              <p><strong>Email:</strong> <span id="detailEmail"></span></p>
              <p><strong>Address:</strong> <span id="detailAddress"></span></p>
              <p><strong>Marital Status:</strong> <span id="detailMaritalStatus"></span></p>
              <p><strong>Religion:</strong> <span id="detailReligion"></span></p>
              <p><strong>Nationality:</strong> <span id="detailNationality"></span></p>
              <p><strong></strong> <span id=""></span></p>
              <p><strong>PRC License No.:</strong> <span id="detailPRCNo"></span></p>
              <p><strong>PRC Expiry:</strong> <span id="detailPRCExpiry"></span></p>
              <p><strong></strong> <span id="detailHealthPermit"></span></p>
              <p><strong>Health Permit Validity:</strong> <span id="detailPermitValidity"></span></p>
            </div>
          </div>
          <div class="employee-section">
            <div class="employee-section-title">EMPLOYMENT INFORMATION</div>
            <div class="employee-section-content employee-grid-2">
              <p><strong>Employee ID:</strong> <span id="detailEmpID"></span></p>
              <p><strong>Position:</strong> <span id="detailPosition"></span></p>
              <p><strong>Department:</strong> <span id="detailDepartment"></span></p>
              <p><strong>Type:</strong> <span id="detailType"></span></p>
              <p><strong>Status:</strong> <span id="detailStatus"></span></p>
              <p><strong>Reason for Termination:</strong> <span id="detailReasonTermination"></span></p>
              <p><strong>Start Date:</strong> <span id="detailStartDate"></span></p>
              <p><strong>End Date:</strong> <span id="detailEndDate"></span></p>
              <p><strong>Salary:</strong> <span id="detailSalary"></span></p>
              <p><strong>PEP:</strong> <span id="detailPepScore"></span></p>
              <p><strong>Period Covered:</strong> <span id="detailPeriodCovered"></span></p>
              <p><strong>Infraction:</strong> <span id="detailInfraction"></span></p>
            </div>
          </div>
          <div class="employee-section">
            <div class="employee-section-title">EMPLOYMENT HISTORY</div>
            <div class="employee-section-content employee-grid-2" id="employmentHistoryContent">
              <!-- Employment history details will be dynamically inserted here -->
            </div>
          </div>
          <div class="employee-section">
            <div class="employee-section-title">EMPLOYEE MOVEMENT</div>
            <div class="employee-section-content employee-grid-2" id="employeeMovementContent">
              <!-- Employment history details will be dynamically inserted here -->
            </div>
          </div>
          <div class="employee-section">
            <div class="employee-section-title">GOVERNMENT ID NOs.</div>
            <div class="employee-section-content employee-grid-2">
              <p><strong>PAGIBIG No.:</strong> <span id="detailPagibigNo"></span></p>
              <p><strong>SSS No.:</strong> <span id="detailSSSNo"></span></p>
              <p><strong>Philhealth No.:</strong> <span id="detailPhilhealthNo"></span></p>
              <p><strong>TIN:</strong> <span id="detailTIN"></span></p>
            </div>
          </div>
          <div class="employee-section">
            <div class="employee-section-title">EMERGENCY CONTACT</div>
            <div class="employee-section-content employee-grid-2">
              <p><strong>Name:</strong> <span id="detailEmergencyPerson"></span></p>
              <p><strong>Contact No.:</strong> <span id="detailEmergencyContact"></span></p>
              <p><strong>Address:</strong> <span id="detailEmergencyAddress"></span></p>
            </div>
          </div>
          <div class="employee-modal-footer">
            <button onclick="closeDetailsModal()" class="employee-close-btn">Close</button>
          </div>
        </div>
      </div>
        <!-- Employee Table -->
        <div class="table-container">
            <h1 class="dept-title">ADMIN DEPARTMENT</h1>
            <table id="employeeTable">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>EMP. ID</th>
                    <th id="nameHeader" style="cursor:pointer;">FULL NAME ▲</th>
                    <th>POSITION</th>
                    <th>TYPE</th>
                    <th>DATE HIRED</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Employee data rows will be added here -->
                </tbody id="employeeData">
              </table>
        </div>
        <script src="admin.js"></script>  
        <script src="adminEmpCount.js" defer></script>  
  </body>
</html>
<?php
include 'employee_db.php'; // Ensure database connection

if (isset($_POST['submitBtn'])) {
    // Capture form inputs
    $empID = mysqli_real_escape_string($conn, $_POST["empID"]);
    $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $middleName = mysqli_real_escape_string($conn, $_POST["middleName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $position = mysqli_real_escape_string($conn, $_POST["position"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $startDate = mysqli_real_escape_string($conn, $_POST["startDate"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $sex = mysqli_real_escape_string($conn, $_POST["sex"]);
    $birthdate = mysqli_real_escape_string($conn, $_POST["birthdate"]);
    $contactNo = mysqli_real_escape_string($conn, $_POST["contactNo"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $maritalStatus = mysqli_real_escape_string($conn, $_POST["maritalStatus"]);
    $religion = mysqli_real_escape_string($conn, $_POST["religion"]);
    $nationality = mysqli_real_escape_string($conn, $_POST["nationality"]);
    $prcNo = mysqli_real_escape_string($conn, $_POST["prcNo"]);
    $prcValidity = mysqli_real_escape_string($conn, $_POST["prcValidity"]);
    $healthPermit = mysqli_real_escape_string($conn, $_POST["healthPermit"]);
    $permitValidity = mysqli_real_escape_string($conn, $_POST["permitValidity"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);
    $reasonTermination = mysqli_real_escape_string($conn, $_POST["reasonTermination"]);
    $endDate = mysqli_real_escape_string($conn, $_POST["endDate"]);
    $salary = mysqli_real_escape_string($conn, $_POST["salary"]);
    $pepScore = mysqli_real_escape_string($conn, $_POST["pepScore"]);
    $periodCovered = isset($_POST["periodCovered"]) ? mysqli_real_escape_string($conn, $_POST["periodCovered"]) : "";
    $infraction = mysqli_real_escape_string($conn, $_POST["infraction"]);
    $pagibigNo = mysqli_real_escape_string($conn, $_POST["pagibigNo"]);
    $sssNo = mysqli_real_escape_string($conn, $_POST["sssNo"]);
    $philhealthNo = mysqli_real_escape_string($conn, $_POST["philhealthNo"]);
    $tin = mysqli_real_escape_string($conn, $_POST["tin"]);
    $emergencyPersonFirst = mysqli_real_escape_string($conn, $_POST["emergencyPersonFirst"]);
    $emergencyPersonMiddle = mysqli_real_escape_string($conn, $_POST["emergencyPersonMiddle"]);
    $emergencyPersonLast = mysqli_real_escape_string($conn, $_POST["emergencyPersonLast"]);
    $emergencyAddress = mysqli_real_escape_string($conn, $_POST["emergencyAddress"]);
    $emergencyContact = mysqli_real_escape_string($conn, $_POST["emergencyContact"]);
    $fullName = "$firstName $middleName $lastName";

        // Insert new employee
        $query = "INSERT INTO admin_emp (empID, fullName, firstName, middleName, lastName, position, type, startDate, status, sex, 
            birthdate, contactNo, email, address, maritalStatus, religion, nationality, prcNo, prcValidity, healthPermit, 
            permitValidity, department, reasonTermination, endDate, salary, pepScore, periodCovered, infraction, pagibigNo, sssNo, philhealthNo, 
            tin, emergencyPersonFirst, emergencyPersonMiddle, emergencyPersonLast, emergencyAddress, emergencyContact) 
            VALUES ('$empID', '$fullName', '$firstName', '$middleName', '$lastName', '$position', '$type', '$startDate', 
            '$status', '$sex', '$birthdate', '$contactNo', '$email', '$address', '$maritalStatus', '$religion', 
            '$nationality', '$prcNo', '$prcValidity', '$healthPermit', '$permitValidity', '$department', '$reasonTermination', '$endDate', 
            '$salary', '$pepScore', '$periodCovered', '$infraction', '$pagibigNo', '$sssNo', '$philhealthNo', '$tin', 
            '$emergencyPersonFirst', '$emergencyPersonMiddle', '$emergencyPersonLast', '$emergencyAddress', '$emergencyContact')
            ON DUPLICATE KEY UPDATE 
                fullName = VALUES(fullName), 
                firstName = VALUES(firstName), 
                middleName = VALUES(middleName), 
                lastName = VALUES(lastName),
                position = VALUES(position),
                type = VALUES(type),
                startDate = VALUES(startDate),
                status = VALUES(status),
                sex = VALUES(sex),
                birthdate = VALUES(birthdate),
                contactNo = VALUES(contactNo),
                email = VALUES(email),
                address = VALUES(address),
                maritalStatus = VALUES(maritalStatus),
                religion = VALUES(religion),
                nationality = VALUES(nationality),
                prcNo = VALUES(prcNo),
                prcValidity = VALUES(prcValidity),
                healthPermit = VALUES(healthPermit),
                permitValidity = VALUES(permitValidity),
                department = VALUES(department),
                reasonTermination = VALUES(reasonTermination),
                endDate = VALUES(endDate),
                salary = VALUES(salary),
                pepScore = VALUES(pepScore),
                periodCovered = VALUES(periodCovered),
                infraction = VALUES(infraction),
                pagibigNo = VALUES(pagibigNo),
                sssNo = VALUES(sssNo),
                philhealthNo = VALUES(philhealthNo),
                tin = VALUES(tin),
                emergencyPersonFirst = VALUES(emergencyPersonFirst),
                emergencyPersonMiddle = VALUES(emergencyPersonMiddle),
                emergencyPersonLast = VALUES(emergencyPersonLast),
                emergencyAddress = VALUES(emergencyAddress),
                emergencyContact = VALUES(emergencyContact)";

        if (mysqli_query($conn, $query)) {
            //echo json_encode(["success" => "New employee added successfully"]);
        } else {
            echo json_encode(["error" => mysqli_error($conn)]);
        }
    mysqli_close($conn);
}
?>
