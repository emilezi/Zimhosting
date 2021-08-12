snake={

direction:39,
tb_posi_l:[],
tb_posi_t:[],
tb_el:[],
tb_grille_l:[],
tb_grille_t:[],
tb_rotation:[],
taille_pixel:20,
vitesse:100,
bout:'',
inter:'',
point:0,

creason:function(chemin){
		
		var audio_el=document.createElement('audio');
		
		var s_ogg=document.createElement('source');
		s_ogg.setAttribute('type','audio/ogg');
		s_ogg.setAttribute('src',chemin+'.ogg');
		audio_el.appendChild(s_ogg);
		
		var s_mp3=document.createElement('source');
		s_mp3.setAttribute('type','audio/mp3');
		s_mp3.setAttribute('src',chemin+'.mp3');
		audio_el.appendChild(s_mp3);
		return audio_el;
	},
	
aud:'',

antibug:0
}

function serpent_touch(evt){

	if(snake.antibug==1){
		return false;
	}
	snake.antibug=1;
	
	var touche=evt.keyCode;
	
	if(touche==39 && snake.direction==37){
		return false;
	}
	if(touche==37 && snake.direction==39){
		return false;
	}
	if(touche==40 && snake.direction==38){
		return false;
	}
	if(touche==38 && snake.direction==40){
		return false;
	}
	
	if(touche!=snake.direction){
		snake.direction=touche;
	}
}

function serpent_bouge(evt){

	if(snake.direction==39){

		snake.tb_posi_l.unshift(snake.tb_posi_l[0]+snake.taille_pixel);
		snake.tb_posi_l.pop();
		snake.tb_posi_t.unshift(snake.tb_posi_t[0]);
		snake.tb_posi_t.pop();
		snake.tb_rotation.unshift(0);
		snake.tb_rotation.pop();
	}
	if(snake.direction==37){

		snake.tb_posi_l.unshift(snake.tb_posi_l[0]-snake.taille_pixel);
		snake.tb_posi_l.pop();
		snake.tb_posi_t.unshift(snake.tb_posi_t[0]);
		snake.tb_posi_t.pop();
		snake.tb_rotation.unshift(180);
		snake.tb_rotation.pop();
	}
	if(snake.direction==38){

		snake.tb_posi_t.unshift(snake.tb_posi_t[0]-snake.taille_pixel);
		snake.tb_posi_t.pop();
		snake.tb_posi_l.unshift(snake.tb_posi_l[0]);
		snake.tb_posi_l.pop();
		snake.tb_rotation.unshift(270);
		snake.tb_rotation.pop();
	}
	if(snake.direction==40){

		snake.tb_posi_t.unshift(snake.tb_posi_t[0]+snake.taille_pixel);
		snake.tb_posi_t.pop();
		snake.tb_posi_l.unshift(snake.tb_posi_l[0]);
		snake.tb_posi_l.pop();
		snake.tb_rotation.unshift(90);
		snake.tb_rotation.pop();
	}
	
	cadre_bord();
	
	for(var i = 0; i < snake.tb_el.length; i++){
		snake.tb_el[i].style.left=snake.tb_posi_l[i]+'px';
		snake.tb_el[i].style.top=snake.tb_posi_t[i]+'px';
		rotanav(snake.tb_el[i],snake.tb_rotation[i]);
	}
	for(var i = 1; i < snake.tb_el.length; i++){

		if(colision_queue(snake.tb_el[i])){
			fin();
			return false;
		}
	}
	
	if(colision()){

		snake.tb_posi_l.push(0);
		snake.tb_posi_t.push(0);
		snake.bout.className='serpent';
		snake.tb_el.push(snake.bout);
		snake.tb_rotation.push(0);
		snake.bout=crea_queue();
		snake.point+=5;
		document.getElementById('game_point').firstChild.nodeValue=snake.point;
		snake.aud.currentTime=0;
		snake.aud.play();
	}
	
	snake.antibug=0;
}

function rotanav(el,alpha){
	
	var effet='rotate('+alpha+'deg)';
	
	el.style.transform=effet;
	
	el.style.WebkitTransform=effet;

	el.style.OTransform=effet;

	el.style.MozTransform=effet;

	el.style.msTransform=effet;
}

function cadre_bord(){

	var conteneur=document.getElementById('game');
	var obj=snake.tb_el[0];
	
	if(obj.offsetLeft >= conteneur.offsetWidth){
		
		snake.tb_posi_l[0]=0;
	}
	
	else if(obj.offsetLeft<0){
		
		snake.tb_posi_l[0]=conteneur.offsetWidth-obj.offsetWidth;
	}
	
	if(obj.offsetTop < 0){
		snake.tb_posi_t[0]=conteneur.offsetHeight-obj.offsetHeight;
	}

	else if(obj.offsetTop >= conteneur.offsetHeight){
		snake.tb_posi_t[0]=0;
	}
}

function colision(){

	var el=snake.tb_el[0];
	var el2=snake.bout;

	return(el.offsetTop == el2.offsetTop && el2.offsetLeft == el.offsetLeft);
}

function colision_queue(param){

	var el=snake.tb_el[0];
	var el2=param;

	return(el.offsetTop == el2.offsetTop && el2.offsetLeft == el.offsetLeft);

}

function crea_queue(){

	var el=document.createElement('div');
	el.className='objet';
	el.style.left=snake.tb_grille_l[Math.floor(Math.random()*snake.tb_grille_l.length)]+'px';
	el.style.top= snake.tb_grille_t[Math.floor(Math.random()*snake.tb_grille_t.length)]+'px';
	
	return(document.getElementById('game').appendChild(el));
}


function fin(){

	clearInterval(snake.inter);
	typeof window.addEventListener == 'undefined' ? document.detachEvent("onkeydown",serpent_touch) : removeEventListener("keydown",serpent_touch, false);

	snake.tb_posi_l.splice(0, snake.tb_el.length);
	snake.tb_posi_t.splice(0, snake.tb_el.length);
	snake.tb_el.splice(0, snake.tb_el.length);
	snake.tb_grille_l.splice(0, snake.tb_el.length);
	snake.tb_grille_t.splice(0, snake.tb_el.length);
	snake.tb_rotation.splice(0, snake.tb_el.length);
	var clone=document.getElementById('game_menu').cloneNode(true);
	var clone2=document.getElementById('game_point').cloneNode(true);
	document.getElementById('game').innerHTML='';
	document.getElementById('game').appendChild(clone2);
	document.getElementById('game').appendChild(clone);
	document.getElementById('game_menu').style.display='block';
	snake.point=0;
}


function init_serpent(){

	document.getElementById('game_menu').style.display='none';
	document.getElementById('game_point').firstChild.nodeValue=0;
	
	snake.tb_el.push(crea_queue());
	snake.tb_el[0].className='tete';

	snake.tb_posi_l.push(snake.tb_el[0].offsetLeft);

	snake.tb_posi_t.push(snake.tb_el[0].offsetTop);
	
	snake.tb_rotation.push(0);

	for(var i=0;i < document.getElementById('game').offsetWidth; i+=snake.taille_pixel){
		snake.tb_grille_l.push(i);
	}
	
	for(var i=0;i < document.getElementById('game').offsetHeight; i+=snake.taille_pixel){
		snake.tb_grille_t.push(i);
	}
	snake.bout=crea_queue();
	snake.inter=setInterval(serpent_bouge,snake.vitesse);
	snake.aud=snake.creason('audio/snake/pie');
	typeof window.addEventListener == 'undefined' ? document.attachEvent("onkeydown",serpent_touch) : addEventListener("keydown",serpent_touch, false);

}