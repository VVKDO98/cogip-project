class Update{
    constructor() {
        this.update = document.querySelector('#update')
        this.cancel = document.querySelector('#cancel')
        this.edit = document.querySelector('#edit')
        this.inputs = [...document.querySelectorAll('input')]
        this.select = document.querySelector('select')
        this.options = [...this.select.querySelectorAll('option')]

        this.edit.addEventListener('click', e => {
            e.preventDefault()
            this.showUpdate()
        })

        this.cancel.addEventListener('click', e=>{
            e.preventDefault()
            this.resetValues()
            this.cancelUpdate()
        })
    }

    showUpdate(){
        this.update.style.display="block"
        this.cancel.style.display="block"
        this.edit.style.display="none"
        this.inputs.map(input => {
            input.disabled=false
        })
        this.select.disabled=false
    }

    cancelUpdate(){
        this.update.style.display="none"
        this.cancel.style.display="none"
        this.edit.style.display="block"
        this.inputs.map(input => {
            input.disabled=true
        })
        this.select.disabled=true
    }

    resetValues(){
        this.inputs.map(input => {
            input.value = input.dataset.default
        })
        this.options.map(option => {
            option.value === this.select.dataset.default? option.selected=true : option.selected=false
        })
    }

    log(){
        console.log(this.inputs)
    }
}

const update = new Update()
