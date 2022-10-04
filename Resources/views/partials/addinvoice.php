<article class="dashform__main">
    <h2>Add invoice</h2>
    <hr>
    <form action="/invoice" method="post" class="dashform__form">
        <input type="text" name="ref" class="dashform__input" placeholder="Reference">
        <input type="text" name="price" class="dashform__input" placeholder="Price">
        <select name="company" id="" class="dashform__select">
            <?php
                foreach($data[0]['datas'] as $item){?>
                     <option value="<?= $item->id ?>"><?= $item->Name ?></option>;
               <?php } ?>
        </select>
        <input type="submit" value="Submit" class="dashform__submit">
    </form>
</article>