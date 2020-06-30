#include <stdlib.h>
#include <string.h>
#include <SDL/SDL.h>
#include <math.h>
#include "SDL/SDL_draw.h"

int main(){
	int i;
	double t;
	double x,y;
	double x0=320,y0=240;
	Uint32 screen_color;
	SDL_Surface *screen;
	if(SDL_Init(SDL_INIT_VIDEO)<0){
		fprintf(stderr,"无法初始化：%s\n",SDL_GetError());
		exit(1);
	}
	screen=SDL_SetVideoMode(640,480,16,SDL_SWSURFACE);
	if(screen==NULL){
		fprintf(stderr,"无法设置视频模式：%s\n",SDL_GetError());
		exit(1);
	}
	atexit(SDL_Quit);
	for(i=0;i<550;i+=2){
		x=240-120*sin(3.14*i/180);
		i+=2;
		y=240-120*sin(3.14*i/180);
		Draw_Circle(screen,i+40,y,40,SDL_MapRGB(screen->format,255,0,0));
		SDL_Delay(2);
		Draw_Line(screen,i+40,x,i+42,y,SDL_MapRGB(screen->format,0,255,0));
		SDL_Delay(2);
		SDL_UpdateRect(screen,0,0,0,0);
	}
	SDL_UpdateRect(screen,0,0,0,0);
	SDL_Delay(2000);
	return 0;
}
