

var dugme = document.getElementById('mojeDugme');
var komentari = document.getElementsByClassName('Komentari_Klasa');
var pomocna = dugme.innerHTML;

console.log(komentari);

dugme.addEventListener('click',function(){
	 switch(pomocna){
	 	case 'Hide comments':
	 	
        	komentari[0].style.display = 'none';
	 		dugme.innerHTML = 'Show Comments';
	 		pomocna = 'Show Comments';
	 		console.log('hide')
	 
        break;

        case 'Show Comments':
       
        	komentari[0].style.display = 'inline';
	 		dugme.innerHTML = 'Hide comments';
	 		pomocna = 'Hide comments';
	 		
	 	
        break;
	 }
});
	

 