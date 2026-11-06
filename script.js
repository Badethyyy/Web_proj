const leaveForm = document.getElementById("leaveForm");
const message = document.getElementById("message");

leaveForm.addEventListener("submit", function(event) {
    const startDate = new Date(document.getElementById("startdate").value);
    const endDate = new Date(document.getElementById("enddate").value);

    if (endDate < startDate) {
        event.preventDefault();
        message.textContent = "End date cannot be earlier than start date.";
        message.style.color = "#FF6F32";
    }
});