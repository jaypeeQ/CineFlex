<div class="register-window-input">
    <div class="container mt-3">


    <form class="col-sm-8 needs-validation" novalidate method="post" action="PHP/registerphp.php">


        <label class="form-label">First name</label>
        <input type="text" class="form-control" name="firstname" required>

        <label class="form-label">Insertion</label>
        <input type="text" class="form-control" name="insertion" required>

        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastname" required>

        <label class="form-label">Birth Date</label>
        <input type="date" class="form-control" name="birthdate" required>

        <label class="form-label">City</label>
        <input type="text" class="form-control" name="city" required>

        <label class="form-label">Postcode</label>
        <input type="text" class="form-control" name="postcode" required>

        <label class="form-label">House Number</label>
        <input type="text" class="form-control" name="housenumber" required>

        <label class="form-label">Phone number</label>
        <input type="text" class="form-control" name="phonenumber" required>

        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>

        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>
</div>
</div>