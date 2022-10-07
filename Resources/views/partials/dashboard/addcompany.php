<?php
//dd($data[0]);
//?>
<script defer src="/js/dashboardTabs.js"></script>
<article class="dashform__main">
    <h2>Add Company</h2>
    <hr>
    <div id="tabs">
        <nav>
            <button class="list tabs__buttons" type="button">List Invoice</button>
            <button class="form tabs__buttons" type="button">Add Invoice</button>
        </nav>
        <form action="/companies" method="post" class="dashform__form">
            <input type="text" name="company" class="dashform__input" placeholder="Company">
            <input type="text" name="country" class="dashform__input" placeholder="Country">
            <input type="text" name="tva" class="dashform__input" placeholder="Tva">
            <select name="type" id="" class="dashform__select">
                <?php
                //data = type_id
                foreach($data['types']as $item){?>
                    <option value="<?= $item->id ?>"><?= $item->name ?></option>;
                <?php } ?>
            </select>
            <input type="submit" value="Submit" class="dashform__submit">
        </form>

        <div id="listinvoice" class="tableWrapper">
            <?php echo insertTable( $data['companies'],'addcompany')?>
        </div>
    </div>
</article>