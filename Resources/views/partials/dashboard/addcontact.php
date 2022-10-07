<article class="dashform__main">
    <h2>Add Contact</h2>
    <hr>
    <div id="tabs">
        <form action="/contact" method="post" class="dashform__form">
            <input type="text" name="fname" class="dashform__input" placeholder="Firstname">
            <input type="text" name="lname" class="dashform__input" placeholder="Lastname">
            <input type="email" name="email" class="dashform__input" placeholder="E-mail">
            <input type="text" name="phone" class="dashform__input" placeholder="Phone">
            <select name="company" id="" class="dashform__select">
                <option value="">-- Select a company --</option>
                // data = name company in companies
                <?php
                    foreach($data["companies"]['datas'] as $item){?>
                <option value="<?= $item->id ?>"><?= $item->Name ?></option>;
                <?php } ?>
            </select>
            <input type="file" name="photo" class="dashform__file">
            <input type="submit" class="dashform__submit" value="Submit">
        </form>

        <div id="listinvoice" class="tableWrapper">
            <?php echo insertTable( $data['companies'],'addcontact')?>
        </div>
    </div>
</article>