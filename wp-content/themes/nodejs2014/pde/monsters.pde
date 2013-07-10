/* @pjs preload="/wp-content/themes/nodejs2014/img/mostro_1.gif,/wp-content/themes/nodejs2014/img/mostro_2.gif,/wp-content/themes/nodejs2014/img/mostro_3.gif,/wp-content/themes/nodejs2014/img/mostro_4.gif,/wp-content/themes/nodejs2014/img/mostro_5.gif,/wp-content/themes/nodejs2014/img/mostro_6.gif"; 
        transparent="true";
*/

// The monster
class Monster{
  Pimage icon;
  int x, y;
  float vx, vy, svx, svy;
  boolean outside;

  Monster(Pimage image, int startx, int starty){
    icon = image;
    x = startx; 
    y = starty;
    vx = random(0.5, 1) * (random(1) > 0.5 ? -1 : 1);
    vy = random(0.5, 1) * (random(1) > 0.5 ? -1 : 1);
    svx = vx;
    svy = vy;
    outside = false;
  }

  void draw(){
    if(mouse){
      vx = vx + (mouseX - x-50) * (vx + (mouseX - x-50) < vx ? + 0.008 : +0.001) * random(0.9);
      vy = vy + (mouseY - y-50) * (vy + (mouseY - y-50) < vy ? + 0.008 : +0.001) * random(0.9);
      vx = vx > 7 ? 7 : vx < -7 ? -7 : vx;
      vy = vy > 7 ? 7 : vy < -7 ? -7 : vy;
    }else{
      vx = abs(vx) > abs(svx) ? vx + (vx > svx ? -0.1 : +0.1) : vx;
      vy = abs(vy) > abs(svy) ? vy + (vy > svy ? -0.1 : +0.1) : vy;
      
      if (!outside){
        vx = x > width - icon.width || x < 0 ? -vx : vx;
        vy = y > height - icon.height || y < 0 ? -vy : vy;
        x  = x > width - icon.width ? width - icon.width - 1 : x < 0 ? 1 : x;
        y  = y > height - icon.height ? height - icon.height - 1 : y < 0 ? 1 : y;
      }else{
        vx = x < 0 ? abs(vx) : x > width - icon.width ? -abs(vx) : vx;
        vy = y < 0 ? abs(vy) : y > height - icon.height ? -abs(vy) : vy;
      }

    }
    x = x + vx;
    y = y + vy;

    outside = mouse && (x < 0 || x > width - icon.width || y < 0 || y > height - icon.height) ? true : outside;
    outside = !mouse && x >= 0 && x <= width - icon.width && y >= 0 && y <= height - icon.height ? false : outside;

    image(icon, x, y);
  }
}

// Global variables
boolean mouse = false;
int monsters_number = 15;
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

void mouseOut() {
  mouse = false;
}

void mouseOver() {
  mouse = true;
}
