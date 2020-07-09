   1#include <stdio.h>
  2 #include <stdlib.h>     // exit
  3 #include <string.h>
  4 #include <unistd.h>     // bind listen
  5 #include <time.h>       // time(NULL)   ctime(&ticks)
  6 #include <netinet/in.h>
  7 #include <arpa/inet.h>  // 必须包含，用于inet_ntop
  8 
  9 #define PORT 8000
 10 #define MAXMEM 10 
 11 #define BUFFSIZE 128
 12 
 13 //#define DEBUG_PRINT 1         // 宏定义 调试开关
 14 #ifdef DEBUG_PRINT
 15 #define DEBUG(format, ...) printf("FILE: "__FILE__", LINE: %d: "format"\n", __LINE__, ##__VA_ARGS__)
 16 #else
 17 #define DEBUG(format, ...)
 18 #endif
 19 
 20 int listenfd, connfd[MAXMEM];
 21 
 22 void quit();
 23 void rcv_snd(int p);
 24 
 25 int main()
 26 {
 27         struct sockaddr_in serv_addr, cli_addr;
 28 //      int len = sizeof(cli_addr), i;
 29         int i;
 30         time_t ticks;
 31         pthread_t thread;
 32         char buff[BUFFSIZE];
 33 
 34         printf("running...\n(Prompt: enter command ""quit"" to exit server)\n");
 35         DEBUG("=== initialize...");     // 初始化填充服务端地址结构
 36         bzero(&serv_addr, sizeof(struct sockaddr_in));
 37         serv_addr.sin_family = AF_INET;
 38         serv_addr.sin_port = htons(PORT);
 39         serv_addr.sin_addr.s_addr = htonl(INADDR_ANY);
 40 
 41         DEBUG("=== socket..."); // socket 创建服务器端的监听套接字
 42         listenfd = socket(AF_INET, SOCK_STREAM, 0);
 43         if(listenfd < 0)
 44         {
 45                 perror("fail to socket");
 46                 exit(-1);
 47         }
 48 
 49         DEBUG("=== bind...");   // bind 将套接字与填充好的地址结构进行绑定
 50         if(bind(listenfd, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0)
 51         {
 52                 perror("fail to bind");
 53                 exit(-2);
 54         }
 55 
 56         DEBUG("=== listening..."); // listen 将主动连接套接字变为被动倾听套接字
 57         listen(listenfd, MAXMEM);
 58 
 59         /* === 创建一个线程，对服务器程序进行管理，调用quit函数 === */
 60         pthread_create(&thread, NULL, (void *)(quit), NULL);
 61 
 62         // 将套接字描述符数组初始化为-1，表示空闲
 63         for(i=0; i<MAXMEM; i++)
 64                 connfd[i] = -1;
 65 
 66         while(1)
 67         {
 68                 int len;// = sizeof(cli_addr);
 69                 for(i=0; i<MAXMEM; i++)
 70                 {
 71                         if(connfd[i] == -1)
 72                                 break;
 73                 }
 74                 // accept 从listen接受的连接队列中取得一个连接
 75                 connfd[i] = accept(listenfd, (struct sockaddr *)&cli_addr, &len);
 76                 if(connfd[i] < 0)
 77                 {
 78                         perror("fail to accept");
 79                 //      continue;       // 此句可以不用，accept会阻塞等待
 80                 }
 81                 ticks = time(NULL);
 82                 //sprintf(buff, "%.24s\r\n", ctime(&ticks));
 83                 printf("%.24s\n\tconnect from: %s, port %d\n",
 84                                 ctime(&ticks), inet_ntop(AF_INET, &(cli_addr.sin_addr), buff, BUFFSIZE),
 85                                 ntohs(cli_addr.sin_port));      // 注意 inet_ntop的使用，#include <arpa/inet.h>
 86 
 87                 /* === 针对当前套接字创建一个线程，对当前套接字的消息进行处理 === */
 88                 pthread_create(malloc(sizeof(pthread_t)), NULL, (void *)(&rcv_snd), (void *)i);
 89         }
 90         return 0;
 91 }
 92 
 93 void quit()
 94 {
 95         char msg[10];
 96         while(1)
 97         {
 98                 scanf("%s", msg);       // scanf 不同于fgets, 它不会读入最后输入的换行符
 99                 if(strcmp(msg, "quit") == 0)
100                 {
101                         printf("Byebye... \n");
102                         close(listenfd);
103                         exit(0);
104                 }
105         }
106 }
107 
108 void rcv_snd(int n)
109 {
110         int len, i;
111         char name[32], mytime[32], buf[BUFFSIZE];
112         time_t ticks;
113         int ret;
114 
115         // 获取此线程对应的套接字用户的名字
116         write(connfd[n], "your name: ", strlen("your name: "));
117         len = read(connfd[n], name, 32);
118         if(len > 0)
119                 name[len-1] = '\0';     // 去除换行符
120         strcpy(buf, name);
121         strcat(buf, "\tjoin in\n\0");
122         // 把当前用户的加入 告知所有用户
123         for(i=0; i<MAXMEM; i++)
124         {
125                 if(connfd[i] != -1)
126                         write(connfd[i], buf, strlen(buf));
127         }
128 
129         while(1)
130         {
131                 char temp[BUFFSIZE];
132                 if((len=read(connfd[n], temp, BUFFSIZE)) > 0)
133                 {
134                         temp[len-1] = '\0';
135                         // 当用户输入bye时，当前用户退出
136                         if(strcmp(temp, "bye") == 0)
137                         {
138                                 close(connfd[n]);
139                                 connfd[n] = -1;
140                                 pthread_exit(&ret);
141                         }
142                         ticks = time(NULL);
143                         sprintf(mytime, "%.24s\r\n", ctime(&ticks));
144                         //write(connfd[n], mytime, strlen(mytime));
145                         strcpy(buf, name);
146                         strcat(buf, "\t");
147                         strcat(buf, mytime);
148                         strcat(buf, "\r\t");
149                         strcat(buf, temp);
150                         strcat(buf, "\n");
151 
152                         for(i=0; i<MAXMEM; i++)
153                         {
154                                 if(connfd[i] != -1)
155                                         write(connfd[i], buf, strlen(buf));
156                         }
157                 }
158         }
159 
160 }