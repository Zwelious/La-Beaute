// Wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    // Debugging: Check if the DOMContentLoaded event is fired
    console.log('DOMContentLoaded event fired');

    // Get the context of the canvas element we want to select
    var ctx = document.getElementById("myBarChart").getContext('2d');

    // Debugging: Check if the canvas element is found
    console.log('Canvas element:', ctx);

    // Bar Chart Example
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June"],
            datasets: [{
                label: "Revenue",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: [4215, 5312, 6251, 7841, 9821, 14984],
            }],
        },
        options: {
            maintainAspectRatio: false,
            // Add your other options here
        }
    });
});
