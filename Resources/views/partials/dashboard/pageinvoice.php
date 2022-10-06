<?php dd($data); ?>
<form method="post">
    <div>
        <label for="ref">Ref</label>
        <input type="text" name="ref" id="ref" value="<?= $data['invoice'][0]->Ref ?>">
    </div>
    <div>
        <label for="duedates">Due dates</label>
        <input type="date" name="duedates" id="duedates" value="<?= date("Y-m-d", strtotime($data['invoice'][0]->{'Due dates'})) ?>">
    </div>
    <div>
        <label for="company">Company</label>
        <select name="company" id="company" >
        <?php
            foreach ($data['companies']['datas'] as $item):
        ?>
            <option value="<?= $item->id ?>" <?=  $data['invoice'][0]->id_company==$item->id? 'selected="selected"':''; ?> ><?= $item->Name ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" value="<?= $data['invoice'][0]->price ?>">
    </div>
</form>