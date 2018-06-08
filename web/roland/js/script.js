var hero = new Hero(0,0,null);
hero.init($('#hero_stats'));


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

	init_fight();

	init_game();
	
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
	bouton();
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
			opponent.init($(this));
			play(opponent);
		})
	}
}

function play(opponent){
	switch(opponent.getType())
	{
		case 'monster': opponent.play();
		                break;
		default : opponent.toPlay()
				  break;

	}
}

function init_game(){
//     var ctx = null;
//
//
//
//
//     // var gameMap = [
//     //     0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0,
//     //     0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 0,
//     //     0, 0, 1, 0, 1, 0, 0, 1, 1, 1, 0,
//     //     0, 0, 1, 1, 1, 0, 0, 1, 0, 0, 0,
//     //     0, 0, 1, 0, 0, 0, 1, 1, 0, 1, 0,
//     //     0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0,
//     //     0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1,
//     //     0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0,
//     //     0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0,
//     //     2, 2, 2, 2, 2, 1, 2, 2, 2, 2, 2];
//
//     // console.log(gameMap);
//
//     var tileW = 40, tileH = 40;
//
//
//     var map = mapBuilding();
//     // console.log(map);
//     var mapW = map[0].length, mapH = map.length;
//
//     var gameMap = new Array;
//     var heroPosition = new Array;
//     var tileEvents = new Array;
//     var monsters = new Array;
//     for(var i=0;i<mapH;i++){
//         for(var j=0;j<mapW;j++){
//             switch(map[i][j]['decor']){
//                 case 'arbre': gameMap.push(0);
//                               break;
//                 case 'herbe': gameMap.push(2);
//                               break;
//                 case 'arbre_sombre': gameMap.push(3);
//                     break;
//                 case 'souche': gameMap.push(6);
//                     break;
//                 case 'hutte': gameMap.push(5);
//                     break;
//                 default: gameMap.push(1);
//             }
//             if(map[i][j]['hero'] == 1){
//                 heroPosition[1] = i;
//                 heroPosition[0] = j;
//             }
//             if(map[i][j]['trigger'] != "0"){
//                 tileEvents[toIndex(j, i)] = map[i][j]['trigger'];
//             }
//             // if(map[i][j]['monster'] != "0"){
//             //     gameMap.pop();
//             //     gameMap.push(map[i][j]['monster']);
//             // }
//         }
//     }
//     console.log(map);
//
//
//     var currentSecond = 0, frameCount = 0, framesLastSecond = 0, lastFrameTime = 0;
//
//     var tileset = null, tilesetURL = "/images/tileset.png", tilesetLoaded = false;
//
//     var floorTypes = {
//         solid	: 0,
//         path	: 1,
//         water	: 2
//     };
//     var tileTypes = {
//         3 : { colour:"#685b48", floor:floorTypes.solid, sprite:[{x:0,y:0,w:40,h:40}]	},
//         2 : { colour:"#5aa457", floor:floorTypes.path,	sprite:[{x:40,y:0,w:40,h:40}]	},
//         1 : { colour:"#e8bd7a", floor:floorTypes.path,	sprite:[{x:80,y:0,w:40,h:40}]	},
//         0 : { colour:"#286625", floor:floorTypes.solid,	sprite:[{x:120,y:0,w:40,h:40}]	},
//         4 : { colour:"#678fd9", floor:floorTypes.water,	sprite:[{x:160,y:0,w:40,h:40}]	},
//         5 : { colour:"#e8bd7a", floor:floorTypes.path,	sprite:[{x:200,y:40,w:40,h:40}]	},
//         6 : { colour:"#e8bd7a", floor:floorTypes.path,	sprite:[{x:160,y:80,w:40,h:40}]	}
//         // ,
//         // "/images/wolf.jpg" : { colour:"#e8bd7a", floor:floorTypes.path,	sprite:[{x:200,y:0,w:40,h:40}]  },
//         // "/images/biche.jpg" : { colour:"#e8bd7a", floor:floorTypes.path,	sprite:[{x:160,y:40,w:40,h:40}]  },
//         // "/images/cerf.png" : { colour:"#e8bd7a", floor:floorTypes.path,	sprite:[{x:200,y:80,w:40,h:40}]  }
//     };
//
//     var directions = {
//         up		: 0,
//         right	: 1,
//         down	: 2,
//         left	: 3
//     };
//
//     var keysDown = {
//         37 : false,
//         38 : false,
//         39 : false,
//         40 : false
//     };
//
//     var player = new Character();
//
//     function Character()
//     {
//         this.tileFrom	= [heroPosition[0],heroPosition[1]];
//         this.tileTo		= [heroPosition[0],heroPosition[1]];
//         this.timeMoved	= 0;
//         this.dimensions	= [30,30];
//         this.position	= [(heroPosition[0]*tileH)+5,(heroPosition[1]*tileW)+5];
//         this.delayMove	= 700;
//
//         this.direction	= directions.up;
//         this.sprites = {};
//         this.sprites[directions.up]		= [{x:0,y:120,w:30,h:30}];
//         this.sprites[directions.right]	= [{x:0,y:150,w:30,h:30}];
//         this.sprites[directions.down]	= [{x:0,y:180,w:30,h:30}];
//         this.sprites[directions.left]	= [{x:0,y:210,w:30,h:30}];
//     }
//
//     Character.prototype.placeAt = function(x, y)
//     {
//         this.tileFrom	= [x,y];
//         this.tileTo		= [x,y];
//         this.position	= [((tileW*x)+((tileW-this.dimensions[0])/2)),
//             ((tileH*y)+((tileH-this.dimensions[1])/2))];
//     };
//     Character.prototype.processMovement = function(t)
//     {
//         if(this.tileFrom[0]==this.tileTo[0] && this.tileFrom[1]==this.tileTo[1]) { return false; }
//
//         if((t-this.timeMoved)>=this.delayMove) {
//             this.placeAt(this.tileTo[0], this.tileTo[1]);
//
//             if (typeof tileEvents[toIndex(this.tileTo[0], this.tileTo[1])] != 'undefined') {
//                 // alert('event');
//                 // alert(tileEvents[toIndex(this.tileTo[0], this.tileTo[1])]);
//                 $(".btn-info").attr("data-target", "#"+tileEvents[toIndex(this.tileTo[0], this.tileTo[1])]);
//                 $(".btn-info").click();
//                 tileEvents[toIndex(this.tileTo[0], this.tileTo[1])] = undefined;
//
//             }
//         }
//         else
//         {
//             this.position[0] = (this.tileFrom[0] * tileW) + ((tileW-this.dimensions[0])/2);
//             this.position[1] = (this.tileFrom[1] * tileH) + ((tileH-this.dimensions[1])/2);
//
//             if(this.tileTo[0] != this.tileFrom[0])
//             {
//                 var diff = (tileW / this.delayMove) * (t-this.timeMoved);
//                 this.position[0]+= (this.tileTo[0]<this.tileFrom[0] ? 0 - diff : diff);
//             }
//             if(this.tileTo[1] != this.tileFrom[1])
//             {
//                 var diff = (tileH / this.delayMove) * (t-this.timeMoved);
//                 this.position[1]+= (this.tileTo[1]<this.tileFrom[1] ? 0 - diff : diff);
//             }
//
//             this.position[0] = Math.round(this.position[0]);
//             this.position[1] = Math.round(this.position[1]);
//         }
//
//         return true;
//     }
//
//     Character.prototype.canMoveTo = function(x, y)
//     {
//         if(x < 0 || x >= mapW || y < 0 || y >= mapH) { return false; }
//         if(tileTypes[gameMap[toIndex(x,y)]].floor!=floorTypes.path) { return false; }
//         return true;
//     };
//     Character.prototype.canMoveUp		= function() { return this.canMoveTo(this.tileFrom[0], this.tileFrom[1]-1); };
//     Character.prototype.canMoveDown 	= function() { return this.canMoveTo(this.tileFrom[0], this.tileFrom[1]+1); };
//     Character.prototype.canMoveLeft 	= function() { return this.canMoveTo(this.tileFrom[0]-1, this.tileFrom[1]); };
//     Character.prototype.canMoveRight 	= function() { return this.canMoveTo(this.tileFrom[0]+1, this.tileFrom[1]); };
//
//     Character.prototype.moveLeft	= function(t) { this.tileTo[0]-=1; this.timeMoved = t; };
//     Character.prototype.moveRight	= function(t) { this.tileTo[0]+=1; this.timeMoved = t; };
//     Character.prototype.moveUp	= function(t) { this.tileTo[1]-=1; this.timeMoved = t; };
//     Character.prototype.moveDown	= function(t) { this.tileTo[1]+=1; this.timeMoved = t; };
//
//     Character.prototype.moveLeft	= function(t) { this.tileTo[0]-=1; this.timeMoved = t; this.direction = directions.left; };
//     Character.prototype.moveRight	= function(t) { this.tileTo[0]+=1; this.timeMoved = t; this.direction = directions.right; };
//     Character.prototype.moveUp		= function(t) { this.tileTo[1]-=1; this.timeMoved = t; this.direction = directions.up; };
//     Character.prototype.moveDown	= function(t) { this.tileTo[1]+=1; this.timeMoved = t; this.direction = directions.down; };
//
//     function toIndex(x, y)
//     {
//         return((y * mapW) + x);
//     }
//
//     window.onload = function()
//     {
//         ctx = document.getElementById('game').getContext("2d");
//         requestAnimationFrame(drawGame);
//         ctx.font = "bold 10pt sans-serif";
//
//         window.addEventListener("keydown", function(e) {
//             if(e.keyCode>=37 && e.keyCode<=40) { keysDown[e.keyCode] = true; }
//         });
//         window.addEventListener("keyup", function(e) {
//             if(e.keyCode>=37 && e.keyCode<=40) { keysDown[e.keyCode] = false; }
//         });
//
//         tileset = new Image();
//         tileset.onerror = function()
//         {
//             ctx = null;
//             alert("Failed loading tileset.");
//         };
//         tileset.onload = function() { tilesetLoaded = true; };
//         tileset.src = tilesetURL;
//     };
//
//     function drawGame()
//     {
//         if(ctx==null) { return; }
//         if(!tilesetLoaded) { requestAnimationFrame(drawGame); return; }
//
//         var currentFrameTime = Date.now();
//         var timeElapsed = currentFrameTime - lastFrameTime;
//
//         var sec = Math.floor(Date.now()/1000);
//         if(sec!=currentSecond)
//         {
//             currentSecond = sec;
//             framesLastSecond = frameCount;
//             frameCount = 1;
//         } else { frameCount++; }
//
//         if(!player.processMovement(currentFrameTime))
//         {
//             if(keysDown[38] && player.canMoveUp())		{ player.moveUp(currentFrameTime); }
//             else if(keysDown[40] && player.canMoveDown())	{ player.moveDown(currentFrameTime); }
//             else if(keysDown[37] && player.canMoveLeft())	{ player.moveLeft(currentFrameTime); }
//             else if(keysDown[39] && player.canMoveRight())	{ player.moveRight(currentFrameTime); }
//         }
//
//         for(var y = 0; y < mapH; ++y)
//         {
//             for(var x = 0; x < mapW; ++x)
//             {
//                 var tile = tileTypes[gameMap[toIndex(x,y)]];
//                 ctx.drawImage(tileset,
//                     tile.sprite[0].x, tile.sprite[0].y, tile.sprite[0].w, tile.sprite[0].h,
//                     (x*tileW),(y*tileH),
//                     tileW, tileH);
// //                ctx.fillStyle = tileTypes[gameMap[toIndex(x,y)]].colour;
// //                ctx.fillRect( x*tileW, y*tileH, tileW, tileH);
//             }
//         }
//
//         var sprite = player.sprites[player.direction];
//         ctx.drawImage(tileset,
//             sprite[0].x, sprite[0].y, sprite[0].w, sprite[0].h,
//             player.position[0], player.position[1],
//             player.dimensions[0], player.dimensions[1]);
// //        ctx.fillStyle = "#0000ff";
// //        ctx.fillRect(player.position[0], player.position[1],
// //        player.dimensions[0], player.dimensions[1]);
//
//         // ctx.fillStyle = "#ff0000";
//         // ctx.fillText("FPS: " + framesLastSecond, 10, 20);
//
//         lastFrameTime = currentFrameTime;
//         requestAnimationFrame(drawGame);
//     }
    var ctx = null;
    var gameMap = [
        0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0,
        0, 2, 2, 2, 1, 1, 1, 1, 1, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0,
        0, 1, 1, 2, 1, 0, 0, 0, 0, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0,
        0, 1, 1, 2, 1, 0, 2, 2, 0, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0,
        0, 1, 1, 2, 1, 0, 2, 2, 0, 4, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0,
        0, 1, 1, 2, 2, 2, 2, 2, 0, 4, 4, 4, 1, 1, 1, 0, 2, 2, 2, 0,
        0, 1, 1, 2, 1, 0, 2, 2, 0, 1, 1, 4, 1, 1, 1, 0, 2, 2, 2, 0,
        0, 1, 1, 2, 1, 0, 2, 2, 0, 1, 1, 4, 1, 1, 1, 0, 2, 2, 2, 0,
        0, 1, 1, 2, 1, 0, 0, 0, 0, 1, 1, 4, 1, 1, 0, 0, 0, 2, 0, 0,
        0, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, 4, 1, 1, 0, 2, 2, 2, 2, 0,
        0, 1, 1, 2, 2, 2, 2, 2, 2, 1, 4, 4, 1, 1, 0, 2, 2, 2, 2, 0,
        0, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0,
        0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 4, 1, 1, 1, 0, 2, 2, 2, 2, 0,
        0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1, 1, 1, 1, 0, 2, 2, 2, 2, 0,
        0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0,
        0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0,
        0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0,
        0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0,
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
    ];
    var mapTileData = new TileMap();

    var roofList = [
        { x:5, y:3, w:4, h:7, data: [
            10, 10, 11, 11,
            10, 10, 11, 11,
            10, 10, 11, 11,
            10, 10, 11, 11,
            10, 10, 11, 11,
            10, 10, 11, 11,
            10, 10, 11, 11
        ]},
        { x:15, y:5, w:5, h:4, data: [
            10, 10, 11, 11, 11,
            10, 10, 11, 11, 11,
            10, 10, 11, 11, 11,
            10, 10, 11, 11, 11
        ]},
        { x:14, y:9, w:6, h:7, data: [
            10, 10, 10, 11, 11, 11,
            10, 10, 10, 11, 11, 11,
            10, 10, 10, 11, 11, 11,
            10, 10, 10, 11, 11, 11,
            10, 10, 10, 11, 11, 11,
            10, 10, 10, 11, 11, 11,
            10, 10, 10, 11, 11, 11
        ]}
    ];

    var tileW = 40, tileH = 40;
    var mapW = 20, mapH = 20;
    var currentSecond = 0, frameCount = 0, framesLastSecond = 0, lastFrameTime = 0;

    var tileset = null, tilesetURL = "/images/tileset.png", tilesetLoaded = false;

    var gameTime = 0;
    var gameSpeeds = [
        {name:"Normal", mult:1},
        {name:"Slow", mult:0.3},
        {name:"Fast", mult:3},
        {name:"Paused", mult:0}
    ];
    var currentSpeed = 0;

    var objectCollision = {
        none		: 0,
        solid		: 1
    };
    var objectTypes = {
        1 : {
            name : "Box",
            sprite : [{x:40,y:160,w:40,h:40}],
            offset : [0,0],
            collision : objectCollision.solid,
            zIndex : 1
        },
        2 : {
            name : "Broken Box",
            sprite : [{x:40,y:200,w:40,h:40}],
            offset : [0,0],
            collision : objectCollision.none,
            zIndex : 1
        },
        3 : {
            name : "Tree top",
            sprite : [{x:80,y:160,w:80,h:80}],
            offset : [-20,-20],
            collision : objectCollision.solid,
            zIndex : 3
        }
    };
    function MapObject(nt)
    {
        this.x		= 0;
        this.y		= 0;
        this.type	= nt;
    }
    MapObject.prototype.placeAt = function(nx, ny)
    {
        if(mapTileData.map[toIndex(this.x, this.y)].object==this)
        {
            mapTileData.map[toIndex(this.x, this.y)].object = null;
        }

        this.x = nx;
        this.y = ny;

        mapTileData.map[toIndex(nx, ny)].object = this;
    };

    var floorTypes = {
        solid	: 0,
        path	: 1,
        water	: 2,
        ice		: 3,
        conveyorU	: 4,
        conveyorD	: 5,
        conveyorL	: 6,
        conveyorR	: 7,
        grass		: 8
    };
    var tileTypes = {
        0 : { colour:"#685b48", floor:floorTypes.solid, sprite:[{x:0,y:0,w:40,h:40}]	},
        1 : { colour:"#5aa457", floor:floorTypes.grass,	sprite:[{x:40,y:0,w:40,h:40}]	},
        2 : { colour:"#e8bd7a", floor:floorTypes.path,	sprite:[{x:80,y:0,w:40,h:40}]	},
        3 : { colour:"#286625", floor:floorTypes.solid,	sprite:[{x:120,y:0,w:40,h:40}]	},
        4 : { colour:"#678fd9", floor:floorTypes.water,	sprite:[
            {x:160,y:0,w:40,h:40,d:200}, {x:200,y:0,w:40,h:40,d:200},
            {x:160,y:40,w:40,h:40,d:200}, {x:200,y:40,w:40,h:40,d:200},
            {x:160,y:40,w:40,h:40,d:200}, {x:200,y:0,w:40,h:40,d:200}
        ]},
        5 : { colour:"#eeeeff", floor:floorTypes.ice,	sprite:[{x:120,y:120,w:40,h:40}]},
        6 : { colour:"#cccccc", floor:floorTypes.conveyorL,	sprite:[
            {x:0,y:40,w:40,h:40,d:200}, {x:40,y:40,w:40,h:40,d:200},
            {x:80,y:40,w:40,h:40,d:200}, {x:120,y:40,w:40,h:40,d:200}
        ]},
        7 : { colour:"#cccccc", floor:floorTypes.conveyorR,	sprite:[
            {x:120,y:80,w:40,h:40,d:200}, {x:80,y:80,w:40,h:40,d:200},
            {x:40,y:80,w:40,h:40,d:200}, {x:0,y:80,w:40,h:40,d:200}
        ]},
        8 : { colour:"#cccccc", floor:floorTypes.conveyorD,	sprite:[
            {x:160,y:200,w:40,h:40,d:200}, {x:160,y:160,w:40,h:40,d:200},
            {x:160,y:120,w:40,h:40,d:200}, {x:160,y:80,w:40,h:40,d:200}
        ]},
        9 : { colour:"#cccccc", floor:floorTypes.conveyorU,	sprite:[
            {x:200,y:80,w:40,h:40,d:200}, {x:200,y:120,w:40,h:40,d:200},
            {x:200,y:160,w:40,h:40,d:200}, {x:200,y:200,w:40,h:40,d:200}
        ]},

        10 : { colour:"#ccaa00", floor:floorTypes.solid, sprite:[{x:40,y:120,w:40,h:40}]},
        11 : { colour:"#ccaa00", floor:floorTypes.solid, sprite:[{x:80,y:120,w:40,h:40}]}
    };

    function Tile(tx, ty, tt)
    {
        this.x			= tx;
        this.y			= ty;
        this.type		= tt;
        this.roof		= null;
        this.roofType	= 0;
        this.eventEnter	= null;
        this.object		= null;
    }

    function TileMap()
    {
        this.map	= [];
        this.w		= 0;
        this.h		= 0;
        this.levels	= 4;
    }
    TileMap.prototype.buildMapFromData = function(d, w, h)
    {
        this.w		= w;
        this.h		= h;

        if(d.length!=(w*h)) { return false; }

        this.map.length	= 0;

        for(var y = 0; y < h; y++)
        {
            for(var x = 0; x < w; x++)
            {
                this.map.push( new Tile(x, y, d[((y*w)+x)]) );
            }
        }

        return true;
    };
    TileMap.prototype.addRoofs = function(roofs)
    {
        for(var i in roofs)
        {
            var r = roofs[i];

            if(r.x < 0 || r.y < 0 || r.x >= this.w || r.y >= this.h ||
                (r.x+r.w)>this.w || (r.y+r.h)>this.h ||
                r.data.length!=(r.w*r.h))
            {
                continue;
            }

            for(var y = 0; y < r.h; y++)
            {
                for(var x = 0; x < r.w; x++)
                {
                    var tileIdx = (((r.y+y)*this.w)+r.x+x);

                    this.map[tileIdx].roof = r;
                    this.map[tileIdx].roofType = r.data[((y*r.w)+x)];
                }
            }
        }
    };

    var directions = {
        up		: 0,
        right	: 1,
        down	: 2,
        left	: 3
    };

    var keysDown = {
        37 : false,
        38 : false,
        39 : false,
        40 : false
    };

    var viewport = {
        screen		: [0,0],
        startTile	: [0,0],
        endTile		: [0,0],
        offset		: [0,0],
        update		: function(px, py) {
            this.offset[0] = Math.floor((this.screen[0]/2) - px);
            this.offset[1] = Math.floor((this.screen[1]/2) - py);

            var tile = [ Math.floor(px/tileW), Math.floor(py/tileH) ];

            this.startTile[0] = tile[0] - 1 - Math.ceil((this.screen[0]/2) / tileW);
            this.startTile[1] = tile[1] - 1 - Math.ceil((this.screen[1]/2) / tileH);

            if(this.startTile[0] < 0) { this.startTile[0] = 0; }
            if(this.startTile[1] < 0) { this.startTile[1] = 0; }

            this.endTile[0] = tile[0] + 1 + Math.ceil((this.screen[0]/2) / tileW);
            this.endTile[1] = tile[1] + 1 + Math.ceil((this.screen[1]/2) / tileH);

            if(this.endTile[0] >= mapW) { this.endTile[0] = mapW-1; }
            if(this.endTile[1] >= mapH) { this.endTile[1] = mapH-1; }
        }
    };

    var player = new Character();

    function Character()
    {
        this.tileFrom	= [1,1];
        this.tileTo		= [1,1];
        this.timeMoved	= 0;
        this.dimensions	= [30,30];
        this.position	= [45,45];

        this.delayMove	= {};
        this.delayMove[floorTypes.path]			= 400;
        this.delayMove[floorTypes.grass]		= 800;
        this.delayMove[floorTypes.ice]			= 300;
        this.delayMove[floorTypes.conveyorU]	= 200;
        this.delayMove[floorTypes.conveyorD]	= 200;
        this.delayMove[floorTypes.conveyorL]	= 200;
        this.delayMove[floorTypes.conveyorR]	= 200;

        this.direction	= directions.up;
        this.sprites = {};
        this.sprites[directions.up]		= [{x:0,y:120,w:30,h:30}];
        this.sprites[directions.right]	= [{x:0,y:150,w:30,h:30}];
        this.sprites[directions.down]	= [{x:0,y:180,w:30,h:30}];
        this.sprites[directions.left]	= [{x:0,y:210,w:30,h:30}];
    }
    Character.prototype.placeAt = function(x, y)
    {
        this.tileFrom	= [x,y];
        this.tileTo		= [x,y];
        this.position	= [((tileW*x)+((tileW-this.dimensions[0])/2)),
            ((tileH*y)+((tileH-this.dimensions[1])/2))];
    };
    Character.prototype.processMovement = function(t)
    {
        if(this.tileFrom[0]==this.tileTo[0] && this.tileFrom[1]==this.tileTo[1]) { return false; }

        var moveSpeed = this.delayMove[tileTypes[mapTileData.map[toIndex(this.tileFrom[0],this.tileFrom[1])].type].floor];

        if((t-this.timeMoved)>=moveSpeed)
        {
            this.placeAt(this.tileTo[0], this.tileTo[1]);

            if(mapTileData.map[toIndex(this.tileTo[0], this.tileTo[1])].eventEnter!=null)
            {
                mapTileData.map[toIndex(this.tileTo[0], this.tileTo[1])].eventEnter(this);
            }

            var tileFloor = tileTypes[mapTileData.map[toIndex(this.tileFrom[0], this.tileFrom[1])].type].floor;

            if(tileFloor==floorTypes.ice)
            {
                if(this.canMoveDirection(this.direction))
                {
                    this.moveDirection(this.direction, t);
                }
            }
            else if(tileFloor==floorTypes.conveyorL && this.canMoveLeft())	{ this.moveLeft(t); }
            else if(tileFloor==floorTypes.conveyorR && this.canMoveRight()) { this.moveRight(t); }
            else if(tileFloor==floorTypes.conveyorU && this.canMoveUp())	{ this.moveUp(t); }
            else if(tileFloor==floorTypes.conveyorD && this.canMoveDown())	{ this.moveDown(t); }
        }
        else
        {
            this.position[0] = (this.tileFrom[0] * tileW) + ((tileW-this.dimensions[0])/2);
            this.position[1] = (this.tileFrom[1] * tileH) + ((tileH-this.dimensions[1])/2);

            if(this.tileTo[0] != this.tileFrom[0])
            {
                var diff = (tileW / moveSpeed) * (t-this.timeMoved);
                this.position[0]+= (this.tileTo[0]<this.tileFrom[0] ? 0 - diff : diff);
            }
            if(this.tileTo[1] != this.tileFrom[1])
            {
                var diff = (tileH / moveSpeed) * (t-this.timeMoved);
                this.position[1]+= (this.tileTo[1]<this.tileFrom[1] ? 0 - diff : diff);
            }

            this.position[0] = Math.round(this.position[0]);
            this.position[1] = Math.round(this.position[1]);
        }

        return true;
    }
    Character.prototype.canMoveTo = function(x, y)
    {
        if(x < 0 || x >= mapW || y < 0 || y >= mapH) { return false; }
        if(typeof this.delayMove[tileTypes[mapTileData.map[toIndex(x,y)].type].floor]=='undefined') { return false; }
        if(mapTileData.map[toIndex(x,y)].object!=null)
        {
            var o = mapTileData.map[toIndex(x,y)].object;
            if(objectTypes[o.type].collision==objectCollision.solid)
            {
                return false;
            }
        }
        return true;
    };
    Character.prototype.canMoveUp		= function() { return this.canMoveTo(this.tileFrom[0], this.tileFrom[1]-1); };
    Character.prototype.canMoveDown 	= function() { return this.canMoveTo(this.tileFrom[0], this.tileFrom[1]+1); };
    Character.prototype.canMoveLeft 	= function() { return this.canMoveTo(this.tileFrom[0]-1, this.tileFrom[1]); };
    Character.prototype.canMoveRight 	= function() { return this.canMoveTo(this.tileFrom[0]+1, this.tileFrom[1]); };
    Character.prototype.canMoveDirection = function(d) {
        switch(d)
        {
            case directions.up:
                return this.canMoveUp();
            case directions.down:
                return this.canMoveDown();
            case directions.left:
                return this.canMoveLeft();
            default:
                return this.canMoveRight();
        }
    };

    Character.prototype.moveLeft	= function(t) { this.tileTo[0]-=1; this.timeMoved = t; this.direction = directions.left; };
    Character.prototype.moveRight	= function(t) { this.tileTo[0]+=1; this.timeMoved = t; this.direction = directions.right; };
    Character.prototype.moveUp		= function(t) { this.tileTo[1]-=1; this.timeMoved = t; this.direction = directions.up; };
    Character.prototype.moveDown	= function(t) { this.tileTo[1]+=1; this.timeMoved = t; this.direction = directions.down; };
    Character.prototype.moveDirection = function(d, t) {
        switch(d)
        {
            case directions.up:
                return this.moveUp(t);
            case directions.down:
                return this.moveDown(t);
            case directions.left:
                return this.moveLeft(t);
            default:
                return this.moveRight(t);
        }
    };

    function toIndex(x, y)
    {
        return((y * mapW) + x);
    }

    function getFrame(sprite, duration, time, animated)
    {
        if(!animated) { return sprite[0]; }
        time = time % duration;

        for(x in sprite)
        {
            if(sprite[x].end>=time) { return sprite[x]; }
        }
    }

    window.onload = function()
    {
        ctx = document.getElementById('game').getContext("2d");
        requestAnimationFrame(drawGame);
        ctx.font = "bold 10pt sans-serif";

        window.addEventListener("keydown", function(e) {
            if(e.keyCode>=37 && e.keyCode<=40) { keysDown[e.keyCode] = true; }
        });
        window.addEventListener("keyup", function(e) {
            if(e.keyCode>=37 && e.keyCode<=40) { keysDown[e.keyCode] = false; }
            if(e.keyCode==83)
            {
                currentSpeed = (currentSpeed>=(gameSpeeds.length-1) ? 0 : currentSpeed+1);
            }
        });

        viewport.screen = [document.getElementById('game').width,
            document.getElementById('game').height];

        tileset = new Image();
        tileset.onerror = function()
        {
            ctx = null;
            alert("Failed loading tileset.");
        };
        tileset.onload = function() { tilesetLoaded = true; };
        tileset.src = tilesetURL;

        for(x in tileTypes)
        {
            tileTypes[x]['animated'] = tileTypes[x].sprite.length > 1 ? true : false;

            if(tileTypes[x].animated)
            {
                var t = 0;

                for(s in tileTypes[x].sprite)
                {
                    tileTypes[x].sprite[s]['start'] = t;
                    t+= tileTypes[x].sprite[s].d;
                    tileTypes[x].sprite[s]['end'] = t;
                }

                tileTypes[x]['spriteDuration'] = t;
            }
        }

        mapTileData.buildMapFromData(gameMap, mapW, mapH);
        mapTileData.addRoofs(roofList);
        mapTileData.map[((2*mapW)+2)].eventEnter = function()
        { console.log("Entered tile 2,2"); };

        var mo1 = new MapObject(1); mo1.placeAt(2, 4);
        var mo2 = new MapObject(2); mo2.placeAt(2, 3);

        var mo11 = new MapObject(1); mo11.placeAt(6, 4);
        var mo12 = new MapObject(2); mo12.placeAt(7, 4);

        var mo4 = new MapObject(3); mo4.placeAt(4, 5);
        var mo5 = new MapObject(3); mo5.placeAt(4, 8);
        var mo6 = new MapObject(3); mo6.placeAt(4, 11);

        var mo7 = new MapObject(3); mo7.placeAt(2, 6);
        var mo8 = new MapObject(3); mo8.placeAt(2, 9);
        var mo9 = new MapObject(3); mo9.placeAt(2, 12);
    };

    function drawGame()
    {
        if(ctx==null) { return; }
        if(!tilesetLoaded) { requestAnimationFrame(drawGame); return; }

        var currentFrameTime = Date.now();
        var timeElapsed = currentFrameTime - lastFrameTime;
        gameTime+= Math.floor(timeElapsed * gameSpeeds[currentSpeed].mult);

        var sec = Math.floor(Date.now()/1000);
        if(sec!=currentSecond)
        {
            currentSecond = sec;
            framesLastSecond = frameCount;
            frameCount = 1;
        }
        else { frameCount++; }

        if(!player.processMovement(gameTime) && gameSpeeds[currentSpeed].mult!=0)
        {
            if(keysDown[38] && player.canMoveUp())			{ player.moveUp(gameTime); }
            else if(keysDown[40] && player.canMoveDown())	{ player.moveDown(gameTime); }
            else if(keysDown[37] && player.canMoveLeft())	{ player.moveLeft(gameTime); }
            else if(keysDown[39] && player.canMoveRight())	{ player.moveRight(gameTime); }
        }

        viewport.update(player.position[0] + (player.dimensions[0]/2),
            player.position[1] + (player.dimensions[1]/2));

        var playerRoof1 = mapTileData.map[toIndex(
            player.tileFrom[0], player.tileFrom[1])].roof;
        var playerRoof2 = mapTileData.map[toIndex(
            player.tileTo[0], player.tileTo[1])].roof;

        ctx.fillStyle = "#000000";
        ctx.fillRect(0, 0, viewport.screen[0], viewport.screen[1]);

        for(var z = 0; z < mapTileData.levels; z++)
        {

            for(var y = viewport.startTile[1]; y <= viewport.endTile[1]; ++y)
            {
                for(var x = viewport.startTile[0]; x <= viewport.endTile[0]; ++x)
                {
                    if(z==0)
                    {
                        var tile = tileTypes[mapTileData.map[toIndex(x,y)].type];

                        var sprite = getFrame(tile.sprite, tile.spriteDuration,
                            gameTime, tile.animated);
                        ctx.drawImage(tileset,
                            sprite.x, sprite.y, sprite.w, sprite.h,
                            viewport.offset[0] + (x*tileW), viewport.offset[1] + (y*tileH),
                            tileW, tileH);
                    }

                    var o = mapTileData.map[toIndex(x,y)].object;
                    if(o!=null && objectTypes[o.type].zIndex==z)
                    {
                        var ot = objectTypes[o.type];

                        ctx.drawImage(tileset,
                            ot.sprite[0].x, ot.sprite[0].y,
                            ot.sprite[0].w, ot.sprite[0].h,
                            viewport.offset[0] + (x*tileW) + ot.offset[0],
                            viewport.offset[1] + (y*tileH) + ot.offset[1],
                            ot.sprite[0].w, ot.sprite[0].h);
                    }

                    if(z==2 &&
                        mapTileData.map[toIndex(x,y)].roofType!=0 &&
                        mapTileData.map[toIndex(x,y)].roof!=playerRoof1 &&
                        mapTileData.map[toIndex(x,y)].roof!=playerRoof2)
                    {
                        tile = tileTypes[mapTileData.map[toIndex(x,y)].roofType];
                        sprite = getFrame(tile.sprite, tile.spriteDuration,
                            gameTime, tile.animated);
                        ctx.drawImage(tileset,
                            sprite.x, sprite.y, sprite.w, sprite.h,
                            viewport.offset[0] + (x*tileW),
                            viewport.offset[1] + (y*tileH),
                            tileW, tileH);
                    }
                }
            }

            if(z==1)
            {
                var sprite = player.sprites[player.direction];
                ctx.drawImage(tileset,
                    sprite[0].x, sprite[0].y,
                    sprite[0].w, sprite[0].h,
                    viewport.offset[0] + player.position[0],
                    viewport.offset[1] + player.position[1],
                    player.dimensions[0], player.dimensions[1]);
            }

        }

        ctx.fillStyle = "#ff0000";
        ctx.fillText("FPS: " + framesLastSecond, 10, 20);
        ctx.fillText("Game speed: " + gameSpeeds[currentSpeed].name, 10, 40);

        lastFrameTime = currentFrameTime;
        requestAnimationFrame(drawGame);
    }

}