<script defer src="/js/dashboardEdit.js"></script>
<div class="dashform__main">
    <div id="tabs">
        <form method="post" action="/update/contact" class="dashform__form">
            <input type="hidden" name="id" class="dashform__input" value="<?= $data['contacts'][0]->id  ?>">
            <label for="name" class="dashform__label">Name</label>
            <input type="text" name="name" class="dashform__input" id="name" value="<?= $data['contacts'][0]->Contact ?>"  data-default="<?= $data['contacts'][0]->Contact ?>" disabled>
            <label for="email" class="dashform__label">Email</label>
            <input type="email" name="email" class="dashform__input" id="email" value="<?= $data['contacts'][0]->Email ?>"  data-default="<?= $data['contacts'][0]->Email ?>" disabled>
            <label for="phone" class="dashform__label">Phone</label>
            <input type="text" name="phone" class="dashform__input" id="phone" value="<?= $data['contacts'][0]->Phone ?>"  data-default="<?= $data['contacts'][0]->Phone ?>" disabled>
            <label for="company" class="dashform__label">Company</label>
            <select name="company" id="company" class="dashform__select" disabled data-default="<?= $data['contacts'][0]->company_id ?>">
                <?php
                foreach ($data['companies']['datas'] as $item):
                    ?>
                    <option value="<?= $item->id ?>" <?=  $data['contacts'][0]->company_id==$item->id? 'selected="selected"':''; ?> ><?= $item->Name ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" id="update" class="dashform__submit" style="display: none">Update</button>
            <button type="button" id="cancel" class="dashform__submit" style="display: none">Cancel</button>
            <button type="button" id="edit" class="dashform__submit">Edit</button>
        </form>
    </div>
</div>