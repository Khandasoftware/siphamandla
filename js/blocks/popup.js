function* parents(e, selector) {
    while (e = e.parentElement) {
        if ( e.matches(selector) ) {
           yield e;
        }
    }
 }
export const khdToggable = () =>{
    document.body.addEventListener('click', e => {
        
        e.stopPropagation()
        
        let clicked = e.target
        
        if( clicked.tagName =="svg" )
          clicked = clicked.parentElement  

        if( ! clicked.hasAttribute("data-toggable_open") ) return

        const parent = [...parents( e.target, '[data-toggable]')][0]
        console.log( parent)

    
        if( ! parent ) return

        parent.dataset.control ="open"
        

    })

    document.body.addEventListener('click', e => {
        
        e.stopPropagation()
        
        let clicked = e.target
        
        if( clicked.tagName =="svg" )
            clicked = clicked.parentElement

        if( ! clicked.hasAttribute("data-toggable_close") ) return

        const parent = [...parents( e.target, '[data-toggable]')][0]
        console.log( parent)

        if( parent ){
            parent.dataset.control ="close"
        }

    })
}