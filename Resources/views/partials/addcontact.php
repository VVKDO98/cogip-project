<article class="addcontact__main">
    <h2>Add Contact</h2>
    <hr>
    <form action="" method="post" class="addcontact__form">
        <input type="text" name="fname" class="addcontact__input" placeholder="Firstname">
        <input type="text" name="lname" class="addcontact__input" placeholder="Lastname">
        <input type="email" name="email" class="addcontact__input" placeholder="E-mail">
        <input type="text" name="phone" class="addcontact__input" placeholder="Phone">
        <select name="company" id="" class="addcontact__select">
            <option value="">-- Select a company --</option>
            <?php
            // data = name company in companies
            foreach ($data as $item){
                echo "<option value='$item'>$item</option>";
            }
            ?>
        </select>
        <input type="file" name="photo">
        <button type="submit" class="addcontact__submit">Submit</button>
    </form>
</article>