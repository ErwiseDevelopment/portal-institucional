(function() {
    if(document.getElementsByClassName( 'js-summary' ) && 
       document.getElementsByClassName( 'js-contents' )) {

        const summary = document.getElementsByClassName( 'js-summary' )
        const contents = document.getElementsByClassName( 'js-contents' )

        summary[0].classList.add( 'active' )
        contents[0].classList.add( 'active' )

        for( const i of summary ) {
            i.addEventListener( 'click', function() {
                for( const j of summary ) {
                    j.classList.remove( 'active' )
                }   

                for( const k of contents ) {
                    if(this.dataset.summary == k.dataset.content) {
                        k.classList.add( 'active' )
                    } else {
                        k.classList.remove( 'active' )
                    }
                }

                this.classList.add( 'active' )
            })
        }
    }
})()