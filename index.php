<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filing of Leave of Absence</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="hero" id="home">
        <div class="hero-content">

            <h1>Filing of Leave <span>of Absence</span></h1>

            <a href="#application" class="btn">Apply for Leave</a>
        </div>

        <div class="hero-card">
            <div class="glass-card">
                <div class="card-icon">📋</div>
                <h2>Leave Application</h2>
                <p>Make your leave request, anytime and anywhere.</p>

                <div class="card-line"></div>
            </div>
        </div>
    </section>

    <section class="application" id="application">
        <div class="form-container">
            <div class="form-heading">
                <p class="subtitle">ONLINE APPLICATION</p>
                <h2>Leave of Absence Form</h2>
                <p>Please complete the information below.</p>
            </div>

            <form id="leaveForm" action="process.php" method="POST">
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
    </div>

    <div class="form-group">
        <label for="studentid">Student Number</label>
        <input type="text" id="studentid" name="studentid" placeholder="Enter your student number" required>
    </div>

    <div class="form-group">
        <label for="committee">Committee / Position</label>
        <input type="text" id="committee" name="committee" placeholder="Enter your committee or position" required>
    </div>

    <div class="form-group">
        <label for="leavetype">Type of Leave</label>
        <select id="leavetype" name="leavetype" required>
            <option value="">Select leave type</option>
            <option value="Personal">Personal</option>
            <option value="Medical">Medical</option>
            <option value="Academic">Academic</option>
            <option value="Emergency">Emergency</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="startdate">Start Date</label>
            <input type="date" id="startdate" name="startdate" required>
        </div>

        <div class="form-group">
            <label for="enddate">End Date</label>
            <input type="date" id="enddate" name="enddate" required>
        </div>
    </div>

    <div class="form-group">
        <label for="reason">Reason for Leave</label>
        <textarea id="reason" name="reason" rows="4" placeholder="Please explain your reason..." required></textarea>
    </div>

    <button type="submit" class="submit-btn">Submit Application</button>

    <p id="message"></p>
</form>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>