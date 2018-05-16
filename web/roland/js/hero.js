function Hero(X,Y,map)
{
	this.nom="Chevalier";
	this.pv=100;
	this.pvmax=100;
	this.ppv=100;
	this.image="chevalier_big.png";
	this.X=X;
	this.Y=Y;
	this.map=map;
	this.range=1;
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
	setPv:function(montant)
	{
		this.pv=montant;
	},
	setPpv:function(montant)
	{
		this.ppv=montant;
	},
	setPos:function(pos)
	{
		this.pos=pos;
	},
	getPos:function()
	{
		return this.pos;
	},
	getPv:function()
	{
		return this.pv;
	},
	getPvmax:function()
	{
		return this.pvmax;
	},
	getPpv:function()
	{
		return this.ppv;
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
	gauche: function(){
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
				
	},
	droite: function(){
		var map = this.getMap();

		if(map[this.getY()][this.getX()+1] != undefined){
			if(map[this.getY()][this.getX()+1]['obstacle'] == "1" ){
				this.crier('aie');
			} else {
				map[this.getY()][this.getX()+1]['hero'] = 1;
				map[this.getY()][this.getX()]['hero'] = 0; 
				map[this.getY()][this.getX()]['trigger'] = 0;
				var plan=mapping(map);
			}
		}
		if(map[this.getY()][this.getX()]['trigger'] != "0" ){
			this.trigger(map[this.getY()][this.getX()]['trigger']);
		}
        viewHero(this.getY(),this.getX(), this.getRange());
				
	},
	haut: function(){
		var map = this.getMap();

		if(map[this.getY()-1][this.getX()] != undefined){
			if(map[this.getY()-1][this.getX()]['obstacle'] == "1"){
				this.crier('aie');
			} else {
				map[this.getY()-1][this.getX()]['hero'] = 1;
				map[this.getY()][this.getX()]['hero'] = 0; 
				map[this.getY()][this.getX()]['trigger'] = 0;
				var plan=mapping(map);
			}
		}
		if(map[this.getY()][this.getX()]['trigger'] != "0" ){
			this.trigger(map[this.getY()][this.getX()]['trigger']);
		}
        viewHero(this.getY(),this.getX(), this.getRange());
				
	}
	,
	bas: function(){
		var map = this.getMap();

		if(map[this.getY()+1][this.getX()] != undefined){
			if(map[this.getY()+1][this.getX()]['obstacle'] == "1"){
				this.crier('aie');
			} else {
				map[this.getY()+1][this.getX()]['hero'] = 1;
				map[this.getY()][this.getX()]['hero'] = 0; 
				map[this.getY()][this.getX()]['trigger'] = 0;
				var plan=mapping(map);
			}
		}
		if(map[this.getY()][this.getX()]['trigger'] != "0" ){
			this.trigger(map[this.getY()][this.getX()]['trigger']);
		}
        viewHero(this.getY(),this.getX(), this.getRange());
				
	},
	crier:function(phrase)
	{
		$("#dialog").append('<p>'+phrase+'</p>');
	},
	trigger:function(trigger)
	{
		$(".btn-info").attr("data-target", "#"+trigger);
		$(".btn-info").click();
	}
}