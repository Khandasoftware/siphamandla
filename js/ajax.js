
export const ajax = ($) => {
    $('[data-ajax]').on('submit', function (e) {
        e.preventDefault()
        const form = $( this )
        const formData = {}
        form.find("[data-ajax_input]").each(( index, element )=>{

        const key = $( element ).attr("name")

        if( key.trim() ==="" || key === undefined || key === null )
                return

        let value = $( element ).val()
        if( $( element ).prop("nodeName") == 'SELECT' )
                value = $( element ).find(":selected").val()
        if( $( element ).prop("nodeName") == 'TEXTAREA' )
                value = $( element ).text()
            
            if( $( element ).attr("type") == "checkbox" ){
                if( $( element ).is(":checked"))
                    value = true
                else
                    value = false
            }

            if( value === undefined || value === null ){
                console.error( `value can not be null at iteration ${index}`)
                return
            }
            formData[key] = value
        })

        if( ! formData.ajax_nonce ){
            console.error("Nonce is mandetory")
            return
        }
        if( form.data("ajax").trim =="" ){
            console.error( "Ajax handler is mandetory" )
            return
        }
        if( ! ( form.find("[ajax_loader]").length > 0 ) )
            console.error( "Loader would be nice" )

        if( ! ajax_object.ajax_url ){
            console.error( "Server url is mandetory" )
            return
        }
        formData.callback = form.data("ajax")
        formData.action = 'custom_ajax_action'

        console.log( formData)

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData,
            beforeSend: function () {
                form.find("[ajax_loader]").show()
            },
            success: function ( response ) {
                // Handle the AJAX response here
                if( ! response.success )
                    console.error( response.data.message )
                else
                    console.log( response.data.message )
            },
            error: function (error) {
                // Handle errors here
                console.error( 'AJAX Error:', error.data.message )
            },
            complete: function () {
                form.find("[ajax_loader]").hide()
            }
        })
    })
}


