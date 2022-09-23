<div>
    <h2>Add Contact</h2>
    <form action="" method="post">
        <div>
            <label for="fname">First Name</label>
            <input type="text" name="fname">
        </div>

        <div>
            <label for="lname">Last Name</label>
            <input type="text" name="lname">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone">
        </div>
        <div>
            <label for="company">Ref</label>
            <select name="company" id="">
                <?php
                // data = name company in companies
                foreach ($data as $item){
                    echo "<option value='$item'>$item</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="photo">Add Photo</label>
            <input type="file" name="photo">
        </div>
        <button type="submit">Save</button>
    </form>
</div>