export const khdAccordion = () =>{
    const acc = document.getElementsByClassName("khd-accordion__button")
    document.querySelector('body').addEventListener('click', function( e ){
        const that = e.target
        if( ! that.classList.contains( 'khd-accordion__button' ) ) 
            return
        for ( const i = 0; i < acc.length; i++) {
            that.classList.toggle("khd-accordion__button--active")
            const panel = that.nextElementSibling
            if (panel.style.maxHeight)
                panel.style.maxHeight = null
            else 
                panel.style.maxHeight = panel.scrollHeight + "px"
        }
    })
}