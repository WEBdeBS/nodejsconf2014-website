/* @pjs preload="/wp-content/themes/nodejs2014/img/mostro_1.gif,/wp-content/themes/nodejs2014/img/mostro_2.gif,/wp-content/themes/nodejs2014/img/mostro_3.png,/wp-content/themes/nodejs2014/img/mostro_4.gif,/wp-content/themes/nodejs2014/img/mostro_5.gif,/wp-content/themes/nodejs2014/img/mostro_6.gif"; 
        transparent="true";
*/

// The monster
class Monster{
  Pimage icon;
  int x, y;

  Monster(Pimage image, int startx, int starty){
    icon = image;
    x = startx; 
    y = starty;
  }

  void draw(){
    image(icon, x, y);
  }
}

// Global variables
int monsters_number = 50;
int monster_icons_nr = 6;
int max_width = window.innerWidth;
int max_height = $('.mostro-box').height();
Monster[] monsters = new Monster[monsters_number];
PImage[] monster_icons = new PImage[monster_icons_nr];

// Setup
void setup(){

  size( max_width, max_height);
  frameRate( 30 );

  for(int x=0; x<monster_icons_nr; x++){
    monster_icons[x] = loadImage("/wp-content/themes/nodejs2014/img/mostro_"+(x+1)+".gif");
  }

  for(int x=0; x<monsters_number; x++){
    monsters[x] = new Monster(monster_icons[x % monster_icons_nr], random(max_width), random(max_height));
  }
}

// Main draw loop
void draw(){
  size(window.innerWidth,$('.mostro-box').height());

  background(0,0);

  for(int x=0; x<monsters_number; x++){
    monsters[x].draw();
  }                
}


// Set circle's next destination
void mouseMoved(){
  
} 