  1  /*
  2  * FILE: client.c
  3  * DATE: 20180206
  4  * ==============
  5  */
  6 
  7 #include <stdio.h>
  8 #include <stdlib.h>
  9 #include <string.h>
 10 
 11 #include <netinet/in.h>
 12 
 13 #define BUFFSIZE 128
 14 #define HOST_IP "192.168.159.3"
 15 #define PORT 8000
 16 
 17 int sockfd;
 18 
 19 void snd();
 20 
 21 int main()
 22 {
 23         pthread_t thread;       // pthread_t 线程，gcc编译时需加上-lpthread
 24         struct sockaddr_in serv_addr;   // struct sockaddr_in
 25         char buf[BUFFSIZE];
 26         // 初始化服务端地址结构
 27         bzero(&serv_addr, sizeof(struct sockaddr_in));  // bzero 清零
 28         serv_addr.sin_family = AF_INET;         // sin_family   AF_INET
 29         serv_addr.sin_port = htons(PORT);       // sin_port     htons(PORT)
 30         inet_pton(HOST_IP, &serv_addr.sin_addr);        // inet_pton
 31         // 创建客户端套接字
 32         sockfd = socket(AF_INET, SOCK_STREAM, 0);       // socket 创建套接字
 33         if(sockfd < 0)
 34         {
 35                 perror("fail to socket");
 36                 exit(-1);
 37         }
 38         // 与服务器建立连接
 39         printf("connecting... \n");
 40         if(connect(sockfd, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0) // connect
 41         {
 42                 perror("fail to connect");
 43                 exit(-2);
 44         }
 45         /* === 从此处开始 程序分做两个线程 === */
 46         // 创建发送消息的线程，调用发送消息的函数snd
 47         pthread_create(&thread, NULL, (void *)(&snd), NULL);    // pthread_create
 48         // 接收消息的线程
 49         while(1)
 50         {
 51                 int len;
 52                 if((len=read(sockfd, buf, BUFFSIZE)) > 0)       // read 读取通信套接字
 53                 {
 54                         buf[len] = '\0';        // 添加结束符，避免显示缓冲区中残留的内容
 55                         printf("\n%s", buf);
 56                         fflush(stdout);         // fflush 冲洗标准输出，确保内容及时显示
 57                 }
 58         }
 59         return 0;
 60 }
 61 
 62 // 发送消息的函数
 63 void snd()
 64 {
 65         char name[32], buf[BUFFSIZE];
 66 
 67         fgets(name, 32, stdin); // fgets 会读取输入字符串后的换行符
 68         write(sockfd, name, strlen(name));      // write 写入通信套接字
 69         while(1)
 70         {
 71                 fgets(buf, BUFFSIZE, stdin);
 72                 write(sockfd, buf, strlen(buf));
 73                 if(strcmp(buf, "bye\n") == 0)   // 注意此处的\n
 74                         exit(0);
 75         }
 76 }