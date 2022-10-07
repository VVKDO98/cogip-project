<form method="post" action="/update/company">
    <input type="hidden" name="id" value="<?= $data['company']['companies'][0]->id  ?>">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $data['company']['companies'][0]->Name ?>"  data-default="<?= $data['company']['companies'][0]->Name ?>" disabled>
    </div>
    <div>
        <label for="country">Country</label>
        <input type="text" name="country" id="country" value="<?= $data['company']['companies'][0]->Country ?>"  data-default="<?= $data['company']['companies'][0]->Name ?>" disabled>
    </div>
    <div>
        <label for="tva">TVA</label>
        <input type="text" name="tva" id="tva" value="<?= $data['company']['companies'][0]->TVA ?>"  data-default="<?= $data['company']['companies'][0]->Name ?>" disabled>
    </div>
    <div>
        <label for="types"></label>
        <select name="types" id="types" data-default="<?= $data['company']['companies'][0]->typeid ?>" disabled>
            <?php
            foreach ($data["types"] as $type):
            ?>
                <option value="<?= $type->id ?>" <?= $type->id==$data['company']['companies'][0]->typeid?'selected="selected"':''; ?>><?= $type->name ?></option>
            <?php
            endforeach;
            ?>
        </select>
    </div>


    <button type="submit" id="update" style="display: none">Update</button>
    <button type="button" id="cancel" style="display: none">Cancel</button>
    <button type="button" id="edit">Edit</button>
</form>

<script>
    const update = document.querySelector('#update')
    const cancel = document.querySelector('#cancel')
    const edit = document.querySelector('#edit')
    const inputs = [...document.querySelectorAll('input')]
    const select = document.querySelector('select')
    const options = [...select.querySelectorAll('option')]
    function showUpdate(){
        update.style.display="block"
        cancel.style.display="block"
        edit.style.display="none"
        inputs.map(input => {
            input.disabled=false
        })
        select.disabled=false
    }

    function cancelUpdate(){
        update.style.display="none"
        cancel.style.display="none"
        edit.style.display="block"
        inputs.map(input => {
            input.disabled=true
        })
        select.disabled=true
    }

    function resetValues(){
        inputs.map(input => {
            input.value = input.dataset.default
        })
        options.map(option => {
            option.value === select.dataset.default? option.selected=true : option.selected=false
        })
    }

    edit.addEventListener('click', e => {
        e.preventDefault()
        showUpdate()
    })

    cancel.addEventListener('click', e=>{
        e.preventDefault()
        resetValues()
        cancelUpdate()
    })
</script>