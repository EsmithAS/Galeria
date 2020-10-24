/* Mensaje de entrada */
const btnCerrar = document.querySelector( '#btnCerrar' );
const mensaje = document.querySelector( '#mensaje' );
if(  mensaje ) {

    if( localStorage.getItem( 'mensaje' ) !== null ){
    
        if ( localStorage.getItem( 'mensaje' ) === 'true' ){
            
            mensaje.classList.toggle( 'hidden' );
            
            
        }
        
    } else {
        
        localStorage.setItem( 'mensaje' , true );
    
    }
    
    btnCerrar.addEventListener( 'click' , () => {
    
        mensaje.classList.toggle( 'hidden' );
    
    } );

}

function validar( id ) {
    const el = document.querySelector( '#'+id );
    const contErr = document.querySelector( '#error' );
    if (el.value.trim() < 1) {
        el.classList.add( 'border-red-700' );
        contErr.innerHTML = 'Campo vacio';
    } else {
        el.classList.remove( 'border-red-700' );
        contErr.innerHTML = '';
    }
}
