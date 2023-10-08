export const khdTabs = () =>{ 
    const tabs = document.getElementsByClassName("khd-tabs__button")
    console.log( tabs )
    document.querySelector('body').addEventListener('click', function( e ){
        const that = e.target
        console.log( that )
        if( ! that.classList.contains( 'khd-tabs__button' ) ) 
            return

        for( const el of document.querySelectorAll('.khd-tabs__button--active') ) 
            if( el.classList.contains('khd-tabs__button--active') )
                el.classList.remove('khd-tabs__button--active') 
        
        that.classList.toggle("khd-tabs__button--active")
        const index = Array.from( that.parentElement.children ).indexOf(that)
        const panel = document.querySelectorAll('.khd-tabs__panel')[index]

        for( const el of document.querySelectorAll('.khd-tabs__panel') )
            el.style.display="none"
        
        
        panel.style.display="block"
    })
}