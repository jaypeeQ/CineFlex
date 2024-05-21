<div class="container mt-3 p-3" xmlns="http://www.w3.org/1999/html">
    <form action="PHP/CinemaCrud/cinemaadd.php" method="post">
        <h3>Add Cinema</h3>


        <div class="mb-3 mt-3 row">
            <div class="p-1 col-3">
                <label class="form-label">Cinema Name: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="cinemaname" placeholder="Enter Cinema Name" required>
            </div>
        </div>

        <div class="mb-3 mt-3 row">
            <div class="p-1 col-3">
                <label class="form-label">City: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="city" placeholder="Enter Cinema Name" required>
            </div>
        </div>

        <div class="mb-3 mt-3 row">
            <div class="p-1 col-3">
                <label class="form-label">House Number: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="housenumber" placeholder="Enter Cinema Address Number" required>
            </div>
        </div>

        <div class="mb-3 mt-3 row">
            <div class="p-1 col-3">
                <label class="form-label">Phone Number: </label>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="phonenumber" placeholder="Enter Company Telephone number" required>
            </div>
        </div>

        <div class="mb-3 mt-3 row">
            <div class="p-1 col-3">
                <label class="form-label">Post Code: </label>
            </div>
            <div class="p col-3">
                <input type="text" class="form-control" name="postcode" placeholder="Enter Postcode" required>
            </div>
        </div>
        </p>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>