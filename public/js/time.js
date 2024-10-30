function updateDateTime() {
    const now = new Date();
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true }; // 12-hour format with AM/PM

    const formattedDate = now.toLocaleDateString('en-US', dateOptions);
    const formattedTime = now.toLocaleTimeString('en-US', timeOptions);

    document.getElementById('currentdatetime').textContent = `${formattedDate}, ${formattedTime}`;
}

// Update the date and time every second
setInterval(updateDateTime, 1000);
