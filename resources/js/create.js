const selectPO = document.querySelector('#po_exist');
const createPO = document.querySelector('#po_new');

const radios = document.querySelectorAll('input[type=radio]');

radios.forEach((radio) => {
  radio.addEventListener('click', function(){
    selectPO.disabled = true
    createPO.disabled = true

    if(this.value == 1){
      selectPO.disabled = false
      createPO.value = ''
    }else{
      createPO.disabled = false
      selectPO.value = 0
    }
  })
})


