package bookSys;
import java.util.Scanner;
/*
 *      171491304
 *             王明阳
 *             图书管理系统
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
	                
	                name[0]="黑枪";
	                States[0]=1;
	                uname1[0]="alice";
	                dates[0]=15;
	                Count[0]=13;

	                name[1]="西行记";
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
	                name1[0]="黑枪";
	             
	                uname[1]="方三";
	                code[1]=456789;
	                name1[1]=null;
	                
	                boolean flag=true;
	                
	                int num,k=0;

	        do{
	            System.out.println(" 欢迎使用本图书管理系统");
	            System.out.println("******0.用户登录*****");
	            System.out.println("******1.用户注册*****");
	            System.out.println("******2.查看用户*****");
	            System.out.println("******3.删除用户*****");
	            System.out.println("******4.查看图书*****");        
	            System.out.println("******5.新增图书*****");    
	            System.out.println("******6.借阅图书*****");    
	            System.out.println("******7.归还图书*****");
	            System.out.println("******8.删除图书*****");
	            System.out.println("******9.退出系统*****");
	            System.out.println("请进行操作");
	            int input=a.nextInt();
	            switch(input){
	            case 0:
	            	System.out.println("用户登录");
	                System.out.println("用户名：");
	                String mz=a.next();
	                for(int i=0;i<uname.length;i++){
	                    if(uname[i].equals(mz)){
	                    	System.out.println("密码：");
	                    	if(code[i]==a.nextInt()) {
	                    		System.out.println("登录成功");
	                    		k=1;
	                    		break;
	                    	}else {
	                    		System.out.println("密码错误");
	                    		break;
	                    	}
	                    }
	                }
	                break;
	            case 1:
	            	System.out.println("新用户请注册");
                    	for(int j=0;j<uname.length;j++){
    	                    if(uname[j]!=null){  
    	                    }else{
    	                    	System.out.println("请输入用户名：");
    	                        uname[j]=a.next();
    	                        System.out.println("请输入密码：");
    	                        code[j]=a.nextInt();
    	                        System.out.println("注册成功");
    	                        
    	                        break;
    	                    }
    	                }
    	               
                    break;
                case 2:
	            	if(k==1) {
	            	System.out.println("\t\t\t用户信息");
	                System.out.println("用户序号\t\t用户名\t\t密码\t\t借阅书籍");
	                
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
	            		System.out.print("请登录\n");
	            		break;
	            	}
	            case 3:
	            	if(k==1) {
	            	int ind=-1;
	                System.out.print("请输入要删除的用户名：");
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
	                    System.out.print("删除成功\n");
	                }
	                 break;}
	            	else{
	            		System.out.print("请登录\n");
	            		break;
	            	}
	            case 4:
	            	if(k==1) {
	                System.out.println("\t\t\t\t\t图书列表");
	                System.out.println("图书序号\t\t图书名称\t\t图书状态\t\t用户\t\t借阅时间\t\t借阅次数");
	                
	                for(int i=0;i<name.length;i++){
	                    if(name[i]!=null){
	                        String state=(States[i]==0?"可借阅":"已借出");
	                        String uname12=(uname1[i]==null?" ":uname1[i]);
	                        String date=(dates[i]==0?" ":dates[i]+"日");
	                        String Count1=Count[i]+"次";
	                        System.out.println((i+1)+"\t\t"+name[i]+"\t\t"+state+"\t\t"+uname12+"\t\t"+date+"\t\t"+Count1);
	                    }else{
	                        
	                        break;
	                    }
	                }
	                break;}
	            	else{
	            		System.out.print("请登录\n");
	            		break;
	            	}
	            case 5:
	                if(k==1) {
	            	System.out.print("新增图书名称:");
	                for(int i=0;i<name.length;i++){
	                    if(name[i]!=null){  
	                    }else{
	                        name[i]=a.next();
	                        System.out.print(name[i]+"图书已入馆\n");
	                        break;
	                    }
	                }
	                break;}
	            	else{
	            		System.out.print("请登录\n");
	            		break;
	            	}
	            case 6:
	                if(k==1) {
	                System.out.println("请输入你要借阅的书籍名称：");
	                String s=a.next();
	                for(int i=0;i<name.length;i++){
	                    if(name[i]==null){
	                    	if(i==name.length-1) {
	                    		System.out.print("查无此书\n");
	                    	}
	                        
	                    }else if(name[i].equals(s)&&States[i]==0){
	                    		System.out.print("请输入用户名：");
	                    		uname1[i]=a.next();
	                    		
	                            System.out.print("请输入图书借阅时间：");
	                            dates[i]=a.nextInt();
	                            while(dates[i]<1||dates[i]>31){
	                                System.out.print("输入不正确，请重新输入时间：");
	                                dates[i]=a.nextInt();

	                        }
	                            System.out.print("借书成功\n");
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
	            		System.out.print("请登录\n");
	            		break;
	            	}
	            case 7:
	                if(k==1) {
	                System.out.println("请输入归还图书名称：");
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
	                            System.out.print("还书成功\n");
	                            
	                            break;  
	                        }else {
	                            System.out.print("非馆藏书籍\n");
	                            break;
	                        }

	                }
	                break;}
	            	else{
	            		System.out.print("请登录\n");
	            		break;
	            	}
	            case 8:
	                if(k==1) {
	                int index=-1;
	                System.out.print("请输入要删除的图书名称：");
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
	                System.out.print("删除成功\n");
	                }
	                 break;}
	            	else{
	            		System.out.print("请登录\n");
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
	                System.out.print("输入0返回主菜单");
	                num=a.nextInt();
	            }
	        }while(num==0);
	        System.out.println("感谢使用");
	    }
	}
	

