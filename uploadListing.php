<form action="listingsDatabase.php" method="POST">
        <label for="time">Subletting Season:</label>
        <select name = "time">
            <option value = "Summer">Summer</option>
            <option value = "Spring">Spring</option>
            <option value = "Fall">Fall</option>
            <option value = "Full Year">Full Year</option>
        </select>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" />
      
        <label for="year">Year:</label>
        <input type="text" name="year" id="year" />

        <label for="bedrooms">Number of bedrooms:</label>
        <input type="text" name="bedrooms" id="bio"/>
       
        <label for="bathrooms">Number of bathrooms:</label>
        <input type="text" name="bathrooms" id="bathrooms"/>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description"/>

        <label for="link">Link to zillow listing</label>
        <input type="text" name="link" id="link"/>

        <label for="address">address</label>
        <input type="text" name="address" id="address"/>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
       
        <input type="submit" value="Upload Profile" />
</form>


        