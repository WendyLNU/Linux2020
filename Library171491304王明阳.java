package bookSys;
import java.util.Scanner;
/*
 *      171491304
 *             ������
 *             ͼ�����ϵͳ
 */
public class Library {
	
	    public static void main(String[] args){
	        Scanner a=new Scanner(System.in);
	        
	                String[] name=new String[20];
	                int States[]=new int[20];
	                String[] uname1=new String[20];
	                int dates[]=new int[20];
	                int Count[]=new int[20];
	                
	                String[] uname=new String[20];
	                int code[]=new int[20];
	                String[] name1=new String[20];
	                
	                name[0]="��ǹ";
	                States[0]=1;
	                uname1[0]="alice";
	                dates[0]=15;
	                Count[0]=13;

	                name[1]="���м�";
	                States[1]=0;
	                uname1[1]=null;
	                dates[1]=0;
	                Count[1]=18;

	                name[2]="Linux";
	                States[2]=0;
	                uname1[2]=null;
	                dates[2]=0;
	                Count[2]=23;

	       
	                uname[0]="alice";
	                code[0]=123456;
	                name1[0]="��ǹ";
	             
	                uname[1]="����";
	                code[1]=456789;
	                name1[1]=null;
	                
	                boolean flag=true;
	                
	                int num,k=0;

	        do{
	            System.out.println(" ��ӭʹ�ñ�ͼ�����ϵͳ");
	            System.out.println("******0.�û���¼*****");
	            System.out.println("******1.�û�ע��*****");
	            System.out.println("******2.�鿴�û�*****");
	            System.out.println("******3.ɾ���û�*****");
	            System.out.println("******4.�鿴ͼ��*****");        
	            System.out.println("******5.����ͼ��*****");    
	            System.out.println("******6.����ͼ��*****");    
	            System.out.println("******7.�黹ͼ��*****");
	            System.out.println("******8.ɾ��ͼ��*****");
	            System.out.println("******9.�˳�ϵͳ*****");
	            System.out.println("����в���");
	            int input=a.nextInt();
	            switch(input){
	            case 0:
	            	System.out.println("�û���¼");
	                System.out.println("�û�����");
	                String mz=a.next();
	                for(int i=0;i<uname.length;i++){
	                    if(uname[i].equals(mz)){
	                    	System.out.println("���룺");
	                    	if(code[i]==a.nextInt()) {
	                    		System.out.println("��¼�ɹ�");
	                    		k=1;
	                    		break;
	                    	}else {
	                    		System.out.println("�������");
	                    		break;
	                    	}
	                    }
	                }
	                break;
	            case 1:
	            	System.out.println("���û���ע��");
                    	for(int j=0;j<uname.length;j++){
    	                    if(uname[j]!=null){  
    	                    }else{
    	                    	System.out.println("�������û�����");
    	                        uname[j]=a.next();
    	                        System.out.println("���������룺");
    	                        code[j]=a.nextInt();
    	                        System.out.println("ע��ɹ�");
    	                        
    	                        break;
    	                    }
    	                }
    	               
                    break;
                case 2:
	            	if(k==1) {
	            	System.out.println("\t\t\t�û���Ϣ");
	                System.out.println("�û����\t\t�û���\t\t����\t\t�����鼮");
	                
	                for(int i=0;i<uname.length;i++){
	                    if(uname[i]!=null){
	                        String uname13=(uname[i]==null?" ":uname[i]);
	                        String code13=(code[i]==0?" ":code[i]+" ");
	                        String name13=(name1[i]==null?" ":name1[i]);
	                        System.out.println((i+1)+"\t\t"+uname13+"\t\t"+code13+"\t\t"+name13);
	                    }else{
	                        
	                        break;
	                    }
	                }
	                break;}
	            	else {
	            		System.out.print("���¼\n");
	            		break;
	            	}
	            case 3:
	            	if(k==1) {
	            	int ind=-1;
	                System.out.print("������Ҫɾ�����û�����");
	                String de=a.next();
	                for(int i=0;i<uname.length-1;i++){
	                    if(uname[i].equals(de)){
	                        ind=i;
	                        break;
	                    }
	                }
	                if(ind!=-1){
	                    for(int i=ind;i<uname.length;i++){
	                    	if(i!=uname.length-1){
	                    		uname[i]=uname[i+1];
	                    		code[i]=code[i+1];
	                    		name1[i]=name1[i+1];
	                    	}
	                    }
	                    System.out.print("ɾ���ɹ�\n");
	                }
	                 break;}
	            	else{
	            		System.out.print("���¼\n");
	            		break;
	            	}
	            case 4:
	            	if(k==1) {
	                System.out.println("\t\t\t\t\tͼ���б�");
	                System.out.println("ͼ�����\t\tͼ������\t\tͼ��״̬\t\t�û�\t\t����ʱ��\t\t���Ĵ���");
	                
	                for(int i=0;i<name.length;i++){
	                    if(name[i]!=null){
	                        String state=(States[i]==0?"�ɽ���":"�ѽ��");
	                        String uname12=(uname1[i]==null?" ":uname1[i]);
	                        String date=(dates[i]==0?" ":dates[i]+"��");
	                        String Count1=Count[i]+"��";
	                        System.out.println((i+1)+"\t\t"+name[i]+"\t\t"+state+"\t\t"+uname12+"\t\t"+date+"\t\t"+Count1);
	                    }else{
	                        
	                        break;
	                    }
	                }
	                break;}
	            	else{
	            		System.out.print("���¼\n");
	            		break;
	            	}
	            case 5:
	                if(k==1) {
	            	System.out.print("����ͼ������:");
	                for(int i=0;i<name.length;i++){
	                    if(name[i]!=null){  
	                    }else{
	                        name[i]=a.next();
	                        System.out.print(name[i]+"ͼ�������\n");
	                        break;
	                    }
	                }
	                break;}
	            	else{
	            		System.out.print("���¼\n");
	            		break;
	            	}
	            case 6:
	                if(k==1) {
	                System.out.println("��������Ҫ���ĵ��鼮���ƣ�");
	                String s=a.next();
	                for(int i=0;i<name.length;i++){
	                    if(name[i]==null){
	                    	if(i==name.length-1) {
	                    		System.out.print("���޴���\n");
	                    	}
	                        
	                    }else if(name[i].equals(s)&&States[i]==0){
	                    		System.out.print("�������û�����");
	                    		uname1[i]=a.next();
	                    		
	                            System.out.print("������ͼ�����ʱ�䣺");
	                            dates[i]=a.nextInt();
	                            while(dates[i]<1||dates[i]>31){
	                                System.out.print("���벻��ȷ������������ʱ�䣺");
	                                dates[i]=a.nextInt();

	                        }
	                            System.out.print("����ɹ�\n");
	                            States[i]=1;
	                            Count[i]++;
	                            for(int j=0;j<uname.length;j++)
	                            {
	                            	if(uname[j]==uname1[i])
	                            	{
	                            		name1[j]=name[i];
	                            		break;
	                            	}	
	                            }
	                            
	                            break;
	                    } 
	                    
	                }
	                break;}
	            	else{
	            		System.out.print("���¼\n");
	            		break;
	            	}
	            case 7:
	                if(k==1) {
	                System.out.println("������黹ͼ�����ƣ�");
	                String guihuan=a.next();
	                for(int i=0;i<name.length;i++){
	                        if(name[i].equals(guihuan)&&States[i]==1){
	                        	for(int j=0;j<uname.length;j++)
	                            {
	                            	if(uname[j]==uname1[i])
	                            	{
	                            		name1[j]=null;
	                            		break;
	                            	}	
	                            }
	                        	States[i]=0;
	                            uname1[i]=null;
	                            dates[i]=0;
	                            System.out.print("����ɹ�\n");
	                            
	                            break;  
	                        }else {
	                            System.out.print("�ǹݲ��鼮\n");
	                            break;
	                        }

	                }
	                break;}
	            	else{
	            		System.out.print("���¼\n");
	            		break;
	            	}
	            case 8:
	                if(k==1) {
	                int index=-1;
	                System.out.print("������Ҫɾ����ͼ�����ƣ�");
	                String delete=a.next();
	                for(int i=0;i<name.length-1;i++){
	                    if(name[i].equals(delete)){
	                        index=i;
	                        break;
	                    }
	                }
	                if(index!=-1){
	                    for(int i=index;i<name.length;i++){
	                    if(i!=name.length-1){
	                    name[i]=name[i+1];
	                    States[i]=States[i+1];
	                    uname1[i]=uname1[i+1];
	                    dates[i]=dates[i+1];
	                    Count[i]=Count[i+1];}
	                }
	                System.out.print("ɾ���ɹ�\n");
	                }
	                 break;}
	            	else{
	            		System.out.print("���¼\n");
	            		break;
	            	}
	            case 9:
	                flag=false;
	                break;
	            default:
	                flag=false;
	                
	                break;
	            }
	            if(!flag){
	                
	                break;
	            }else{
	                System.out.print("����0�������˵�");
	                num=a.nextInt();
	            }
	        }while(num==0);
	        System.out.println("��лʹ��");
	    }
	}
	

