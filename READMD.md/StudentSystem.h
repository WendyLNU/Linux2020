#include<stdio.h>
#include<conio.h>		
#include<stdlib.h>		
#include<string.h>		

//����һ��ѧ��
typedef struct tagStudent {
	char szName[20];	//����
	char szSex[4];		//�Ա�
	int  nAge;			//����
	int  nStuNo;		//ѧ��
	int  nScore;		//�ɼ�
}Student;

//����
//�ڵ�
typedef struct tagNode
{
	Student stu;			//ѧ����Ϣ
	struct tagNode* pNext;	//ָ����һ���ڵ�
}Node;

//����ͷ�ڵ�
Node* p_Head = NULL;		//ָ��ͷ�ڵ�


//�˵�
void Menu();
//1.¼��ѧ����Ϣ
void InputStudent();
//2.��ӡѧ����Ϣ
void PrintStudent();
//3.����ѧ����Ϣ
void SaveStudent();
//4.��ȡѧ����Ϣ
void ReadStudent();
//5.ͳ������ѧ������
void CountStudent();
//6.����ѧ����Ϣ
void FindStudent();
//7.�޸�ѧ����Ϣ
void ChangeStudent();
//8.ɾ��ѧ����Ϣ
void DeleteStudent();