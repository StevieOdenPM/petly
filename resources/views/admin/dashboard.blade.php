<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Overview</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-gray-500">Today's Revenue</p>
                <p class="text-xl font-bold">IDR xxxxxxxxx</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-gray-500">Total Sales</p>
                <p class="text-xl font-bold">xxxxx</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-gray-500">Website Visit</p>
                <p class="text-xl font-bold">xxxx</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-gray-500">New Members</p>
                <p class="text-xl font-bold">xxx</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-gray-500">Active Users</p>
                <p class="text-xl font-bold">xxxx</p>
            </div>
        </div>
        
        <h2 class="text-xl font-bold mb-2">Quantity of Products Sold</h2>
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <canvas id="salesChart"></canvas>
        </div>
        
        <h2 class="text-xl font-bold mb-2">Transaction History</h2>
        <div class="bg-white shadow rounded-lg p-4 overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-4 text-left">Transaction ID</th>
                        <th class="py-3 px-4 text-left">Date</th>
                        <th class="py-3 px-4 text-left">Amount</th>
                        <th class="py-3 px-4 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4">TRxxx</td>
                        <td class="py-3 px-4">xxx xx, xxx</td>
                        <td class="py-3 px-4">xxxxx</td>
                        <td class="py-3 px-4">
                            <span class="bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full">In Progress</span>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4">TRxxx</td>
                        <td class="py-3 px-4">xxx xx, xxx</td>
                        <td class="py-3 px-4">xxxxx</td>
                        <td class="py-3 px-4">
                            <span class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">Confirmed</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100">
                    <td class="py-3 px-4">TRxxx</td>
                        <td class="py-3 px-4">xxx xx, xxx</td>
                        <td class="py-3 px-4">xxxxx</td>
                        <td class="py-3 px-4">
                            <span class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">Confirmed</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('/api/line-chart')
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('salesChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Sales',
                                data: data.data,
                                borderColor: 'red',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            }]
                        }
                    });
                });
        });
    </script>
</body>
</html>