function Hero(X,Y,map)
{
	this.name="";
	this.health=0;
	this.maxHealth=0;
	this.energy=0;
    this.maxEnergy=0;
    this.move=0;
    this.quickness=0;
    this.attack=0;
    this.defense=0;
    this.critical=0;
    this.level=0;
	this.image="";
	this.X=X;
	this.Y=Y;
	this.map=map;
	this.range=1;
	this.fight=0;
	this.type="";
	this.id="";
	this.capacities = "";

}
Hero.prototype=
{
	setXY :function(X,Y)
	{
		this.X=parseInt(X);
		this.Y=parseInt(Y);
	},
	setMap: function(map)
	{
		this.map=map;
	},
    setRange: function(range)
    {
        this.range=range;
    },
    setName:function(name)
    {
        this.name=name;
    },
	setHealth:function(health)
	{
		this.health=health;
	},
    setMaxHealth:function(maxHealth)
    {
        this.maxHealth=maxHealth;
    },
    setEnergy:function(energy)
    {
        this.energy=energy;
    },
    setMaxEnergy:function(maxEnergy)
    {
        this.maxEnergy=maxEnergy;
    },
    setMove:function(move)
    {
        this.move=move;
    },
    setQuickness:function(quickness)
    {
        this.quickness=quickness;
    },
    setAttack:function(attack)
    {
        this.attack=attack;
    },
    setDefense:function(defense)
    {
        this.defense=defense;
    },
    setCritical:function(critical)
    {
        this.critical=critical;
    },
    setLevel:function(level)
    {
        this.level=level;
    },
    setImage:function(image)
    {
        this.image=image;
    },
    setFight:function(fight)
    {
        this.fight=fight;
    },
    setType:function(type)
    {
        this.type=type;
    },
    setId:function(id)
    {
        this.id=id;
    },
	getX : function()
	{
		return this.X;
	},
	getY: function()
	{
		return this.Y;
	},
	getMap: function()
	{
		return this.map;
	},
    getRange: function()
    {
        return this.range;
    },
    getName:function()
    {
        return this.name;
    },
    getHealth:function()
    {
        return this.health;
    },
    getMaxHealth:function()
    {
        return this.maxHealth;
    },
    getEnergy:function()
    {
        return this.energy;
    },
    getMaxEnergy:function()
    {
        return this.maxEnergy;
    },
    getMove:function()
    {
        return this.move;
    },
    getQuickness:function()
    {
        return this.quickness;
    },
    getAttack:function()
    {
        return this.attack;
    },
    getDefense:function()
    {
        return this.defense;
    },
    getCritical:function()
    {
        return this.critical;
    },
    getLevel:function()
    {
        return this.level;
    },
    getImage:function()
    {
        return this.image;
    },
    getFight:function()
    {
        return this.fight;
    },
    getType:function()
    {
        return this.type;
    },
    getId:function()
    {
        return this.id;
    },
	gauche: function(){
        if(this.fight == undefined){
            var map = this.getMap();
            if(map[this.getY()][this.getX()-1] != undefined){
                if(map[this.getY()][this.getX()-1]['obstacle'] == "1" ){
                    this.crier('aie');
                } else {
                    map[this.getY()][this.getX()-1]['hero'] = 1;
                    map[this.getY()][this.getX()]['hero'] = 0;
                    map[this.getY()][this.getX()]['trigger'] = 0;
                    var plan=mapping(map);
                }
            }
            if(map[this.getY()][this.getX()]['trigger'] != "0"){
                this.trigger(map[this.getY()][this.getX()]['trigger']);
            }
            viewHero(this.getY(),this.getX(), this.getRange());
        }

				
	},
	droite: function(){
        if(this.fight == undefined) {
            var map = this.getMap();

            if (map[this.getY()][this.getX() + 1] != undefined) {
                if (map[this.getY()][this.getX() + 1]['obstacle'] == "1") {
                    this.crier('aie');
                } else {
                    map[this.getY()][this.getX() + 1]['hero'] = 1;
                    map[this.getY()][this.getX()]['hero'] = 0;
                    map[this.getY()][this.getX()]['trigger'] = 0;
                    var plan = mapping(map);
                }
            }
            if (map[this.getY()][this.getX()]['trigger'] != "0") {
                this.trigger(map[this.getY()][this.getX()]['trigger']);
            }
            viewHero(this.getY(), this.getX(), this.getRange());
        }
				
	},
	haut: function(){
	    alert('?');
        if(this.fight == undefined) {
            var map = this.getMap();

            if (map[this.getY() - 1][this.getX()] != undefined) {
                if (map[this.getY() - 1][this.getX()]['obstacle'] == "1") {
                    this.crier('aie');
                } else {
                    map[this.getY() - 1][this.getX()]['hero'] = 1;
                    map[this.getY()][this.getX()]['hero'] = 0;
                    map[this.getY()][this.getX()]['trigger'] = 0;
                    var plan = mapping(map);
                }
            }
            if (map[this.getY()][this.getX()]['trigger'] != "0") {
                this.trigger(map[this.getY()][this.getX()]['trigger']);
            }
            viewHero(this.getY(), this.getX(), this.getRange());
        }
				
	}
	,
	bas: function(){
        if(this.fight == undefined) {
            var map = this.getMap();

            if (map[this.getY() + 1][this.getX()] != undefined) {
                if (map[this.getY() + 1][this.getX()]['obstacle'] == "1") {
                    this.crier('aie');
                } else {
                    map[this.getY() + 1][this.getX()]['hero'] = 1;
                    map[this.getY()][this.getX()]['hero'] = 0;
                    map[this.getY()][this.getX()]['trigger'] = 0;
                    var plan = mapping(map);
                }
            }
            if (map[this.getY()][this.getX()]['trigger'] != "0") {
                this.trigger(map[this.getY()][this.getX()]['trigger']);
            }
            viewHero(this.getY(), this.getX(), this.getRange());
        }
				
	},
	crier:function(phrase)
	{
		$("#dialog").html('<p>'+phrase+'</p>');
	},
	trigger:function(trigger)
	{
		$(".btn-info").attr("data-target", "#"+trigger);
		$(".btn-info").click();
	},
	init:function(element)
	{
		var name = element.attr('name');this.setName(name);
        var image = element.attr('image');this.setImage(image);
        var health = element.attr('health');this.setHealth(health);
        var maxHealth = element.attr('maxHealth');this.setMaxHealth(maxHealth);
        var energy = element.attr('energy');this.setEnergy(energy);
        var maxEnergy = element.attr('maxEnergy');this.setMaxEnergy(maxEnergy);
        var move = element.attr('move');this.setMove(move);
        var quickness = element.attr('quickness');this.setQuickness(quickness);
        var attack = element.attr('attack');this.setAttack(attack);
        var defense = element.attr('defense');this.setDefense(defense);
        var critical = element.attr('critical');this.setCritical(critical);
        var level = element.attr('level');this.setLevel(level);
        var type = element.attr('type');this.setType(type);
        var id = element.attr('opponentid');this.setId(id);
        var fight = $('#zone').attr('fight');this.setFight(fight);

        console.dir(this);
	},
    play:function()
    {
        var caps = new Array;
        var nb = parseInt($("#"+this.type+this.id).attr('nbcap'));
        var x=1;
        while(x<(nb+1)){
            var attribut = 'cap'+x;
            caps.push($("#"+this.type+this.id).attr(attribut));
            x++;
        }
        console.log(caps);
        alert(this.getName()+ ': grrr');
    },
    toPlay:function()
    {
        var caps = read("/Ressources/capacities.txt");
        var test = JSON.parse(caps);
        this.capacities = new Array;
        var nbCap = $('#hero'+this.id).attr('nbCap');
        for (var i=1;i<=nbCap;i++){
            this.capacities.push($('#hero'+this.id).attr('cap'+i));
        }

        var y = new Array;
        this.capacities.forEach(function(element){
            test.forEach(function(e){
                if(e.id == element){
                    y.push(e);
                }
            })
        });
        y.forEach(function(element){
            var li = "<li title = '"+element.name+"'><img src='"+element.description+"' width='40' height='40'></li>";
            $("#capacity").append(li);
        })
    },
    teamPlay:function()
    {
        var caps = read("/Ressources/capacities.txt");
        var test = JSON.parse(caps);
        this.capacities = new Array;
        var nbCap = $('#team'+this.id).attr('nbCap');
        for (var i=1;i<=nbCap;i++){
            this.capacities.push($('#team'+this.id).attr('cap'+i));
        }

        var y = new Array;
        this.capacities.forEach(function(element){
            test.forEach(function(e){
                if(e.id == element){
                    y.push(e);
                }
            })
        });

        y.forEach(function(element){
            var li = "<li title = '"+element.name+"'><img src='"+element.description+"' width='40' height='40'></li>";
            $("#capacity").append(li);
        })
    },
    figth:function(){

    }
}