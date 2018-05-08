var hero = new Hero(0,0,null);

$(document).ready(function()
{
	$(".decoration").click(function(){
		var decor = $(this).attr('title');
		var obstacle = $(this).attr('obstacle');
		$('#form_decoration').val(decor);
		$('#form_obstacle').val(obstacle);
	});
	$(".monster").click(function(){
		var monster = $(this).attr('title');
		$('#form_monster').val(monster);
	});

	/*$(".monsterTrigger").click(function(){
		var monster = $(this).attr('title');
		$('#form_monster').val(monster);
	});*/

	$(".mapTrigger").click(function(e){
		e.preventDefault();
		var mapId = $(this).attr('mapId');
		var questId = $(this).attr('questId');
		//alert(window.location);
		//rajouter questId
		var link = "<a href='"+window.location+"/../../../quest/running/"+questId+"/"+mapId+"' class='btn btn-primary'>Passage</a>";
		$('#form_infos').val(link);
	});

	var zone = $("#zone").html();
	if(zone != undefined){
		map = mapBuilding();
		var x = $('#hero').attr('col');
		var y = $('#hero').attr('line');
		hero.setXY(x,y);
		map[y][x]['trigger'] = 0;
		hero.setMap(map);
		bouton();
	}
	
});

function mapBuilding(){
	var map = new Array;
	var arrayLignes = document.getElementById("zone").rows; //on récupère les lignes du tableau
	var longueur = arrayLignes.length;//on peut donc appliquer la propriété length
	for(var i=0; i<longueur; i++)//on peut directement définir la variable i dans la boucle
	{
		var arrayColonnes = arrayLignes[i].cells;//on récupère les cellules de la ligne
		var largeur = arrayColonnes.length;
		map[i] = new Array;
		for(var j=0; j<largeur; j++)
		{
			var content = new Array;
			content['obstacle'] = $(arrayColonnes[j]).attr('obstacle');
			content['trigger'] = $(arrayColonnes[j]).attr('trigger');
			content['decor'] = $(arrayColonnes[j]).attr('decor');
			content['monster'] = $(arrayColonnes[j]).attr('monster');
			content['hero'] = 0;
			if(content['trigger'] == "1"){
				content['hero'] = 1;
			}
			map[i][j] = content;
		}
	}
	return map;	
}

function bouton(){
	$(document).off('keypress').keypress(function( event )
	 {
	 	//gauche
		if ( event.keyCode == 37 )
			{
				hero.gauche();
			}
		//droite
		if ( event.keyCode == 39 )
			{
				hero.droite();
			}
		//haut
		if ( event.keyCode == 38 )
			{
				hero.haut();
			}
		//bas
		if ( event.keyCode == 40 )
			{
				hero.bas();
			}
	})
}

function mapping(map){

	var x=0;
	var limitX = map.length;
	var limitY = map[0].length;
	var path = window.location+"/../../../../../";
	//alert(path);
	var plan="<table style='border:1px solid black;'>";

	while (x<limitX)
	{
		var y=0;
		plan=plan+"<tr>";

		while (y<limitY)
		{
			var image = "</td>";
			if(map[x][y]['monster'] != 0){
				image = "<img src='"+path+map[x][y]['monster']+"' heigth='40' width='40'></td>";
			}
			if(map[x][y]['hero'] != 0){
				image = "<img id='hero' src='"+path+"/images/tete.jpg' line='"+x+"' col='"+y+"' heigth='40' width='40'></td>";
			}
			plan = plan + "<td "+
			"obstacle='" + map[x][y]['obstacle'] + "'"+
			"trigger='" + map[x][y]['trigger'] + "'"+ 
			"monster='" + map[x][y]['monster'] + "'"+  
			"decor='" + map[x][y]['decor'] + "'"+  
			"hero='" + map[x][y]['hero'] + "'"+ 
			"style='height:40px;width:40px;"+
			       "background-image:url("+path+"images/"+map[x][y]['decor']+");"+
			       "background-repeat:none;"+
			       "background-size:contain;'>"+
			image;



			y++;
		}
		plan=plan+"</tr>";

		x++;
	}
	plan=plan+"</table>";

	$("#zone").html(plan);
	map = mapBuilding();
	var x = $('#hero').attr('col');
	var y = $('#hero').attr('line');
	hero.setXY(x,y);
	hero.setMap(map);
	bouton();
}