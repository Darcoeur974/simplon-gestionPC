$(() => {

  // Data Picker Initialization
  // $('.datepicker').datepicker();
  //
  // /* owl-carousel */
  // $('.owl-carousel').owlCarousel({
  //   loop: true,
  //   margin: 15,
  //   nav: false,
  //   dots: true
  // })

    $('#computer-new').submit((e) => {
        e.preventDefault()

        const computerName = $('#computer_name').val()
        let data = {
            'name' : computerName
        }

        try {
            $.ajax({
                url: $('#computer-new').attr('action'),
                method: 'POST',
                data: data,
                dataType: 'json',
            })
        } catch (e) {
        }
    })

    $('.delete-computer').click((e) => {
        e.preventDefault()

        let cible = e.currentTarget.parentElement.parentElement.parentElement

        cible.remove()
    })
})
