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

    $(".btn-info").click();
	
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
			$(arrayColonnes[j]).addClass('war-fog');
			content['hero'] = 0;
			if(content['trigger'] == "1"){
				content['hero'] = 1;
				viewHero(i,j,hero.getRange());
			}
			map[i][j] = content;
		}
	}
	return map;	
}

function bouton(){
	$(document).off('keydown').keydown(function( event )
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
            var classCell ="war-fog";
			var image = "</td>";
			if(map[x][y]['monster'] != 0){
				image = "<img src='"+path+map[x][y]['monster']+"' class='invisible' heigth='40' width='40'></td>";
			}
			if(map[x][y]['hero'] != 0){
				classCell = map[x][y]['decor'];
				image = "<img id='hero' src='"+path+"/images/tete.jpg' line='"+x+"' col='"+y+"' heigth='40' width='40'></td>";
			}
			plan = plan + "<td "+
			"obstacle='" + map[x][y]['obstacle'] + "'"+
			"trigger='" + map[x][y]['trigger'] + "'"+ 
			"monster='" + map[x][y]['monster'] + "'"+  
			"decor='" + map[x][y]['decor'] + "'"+  
			"hero='" + map[x][y]['hero'] + "'"+
			"class='"+classCell+"'>"+
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

function viewHero(i, j, range){

    var arrayLignes = document.getElementById("zone").rows; //on récupère les lignes du tableau
    var longueur = arrayLignes.length;//on peut donc appliquer la propriété length
    for(var x=(i-range); x<=(i+range); x++){
    	if(x >= 0 && x < longueur ){
            view(x, j, range);
		}
    }
}

function view(i, j, range){
    var arrayLignes = document.getElementById("zone").rows; //on récupère les lignes du tableau
	var arrayColonnes = arrayLignes[i].cells;//on récupère les cellules de la ligne
	var largeur = arrayColonnes.length;
	var classCell = $(arrayColonnes[j]).attr('decor');
	$(arrayColonnes[j]).removeClass('war-fog');
	$(arrayColonnes[j]).addClass(classCell);
    if($(arrayColonnes[j]).attr('monster') !=0){
        $(arrayColonnes[j]).find('img').removeClass('invisible').addClass('visible');
    }
    for(var r=1;r<=range;r++){
        if((j - r) >= 0){
            var classCell = $(arrayColonnes[j - r]).attr('decor');
            $(arrayColonnes[j - r]).removeClass('war-fog');
            $(arrayColonnes[j - r]).addClass(classCell);
            if($(arrayColonnes[j - r]).attr('monster') !=0){
                $(arrayColonnes[j - r]).find('img').removeClass('invisible').addClass('visible');
            }
        }
	}
    for(var r=1;r<=range;r++) {
        if ((j + r) < largeur) {
            var classCell = $(arrayColonnes[j + r]).attr('decor');
            $(arrayColonnes[j + r]).removeClass('war-fog');
            $(arrayColonnes[j + r]).addClass(classCell);
            if ($(arrayColonnes[j + r]).attr('monster') != 0) {
                $(arrayColonnes[j + r]).find('img').removeClass('invisible').addClass('visible');
            }
        }
    }
}