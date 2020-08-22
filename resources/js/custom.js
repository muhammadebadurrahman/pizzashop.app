( function () {
    'use strict';
    window.addEventListener( 'load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName( 'needs-validation' );
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call( forms, function ( form ) {
            form.addEventListener( 'submit', function ( event ) {
                if ( form.checkValidity() === false ) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add( 'was-validated' );
            }, false );
        } );
    }, false );
} )();


( () => {
    const documentReady = ( e ) => {

        const button = document.querySelector( '#load-more' );
        const form = document.querySelector( '#loadpost' );
        let page = 1;
        const postContainer = document.querySelector( '.content-wrapper' );
        // revealAnimation();

        if ( typeof ( button ) !== 'undefined' && button !== null ) {


            function loadPosts ( e ) {

                e.preventDefault();


                const xhr = new XMLHttpRequest();
                const params = new URLSearchParams();
                const csrf = document.querySelector( 'meta[name="csrf-token"]' ).content;

                // console.log( 'clicked' );

                params.append( 'page', page );
                // params.append( 'page', currentPage );

                xhr.open( 'GET', '/load?' + params, true );

                xhr.setRequestHeader( 'X-CSRF-TOKEN', csrf );

                xhr.onload = () => {



                    // let data = JSON.parse( xhr.responseText )

                    let data = JSON.parse( xhr.responseText );

                    if ( data.current_page === data.last_page ) {
                        button.remove();
                    }

                    data.data.forEach( pizza => {
                        let html = `
                        <div class="col-md-12 mt-5">
                        <div class="border border-dark rounded p-2 bg-warning">
                                <h5 class="bg-dark p-3 text-warning rounded">Order ID: ${ pizza.id }</h5>
                                <ul class="list-group">
                                    <li class="list-group-item bg-dark text-light">Pizza For: ${ pizza.name } </li>
                                    <li class="list-group-item">Pizaa Type: ${ pizza.type } </li>
                                    <li class="list-group-item">Pizaa Base: ${ pizza.base } </li>
                                </ul>
                
                            </div>
                        </div>`;
                        document.querySelector( '.content-wrapper' ).insertAdjacentHTML( 'beforeend', html );
                    } );


                }

                xhr.send();
                page++;


            }

            form.addEventListener( 'submit', loadPosts );

        }


    }

    document.addEventListener( 'DOMContentLoaded', documentReady );

} )();