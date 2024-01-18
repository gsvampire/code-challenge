<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
    <title>食品卡车资源管理器</title></head>
<body><h1>食品卡车资源管理器</h1>
<button onclick="getFoodTrucks()">获取餐车</button>
<div id="foodTruckList"></div>
<script> function getFoodTrucks() {
        fetch('index.php?action=getFoodTrucks').then(response => response.json()).then(data => {
            displayFoodTrucks(data);
        });
    }

    // 函数
    displayFoodTrucks(foodTrucks)
    {
        const foodTruckList = document.getElementById('foodTruckList');
        foodTruckList.innerHTML = '';
        foodTrucks.forEach(truck => {
            const TruckElement = document.createElement('div');
            TruckElement.textContent = Truck.name;
            foodTruckList.appendChild(truckElement);
        });
    } </script>
</body>
</html>
