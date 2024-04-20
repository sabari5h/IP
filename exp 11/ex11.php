<!DOCTYPE html>
<html>
<head>
    <title>Address Form</title>
</head>
<body>
    <h2>Address Form</h2>
    <form method="post">
        Address: <input type="text" name="address"><br><br>
        City: <input type="text" name="city"><br><br>
        State (2-letter abbreviation): <input type="text" name="state" maxlength="2"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    function isValidState($state) {
        $valid_states = array(
            'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA',
            'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD',
            'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ',
            'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC',
            'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY'
        );
        return in_array($state, $valid_states);
    }

    if(isset($_POST['submit'])) {
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = strtoupper($_POST['state']); 

        if(empty($address) || empty($city) || empty($state)) {
            echo "<p>Please fill out all fields.</p>";
        } elseif (!isValidState($state)) {
            echo "<p>Please enter a valid two-letter state abbreviation.</p>";
        } else {
            $servername = "localhost";
            $username = "username"; 
            $password = "password"; 
            $dbname = "addresses";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO addresses (address, city, state) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $address, $city, $state);

            if ($stmt->execute() === TRUE) {
                echo "<p>Address inserted successfully.</p>";
            } else {
                echo "<p>Error inserting address: " . $conn->error . "</p>";
            }

            $stmt->close();
            $conn->close();
        }
    }
    ?>
</body>
</html>
