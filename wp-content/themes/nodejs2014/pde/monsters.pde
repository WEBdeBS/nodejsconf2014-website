abstract class Monster
{
  int x, y;
  Pimage icon = loadImage("/wp-content/themes/nodejs2014/img/mostro_"+Math.ceil(Math.random()*6)+".gif");
  Pimage icon2 = loadImage("/wp-content/themes/nodejs2014/img/mostro_hit.gif");
  float vx, vy, svx, svy;
  boolean isoutside;
  boolean hit = false;

  abstract void computeNextStep();
  abstract void draw();
  abstract boolean mouseOver(int mx, int my);
  void mousePressed() { hit = true; }
  void mouseReleased() { hit = false; }
}

// The monster
class NodeMonster extends Monster{

  NodeMonster(int x, int y, float vx, float vy){
    this.x = x; 
    this.y = y;
    this.vx = vx;
    this.vy = vy;
    svx = vx;
    svy = vy;
    isoutside = false;
  }

  void computeNextStep() {
    //if(!canmove) return;

    if(mouse){
      vx = vx + (mouseX - x-50) * (vx + (mouseX - x-50) < vx ? + 0.008 : +0.001) * random(0.9);
      vy = vy + (mouseY - y-50) * (vy + (mouseY - y-50) < vy ? + 0.008 : +0.001) * random(0.9);
      vx = vx > 7 ? 7 : vx < -7 ? -7 : vx;
      vy = vy > 7 ? 7 : vy < -7 ? -7 : vy;
    }else{
      vx = abs(vx) > abs(svx) ? vx + (vx > svx ? -0.1 : +0.1) : vx;
      vy = abs(vy) > abs(svy) ? vy + (vy > svy ? -0.1 : +0.1) : vy;
      
      if (!isoutside){
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

    isoutside = mouse && (x < 0 || x > width - icon.width || y < 0 || y > height - icon.height) ? true : isoutside;
    isoutside = !mouse && x >= 0 && x <= width - icon.width && y >= 0 && y <= height - icon.height ? false : isoutside;
  }

  void draw(){
    if(!hit)
      image(icon, x, y);
    else
      image(icon2, x, y);
  }

  boolean mouseOver(int mx, int my) {
    return x<=mx && mx<=x+icon.width && y<=my && my<=y+icon.height;
  }
}

// Global variables
boolean mouse = false;
int monsters_number = 15;
int max_width = window.innerWidth;
int max_height = $('.mostro-box').height();
Monster[] monsters = new Monster[monsters_number];

// Setup
void setup(){
  size( max_width, max_height);
  frameRate( 30 );

  for(int x=0; x<monsters_number; x++){
    monsters[x] = new NodeMonster(random(max_width), random(max_height), random(0.5, 1) * (random(1) > 0.5 ? -1 : 1), random(0.5, 1) * (random(1) > 0.5 ? -1 : 1) );
  }
}

// Main draw loop
void draw(){
  for(int x=0; x<monsters_number; x++){
    monsters[x].computeNextStep();
  }

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

void mousePressed() {
  for (int i=0; i<monsters_number; i++) { 
    if(monsters[i].mouseOver(mouseX, mouseY)) {
      monsters[i].mousePressed();
    }
  }
}

void mouseReleased() {
  for (int i=0; i<monsters_number; i++) { 
    monsters[i].mouseReleased();
  }
}
