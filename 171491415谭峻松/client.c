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
 23         pthread_t thread;       // pthread_t �̣߳�gcc����ʱ�����-lpthread
 24         struct sockaddr_in serv_addr;   // struct sockaddr_in
 25         char buf[BUFFSIZE];
 26         // ��ʼ������˵�ַ�ṹ
 27         bzero(&serv_addr, sizeof(struct sockaddr_in));  // bzero ����
 28         serv_addr.sin_family = AF_INET;         // sin_family   AF_INET
 29         serv_addr.sin_port = htons(PORT);       // sin_port     htons(PORT)
 30         inet_pton(HOST_IP, &serv_addr.sin_addr);        // inet_pton
 31         // �����ͻ����׽���
 32         sockfd = socket(AF_INET, SOCK_STREAM, 0);       // socket �����׽���
 33         if(sockfd < 0)
 34         {
 35                 perror("fail to socket");
 36                 exit(-1);
 37         }
 38         // ���������������
 39         printf("connecting... \n");
 40         if(connect(sockfd, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0) // connect
 41         {
 42                 perror("fail to connect");
 43                 exit(-2);
 44         }
 45         /* === �Ӵ˴���ʼ ������������߳� === */
 46         // ����������Ϣ���̣߳����÷�����Ϣ�ĺ���snd
 47         pthread_create(&thread, NULL, (void *)(&snd), NULL);    // pthread_create
 48         // ������Ϣ���߳�
 49         while(1)
 50         {
 51                 int len;
 52                 if((len=read(sockfd, buf, BUFFSIZE)) > 0)       // read ��ȡͨ���׽���
 53                 {
 54                         buf[len] = '\0';        // ��ӽ�������������ʾ�������в���������
 55                         printf("\n%s", buf);
 56                         fflush(stdout);         // fflush ��ϴ��׼�����ȷ�����ݼ�ʱ��ʾ
 57                 }
 58         }
 59         return 0;
 60 }
 61 
 62 // ������Ϣ�ĺ���
 63 void snd()
 64 {
 65         char name[32], buf[BUFFSIZE];
 66 
 67         fgets(name, 32, stdin); // fgets ���ȡ�����ַ�����Ļ��з�
 68         write(sockfd, name, strlen(name));      // write д��ͨ���׽���
 69         while(1)
 70         {
 71                 fgets(buf, BUFFSIZE, stdin);
 72                 write(sockfd, buf, strlen(buf));
 73                 if(strcmp(buf, "bye\n") == 0)   // ע��˴���\n
 74                         exit(0);
 75         }
 76 }