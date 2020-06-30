#include <stdlib.h>
#include <stdio.h>
#include <errno.h>
#include <string.h>
#include <netdb.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <sys/socket.h>
#define TRUE 1
#define PORT 1000
static int sockfd;
void recvfromserver（)//接受服务器消息线程入口函数
{
char mes[ 1024];int nbytes=0;
while(1)
{
memset(mes,0,sizeof(mes));
nbytes=read(sockfd,mes,sizeof(mes));
if(nbytes>0)
{mes[nbytes]="0';
printf("%sln" ,mes);}
}
pthread_ exit(NULL);
}
int main(int argc, char *argv[])
{
// int sockfd;
char buffer[ 1024];
struct sockaddr_ in server_ addr;
struct hostent *host;
int portnumber,nbytes;char *strhost=" 127.0.0.1";
char clientname[20];
char password[20];
char mes[ 1024];
Int thr_ id;
/* thread ID for the newly created thread */
pthread_ _t p. _thread;/* thread's structure*/

if(argc!=1)
{
fnitstsed."0sge:%s 'aln' ,rgv[0);
exit(1);}
if(hosgethostbyamestrbos)ULL)
{
frintf(terte,"Gethostname ertn");
exit(1);
}



/*客户程序开始建立sockfd 描述符*/ .
printf("Creating the Set inferface..n");
if(sockfd=socket(AF_ INET,SOCK_ STREAM,0))==-1)
{
fprintf(stderr,"Socket Error:% s\a\n" ,strerror(errno));
exit(1);}

/*客户程序填充服务端的资料*/
bzero( &server_ _addr, sizeof(server_ _add));
server_ addr.sin_ family=AF_ INET;
server_ _addr.sin_ port=htons(PORT);
server_ _addr .sin_ addr=*((struct in_ _addr *)host->h_ addr);
printf("The successful landing\nWelcome to zhe chat room!\n");/*客户程序发起连接请求*/
if(connect(sockfd,(structsockaddr*)(&server_ addr),sizeof(structsockaddr))==-1)
{
fprintf(stderr, "Connect Error:%slaln" ,strerror(errno));
exit(1);
}
/*连接成功了*/

printf("The successful landinglnWelcome to zhe chat room!n");printf("Please enter your nickname:In");
scanf("%s",clientname);
printf("Please enter your password:1n");
scanf("%s",password);
printf("lnThe successful landing");
//
write(sockfd,clientname,sizeof(clientname));
printf("lnNow you can chat with others!€" "Quit"CUT DOWN LANDINGInln");

thr_ _id = pthread_ _create(&p_ thread, NULL, recvfromserver, NULL);
while(1)
{
memset(buffer,0,sizeof(buffer));
memset( mes,0,sizeof(mes));
scanf("%s",buffer);
strcat(mes,clientname);
strcat(mes,":");
strcat( mes,buffer);

//printf(" main thread %sln",mes);
if((write(sockfd,mes,sizeof(mes)))==-1)
{
fprintf(stderr,"Write Error:%sln",strerror(errno));
exit(1);
}
if(strcmp(buffer,"Quit")==0)
{break;}
}
}
/*结束通讯*/
close(sockfd);
exit(0);