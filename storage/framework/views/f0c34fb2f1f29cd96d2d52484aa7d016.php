<div>
    <style>
        .section {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #ddd;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            flex: 1;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            color: black;
            text-align: center;
            transition: all 0.3s ease;
        }

        .box:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .profit-box {
            background: gold;
        }

        .profit-box.negative {
            background: rgb(241, 105, 105);
        }

        /* date */
        .date-range-container {
            display: flex;
            /* Arrange labels and inputs horizontally */
            align-items: center;
            /* Vertically align labels with inputs */
            margin-bottom: 1rem;
            /* Add some spacing below the date range */
        }

        .date-range-container label {
            margin-right: 1rem;
            /* Space between label and input */
            font-weight: bold;
            /* Emphasize labels */
        }

        .date-range-container input[type="date"] {
            padding: 0.5rem 1rem;
            /* Adjust padding for a balanced look */
            border: 1px solid #ccc;
            /* Basic border */
            border-radius: 4px;
            /* Rounded corners */
        }
    </style>
    <div class="date-range-container">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" wire:model.live="startDate">

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" wire:model.live="endDate">
    </div>

    <div class="container">
        <div class="box" style="background:rgb(129, 252, 129);">
            <p style="font-weight: bold;">Revenue:</p>
            <p style="font-size: 30px; font-family:cursive"><?php echo e($totalAmountRevenue); ?>$</p>
        </div>
        <div class="box" style="background:rgb(253, 159, 159);">
            <p style="font-weight: bold;">Expense:</p>
            <p style="font-size: 30px; font-family:cursive"><?php echo e($totalAmountExpense); ?>$</p>
        </div>
        <div class="box"style="background: <?php echo e($totalAmountProfit < 0 ? 'rgb(241, 105, 105)' : 'gold'); ?>;">
            <p style="font-weight: bold;">Profits:</p>
            <div>
                <p style="font-size: 30px; font-family:cursive"><?php echo e($totalAmountProfit); ?>$</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box" style="background: rgb(252, 248, 196)">
            <p style="font-weight: bold;">Total User: <i class="fa-solid fa-user"></i></p>
            <p style="font-size: 30px; font-family:cursive"><?php echo e($totalUser); ?></p>
        </div>
        <div class="box" style="background: rgb(252, 248, 196)">
            <p style="font-weight: bold;">Total Product: <i class="fa-brands fa-product-hunt"></i> </p>
            <p style="font-size: 30px; font-family:cursive"><?php echo e($totalProduct); ?></p>
        </div>

        <div class="box" style="background: rgb(252, 248, 196)">
            <p style="font-weight: bold;">Number of Products with Quantity >0 : <i class="fa-solid fa-warehouse"></i>
            </p>
            <p style="font-size: 30px; font-family:cursive"><?php echo e($productCount); ?></p>
        </div>
    </div>

    
    <div>

        <!-- Display quantities by brand -->
        <div class="section">
            <h2>Quantities by Brand</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Total Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $quantitiesByBrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($quantity->productbrand->brand); ?></td>
                            <td><?php echo e($quantity->total_quantity); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <!-- Display quantities by category -->
        <div class="section">
            <h2>Quantities by Category</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Total Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $quantitiesByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($quantity->productcategory->category_name); ?></td>
                            <td><?php echo e($quantity->total_quantity); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>


        

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Render your charts here using JavaScript -->
        <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
            <div>
        <h2 style="font-size: 40px">Brand Quantity Chart</h2>
        <canvas id="brandChart" style="height: 400px !important"></canvas>
    </div>
</div>
        
        <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
            <div>
              <h2 style="font-size: 40px">Category Quantity Chart</h2>
              <canvas id="categoryChart" style="height: 400px !important"></canvas>
            </div>
          </div>


        <script>
            var brandData = <?php echo json_encode($quantitiesByBrand, 15, 512) ?>;
            var categoryData = <?php echo json_encode($quantitiesByCategory, 15, 512) ?>;

            // Function to generate a random color in hexadecimal format
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            // Use brandData and categoryData to create Chart.js charts
            // Example:
            var brandChart = new Chart(document.getElementById('brandChart'), {
                type: 'pie',
                data: {
                    labels: brandData.map(data => data.productbrand.brand),
                    datasets: [{
                        label: 'Total Quantity by Brand',
                        data: brandData.map(data => data.total_quantity),
                        backgroundColor: brandData.map(() =>
                    getRandomColor()), // Generate random color for each dataset
                        borderColor: brandData.map(() => getRandomColor()), // Border color can also be random
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false
                }
            });


            // Function to generate random RGB color
function randomColor() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgba(${r}, ${g}, ${b}, 0.2)`;
}

// Create the chart with random colors
var categoryChart = new Chart(document.getElementById('categoryChart'), {
    type: 'bar',
    data: {
        labels: categoryData.map(data => data.productcategory.category_name),
        datasets: [{
            label: 'Total Quantity by Category',
            data: categoryData.map(data => data.total_quantity),
            backgroundColor: categoryData.map(() => randomColor()), // Generate random colors
            borderColor: categoryData.map(() => randomColor()), // Use the same random colors for border
            borderWidth: 1
        }]
    },
    options: {
        responsive: false
    }
});

        </script>

    </div>
<?php /**PATH C:\Users\Seiv Yi\Downloads\dd\E_commerce\resources\views\livewire\pages\admin\report\report-component.blade.php ENDPATH**/ ?>