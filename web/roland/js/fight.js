
$(document).ready(function()
{
    init_fight();
    init_f();
});

function init_f() {
    var ctx = null;
    var tileW = 40, tileH = 40;
    var map = mapBuilding();

    //console.log(map);
    var mapW = map[0].length, mapH = map.length;

    var gameMap = new Array;
    var heroPosition = new Array;
    var tileEvents = new Array;
    for (var i = 0; i < mapH; i++) {
        for (var j = 0; j < mapW; j++) {
            switch (map[i][j]['decor']) {
                case 'arbre':
                    gameMap.push(0);
                    break;
                case 'herbe':
                    gameMap.push(2);
                    break;
                case 'arbre_sombre':
                    gameMap.push(3);
                    break;
                case 'souche':
                    gameMap.push(6);
                    break;
                case 'hutte':
                    gameMap.push(5);
                    break;
                default:
                    gameMap.push(1);
            }
            if (map[i][j]['hero'] == 1) {
                heroPosition[1] = i;
                heroPosition[0] = j;
            }
            if (map[i][j]['trigger'] != "0") {
                tileEvents[toIndex(j, i)] = map[i][j]['trigger'];
            }
            if (map[i][j]['monster'] != "0") {
                gameMap.pop();
                gameMap.push(map[i][j]['monster']);
            }
        }
    }
    //var warFogMap = warMap(map,2);
    var currentSecond = 0, frameCount = 0, framesLastSecond = 0, lastFrameTime = 0;
    var tileset = null, tilesetURL = "/images/tileset.png", tilesetLoaded = false;
    var floorTypes = {
        solid: 0,
        path: 1,
        water: 2
    };
    var tileTypes = {
        3: {colour: "#685b48", floor: floorTypes.solid, sprite: [{x: 40, y: 40, w: 40, h: 40}]},
        2: {colour: "#5aa457", floor: floorTypes.path, sprite: [{x: 40, y: 0, w: 40, h: 40}]},
        1: {colour: "#e8bd7a", floor: floorTypes.path, sprite: [{x: 80, y: 0, w: 40, h: 40}]},
        0: {colour: "#286625", floor: floorTypes.solid, sprite: [{x: 0, y: 40, w: 40, h: 40}]},
        4: {colour: "#678fd9", floor: floorTypes.water, sprite: [{x: 160, y: 0, w: 40, h: 40}]},
        5: {colour: "#e8bd7a", floor: floorTypes.path, sprite: [{x: 200, y: 40, w: 40, h: 40}]},
        6: {colour: "#e8bd7a", floor: floorTypes.path, sprite: [{x: 160, y: 80, w: 40, h: 40}]},
        7: {colour: "#685b48", floor: floorTypes.solid, sprite: [{x: 0, y: 0, w: 40, h: 40}]},
        "/images/wolf.jpg": {colour: "#e8bd7a", floor: floorTypes.solid, sprite: [{x: 200, y: 0, w: 40, h: 40}]},
        "/images/biche.jpg": {colour: "#e8bd7a", floor: floorTypes.solid, sprite: [{x: 160, y: 40, w: 40, h: 40}]},
        "/images/cerf.png": {colour: "#e8bd7a", floor: floorTypes.solid, sprite: [{x: 200, y: 80, w: 40, h: 40}]}
    };

    var directions = {
        up: 0,
        right: 1,
        down: 2,
        left: 3
    };

    var keysDown = {
        37: false,
        38: false,
        39: false,
        40: false
    };

    var player = new Character();

    function Character() {
        this.tileFrom = [heroPosition[0], heroPosition[1]];
        this.tileTo = [heroPosition[0], heroPosition[1]];
        this.timeMoved = 0;
        this.dimensions = [30, 30];
        this.position = [(heroPosition[0] * tileH) + 5, (heroPosition[1] * tileW) + 5];
        this.delayMove = 700;

        this.direction = directions.up;
        this.sprites = {};
        this.sprites[directions.up] = [{x: 0, y: 120, w: 30, h: 30}];
        this.sprites[directions.right] = [{x: 0, y: 150, w: 30, h: 30}];
        this.sprites[directions.down] = [{x: 0, y: 180, w: 30, h: 30}];
        this.sprites[directions.left] = [{x: 0, y: 210, w: 30, h: 30}];
    }

    //console.dir(player);

    Character.prototype.placeAt = function (x, y) {
        this.tileFrom = [x, y];
        this.tileTo = [x, y];
        this.position = [((tileW * x) + ((tileW - this.dimensions[0]) / 2)),
            ((tileH * y) + ((tileH - this.dimensions[1]) / 2))];
    };
    Character.prototype.processMovement = function (t) {
        if (this.tileFrom[0] == this.tileTo[0] && this.tileFrom[1] == this.tileTo[1]) {
            return false;
        }

        if ((t - this.timeMoved) >= this.delayMove) {
            this.placeAt(this.tileTo[0], this.tileTo[1]);
            //console.log(this.tileTo[0]+'/'+this.tileTo[1]);
            var map = mapBuilding();
            map[this.tileTo[1]][this.tileTo[0]]['hero'] = 1;

            if (typeof tileEvents[toIndex(this.tileTo[0], this.tileTo[1])] != 'undefined') {
                // alert('event');
                // alert(tileEvents[toIndex(this.tileTo[0], this.tileTo[1])]);
                // $(".btn-info").attr("data-target", "#"+tileEvents[toIndex(this.tileTo[0], this.tileTo[1])]);
                // $(".btn-info").click();
                hero.crier($("#" + tileEvents[toIndex(this.tileTo[0], this.tileTo[1])]).find(".modal-body").html());
                tileEvents[toIndex(this.tileTo[0], this.tileTo[1])] = undefined;

            }

            if (fogCtx != null) {
                var fog_gd = fogCtx.createRadialGradient(0, 0, 60, player.position[0], player.position[1], 120);
                fog_gd.addColorStop(0, 'rgba(0,0,0,0)');
                fog_gd.addColorStop(1, 'rgba(0,0,0,1)');
                fogCtx.fillStyle = fog_gd;
                fogCtx.beginPath();
                fogCtx.arc(player.position[0] + 15, player.position[1] + 20, 80, 0, 2 * Math.PI);
                fogCtx.closePath();
                fogCtx.fill();
            }

        }
        else {
            this.position[0] = (this.tileFrom[0] * tileW) + ((tileW - this.dimensions[0]) / 2);
            this.position[1] = (this.tileFrom[1] * tileH) + ((tileH - this.dimensions[1]) / 2);

            if (this.tileTo[0] != this.tileFrom[0]) {
                var diff = (tileW / this.delayMove) * (t - this.timeMoved);
                this.position[0] += (this.tileTo[0] < this.tileFrom[0] ? 0 - diff : diff);
            }
            if (this.tileTo[1] != this.tileFrom[1]) {
                var diff = (tileH / this.delayMove) * (t - this.timeMoved);
                this.position[1] += (this.tileTo[1] < this.tileFrom[1] ? 0 - diff : diff);
            }

            this.position[0] = Math.round(this.position[0]);
            this.position[1] = Math.round(this.position[1]);
        }

        return true;
    }

    Character.prototype.canMoveTo = function (x, y) {
        if (x < 0 || x >= mapW || y < 0 || y >= mapH) {
            return false;
        }
        // if(tileTypes[warFogMap[toIndex(x,y)]].floor!=floorTypes.path) { return false; }
        if (tileTypes[gameMap[toIndex(x, y)]].floor != floorTypes.path) {
            return false;
        }
        return true;
    };
    Character.prototype.canMoveUp = function () {
        return this.canMoveTo(this.tileFrom[0], this.tileFrom[1] - 1);
    };
    Character.prototype.canMoveDown = function () {
        return this.canMoveTo(this.tileFrom[0], this.tileFrom[1] + 1);
    };
    Character.prototype.canMoveLeft = function () {
        return this.canMoveTo(this.tileFrom[0] - 1, this.tileFrom[1]);
    };
    Character.prototype.canMoveRight = function () {
        return this.canMoveTo(this.tileFrom[0] + 1, this.tileFrom[1]);
    };

    // Character.prototype.moveLeft	= function(t) { this.tileTo[0]-=1; this.timeMoved = t; };
    // Character.prototype.moveRight	= function(t) { this.tileTo[0]+=1; this.timeMoved = t; };
    // Character.prototype.moveUp	    = function(t) { alert('ici');this.tileTo[1]-=1; this.timeMoved = t; };
    // Character.prototype.moveDown	= function(t) { this.tileTo[1]+=1; this.timeMoved = t; };

    Character.prototype.moveLeft = function (t) {
        this.tileTo[0] -= 1;
        this.timeMoved = t;
        this.direction = directions.left;
    };
    Character.prototype.moveRight = function (t) {
        this.tileTo[0] += 1;
        this.timeMoved = t;
        this.direction = directions.right;
    };
    Character.prototype.moveUp = function (t) {
        this.tileTo[1] -= 1;
        this.timeMoved = t;
        this.direction = directions.up;
    };
    Character.prototype.moveDown = function (t) {
        this.tileTo[1] += 1;
        this.timeMoved = t;
        this.direction = directions.down;
    };

    function toIndex(x, y) {
        return ((y * mapW) + x);
    }

    window.onload = function () {

        if ($('#game').html() != undefined) {
            ctx = document.getElementById('game').getContext("2d");
            fogCtx = document.getElementById('fog').getContext("2d");


            fogCtx.globalAlpha = 1;
            fogCtx.fillStyle = "black";
            fogCtx.fillRect(0, 0, mapW * tileW, mapH * tileH);
            fogCtx.globalCompositeOperation = "destination-out";

            var fog_gd = fogCtx.createRadialGradient(0, 0, 60, player.position[0], player.position[1], 120);
            fog_gd.addColorStop(0, 'rgba(0,0,0,0)');
            fog_gd.addColorStop(1, 'rgba(0,0,0,1)');
            fogCtx.fillStyle = fog_gd;
            fogCtx.beginPath();
            fogCtx.arc(player.position[0] + 15, player.position[1] + 20, 80, 0, 2 * Math.PI);
            fogCtx.closePath();
            fogCtx.fill();
        }
        if (document.getElementById('fight') != undefined) {
            ctx = document.getElementById('fight').getContext("2d");
            fogCtx = null;
        }


        console.log(player.position[0], player.position[1]);

        requestAnimationFrame(drawGame);
        ctx.font = "bold 10pt sans-serif";

        window.addEventListener("keydown", function (e) {
            if (e.keyCode >= 37 && e.keyCode <= 40) {
                keysDown[e.keyCode] = true;
            }
            else {
                if (e.keyCode >= 116 && e.keyCode <= 123) {
                    e.preventDefault();
                    return false;
                }
            }
        });
        window.addEventListener("keyup", function (e) {
            if (e.keyCode >= 37 && e.keyCode <= 40) {
                keysDown[e.keyCode] = false;
            }
        });

        tileset = new Image();
        tileset.onerror = function () {
            ctx = null;
            alert("Failed loading tileset.");
        };
        tileset.onload = function () {
            tilesetLoaded = true;
        };
        tileset.src = tilesetURL;
    };

    function drawGame() {
        if (ctx == null) {
            return;
        }
        if (!tilesetLoaded) {
            requestAnimationFrame(drawGame);
            return;
        }

        var currentFrameTime = Date.now();
        var timeElapsed = currentFrameTime - lastFrameTime;

        var sec = Math.floor(Date.now() / 1000);
        if (sec != currentSecond) {
            currentSecond = sec;
            framesLastSecond = frameCount;
            frameCount = 1;
        } else {
            frameCount++;
        }

        if (!player.processMovement(currentFrameTime)) {
            if (keysDown[38] && player.canMoveUp()) {
                player.moveUp(currentFrameTime);
            }
            else if (keysDown[40] && player.canMoveDown()) {
                player.moveDown(currentFrameTime);
            }
            else if (keysDown[37] && player.canMoveLeft()) {
                player.moveLeft(currentFrameTime);
            }
            else if (keysDown[39] && player.canMoveRight()) {
                player.moveRight(currentFrameTime);
            }
        }

        for (var y = 0; y < mapH; ++y) {
            for (var x = 0; x < mapW; ++x) {
                // var tile = tileTypes[warFogMap[toIndex(x,y)]];
                var tile = tileTypes[gameMap[toIndex(x, y)]];
                ctx.drawImage(tileset,
                    tile.sprite[0].x, tile.sprite[0].y, tile.sprite[0].w, tile.sprite[0].h,
                    (x * tileW), (y * tileH),
                    tileW, tileH);
            }
        }

        var sprite = player.sprites[player.direction];
        ctx.drawImage(tileset,
            sprite[0].x, sprite[0].y, sprite[0].w, sprite[0].h,
            player.position[0], player.position[1],
            player.dimensions[0], player.dimensions[1]);

        lastFrameTime = currentFrameTime;
        map = mapBuilding();
        // console.log(map);
        // warFogMap = warMap(map,2);
        requestAnimationFrame(drawGame);
    }
}

