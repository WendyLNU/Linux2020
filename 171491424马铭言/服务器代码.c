#include <stdlib.h>
#include <stdio.h>
#include <ermo.h>
#include <string.h>
#include <netdb.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <sys/socket.h>

#define MAXLINE 1000 //在一条消息中最大的输出字符数
#define LISTENQ 20//最大监听队列
#define PORT 1000//监听端口.
#define MAXFD 20//最大的在线用户数
void*get_ cien(void *):
int sockfd,i;
static int maxi=0;//maxi表示当前ciou 数组中最大的用户的i值
static int client[MAXFDI];

void revandsend(void)//监听转发线程入口函数
{
int index=0;
int nbytes=0;
char bffrt1024];
int len;
int outindex=0;
while(1)
{if(maxi>0)
{

memset(buffer,0,sizeof(buer));
nbytes=0;
//index++;
nbytes=read(client[index++ ],buffer,sizeof(buffer));
//	prinf("%d,%dln",index,client[index]);
if(nbytes>0)
{
buffer[nbytes]='0';
printf(" %sln",buffer);
outindex=0;
while(outindex<maxi)
{if(write(client[outindex++],buffer,sizeof(buffer))==-1)
{
fprintf(stderr, "Write Error:% sln" ,strerror(errno));
exit(1);
}
}}
if(index>=maxi)
index=0;
}
pthread_ exit(NULL);
}
int main(int argc, char *argv[])
{
//int client_ _fd[LISTENQ],clientnum=0;;
struct sockaddr_ in server_ addr;
struct sockaddr_ in client_ _addr;
int sin_ size,portnumber;
char hello[]="Hello! Are You Fine?n";
intthr_ id;
/* thread ID for the newly created thread */
pthread_ t P_ thread; ./* . thread's structure*/
int new_ fd=0;
memset(client,0,sizeof(clien));
if(argc!=1)
{
fprintf(sterr,"Usage:%s portnumberlaln" ,argv[0]);
exit(1);}
/*服务器端开始建立socket 描述符*/
if(sockfd=socket(AF_ INET ,SOCK_ STREAM,0))==-1)
{
fprintf(stderr,"Socket error:% s\n\a",strerror(errmo));
exit(1);}

/*服务器端填充sockaddr结构*/
bzero(& server_ addr,sizeof(struct sockaddr_ _in));
server_ _addr.sin_ family=AF_ INET;
server_ _addr .sin_ _addr.s_ _addr=htonl(INADDR_ ANY);
server_ addr.sin_ port=htons(PORT);
/*捆绑sockfd描述符*/
if(bind(sockfd,(struct sockaddr *)(&server_ _addr),sizeof(struct sockadd))==-1)
{
fprintf(stderr,"Bind error:%s\n\a" ,strerror(errno));
exit(1);
}
printf("服务器监听端口%d..\n" ,PORT);/*监听. sockfd描述符*/
if(listen(sockfd,LISTENQ)==-1)
{
fprintf(stderr,"Listen error:% s\na,",strerror(ermo));
exit(1);}
thr_ id = pthread_ _create(&p_ _thread, NULL, reevandsend, NULL);
printf("NAME:Li Junnan No:80006 12030 Class:Ji ruan121\n");
printf("Welcome to the chat room!!!n");
while(1)
{
/*服务器阻塞,直到客户程序建立连接*/
if(maxi>=20)
{
printf("Over the max peopleln");
continue;
}
sin_ _size=sizeof(struct sockaddr_ in);
if((new_ fd=accept(sockfd,(struct*)(&client_ _addr),&sin_ size))==-1)
{
fprintf(stderr," 'Accept error: %slnla" ,strerror(errno));
exit(1);}
/*fprintf(stderr,"Server get from %sln",inet_ ntoa(client_ _addr.sin_ _addr));*/
client[maxi++]=new_ fd;
printf("lnNew %d user come to the chat roomln" ,new_ fd-3);}
close(sockfd);

exit(O);
}