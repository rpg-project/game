var hero = new Hero(0,0,null);
hero.init($('#hero_stats'));
var fightList = new Array;

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

    $(".mapFight").click(function(e){
        e.preventDefault();
        var fightId = $(this).attr('fightid');
        var link = "<a href='"+window.location+"/../../../quest/fight/"+fightId+"' class='btn btn-primary'>^Combat</a>";
        $('#form_infos').val(link);

    });

	$(".mapTrigger").click(function(e){
		e.preventDefault();
		var mapId = $(this).attr('mapId');
		var questId = $(this).attr('questId');
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
		//bouton();
	}

    $(".btn-info").click();



	//init_game();
    //
    //init_canvas();


	
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

	if(map == null || map == undefined){
		return;
	}

	var x=0;
	var limitX = map.length;
	var limitY = map[0].length;
	var path = window.location+"/../../../../../";

	var plan="<table style='border:1px solid black;'>";

	while (x<limitX)
	{
		var y=0;
		plan=plan+"<tr>";

		while (y<limitY)
		{
			if($('#zone').attr('fight') == undefined){
                var classCell ="war-fog";
			} else {
                var classCell = map[x][y]['decor'] + " no-war-fog";
			}

			var image = "</td>";
			if(map[x][y]['monster'] != 0){
                var class_monster="";
				if($('#zone').attr('fight') == undefined) {
                    class_monster = 'invisible'
                }
				image = "<img src='"+path+map[x][y]['monster']+"' class='"+class_monster+"' heigth='40' width='40'></td>";
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
	//bouton();
}

function viewHero(i, j, range){

	var fight = $("#zone").attr('fight');
	if(fight == undefined){
        var arrayLignes = document.getElementById("zone").rows; //on récupère les lignes du tableau
        var longueur = arrayLignes.length;//on peut donc appliquer la propriété length
        for(var x=(i-range); x<=(i+range); x++){
            if(x >= 0 && x < longueur ){
                view(x, j, range);
            }
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

function init_fight(){
	if($('#zone').attr('fight')=== undefined){
		return;
	} else {
		var opponents = $('#opponents');

		opponents.find('div').each(function(){
			var opponent = new Hero();
            opponent.init($(this))
			fightList.push(opponent);
		})
		turn(fightList, 0);
	}
}

function play(opponent, list, index){
	console.log(opponent);
	switch(opponent.getType())
	{
		case 'team':alert(opponent.getName());
					opponent.teamPlay(index);
                    // opponent.endTurn(index);
					break;
		case 'monster': alert(opponent.getName());
						opponent.play();
						index++;
						turn(list, index);
		                break;
		default : alert(opponent.getName());
			      opponent.toPlay(index);
                  // opponent.endTurn(index);
				  break;
	}
}

function read(fichier)
{
    //On lance la requête pour récupérer le fichier
    var fichierBrut = new XMLHttpRequest();
    fichierBrut.open("GET", fichier, false);
    //On utilise une fonction sur l'événement "onreadystate"
	var texteComplet;
    fichierBrut.onreadystatechange = function ()
    {
        if(fichierBrut.readyState === 4)
        {
            //On contrôle bien quand le statut est égal à 0
            if(fichierBrut.status === 200 || fichierBrut.status == 0)
            {
                //On peut récupérer puis traiter le texte du fichier
                texteComplet = fichierBrut.responseText;
            }
        }
    }
    fichierBrut.send(null);
    return texteComplet;
}

function turn(list, index){

	var opponent = list[index];
	play(opponent, list, index);
}

function fightCommand(){
    $('#endTurn').off('click').click(function(){
    	alert('fin de tour');
        var index = $(this).attr('index');
        index++;
    	$('#capacity').find('li').each(function(){
    		$(this).remove();
		})
		if(fightList[index] != undefined){
            turn(fightList, index);
		} else {
			alert('fin de round');
		}
    });
}