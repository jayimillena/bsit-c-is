<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
</head>
<body>

    <form action="index.php" method="POST" name="notebook inventory">
        <label for="notebook">Notebook:</label>
        <input type="text" id="notebook" name="notebook" required>
        <br><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <br><br>
        <input type="submit" value="Add to Inventory">

    </form>
    
    <?php 

        $notebook = $_POST['notebook'] ?? '';
        $quantity = $_POST['quantity'] ?? '';
        
        if (!empty($notebook) && !empty($quantity)) {
            $file = fopen('inventory.txt', 'a');
            fwrite($file, "Notebook: $notebook, Quantity: $quantity\n");
            fclose($file);
            echo "<p>Added to inventory: Notebook - $notebook, Quantity - $quantity</p>";
        }

        foreach (file('inventory.txt') as $line) {
            echo "<p>$line</p>";
        }
        
    ?>
</body>
</html>