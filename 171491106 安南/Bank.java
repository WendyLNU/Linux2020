package atm;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import java.util.Properties;

import javax.swing.JOptionPane;


/**
 * Bank类
 */
public class Bank {
	private List accountsList;
	private int number;//账户数目
	private int id = 1001;//确定银行账号从1001开始生成，即第一个账户的账号是1001

	//构造函数
	public Bank(){ 
		accountsList=new ArrayList<Account>();
		number = 0;
		BufferedReader bufReader = null;
		Properties props=System.getProperties();
		String path=props.getProperty("user.dir");
		try {
			bufReader=new BufferedReader(new FileReader(new File(path,"account.txt")));
			String s = bufReader.readLine();
			while(s != null){
				String[] str = s.split(",");
				if(str[4].equals("0"))
				{
					Account savingAcc = new SavingAccount(Long.parseLong(str[0]),
							str[1].toString(), str[2].toString(),
							str[3].toString(),str[4].toString(),
							Double.parseDouble(str[5]));
					accountsList.add(savingAcc);
				}
				else
				{
					Account creditAcc = new CreditAccount(Long.parseLong(str[0]),
							str[1].toString(), str[2].toString(),
							str[3].toString(),str[4].toString(),
							Double.parseDouble(str[5]),5000);
					accountsList.add(creditAcc);					
				}
				number ++;
				id++;
				s = bufReader.readLine();
			}
		} catch (NumberFormatException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally{
			try {
				if(bufReader != null)
				{
					bufReader.close();
				}
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
	//getXxx,setXxx
	public List getAccounts() {
		return accountsList;
	}
	public void setAccounts(List accounts) {
		this.accountsList = accounts;
	}
	public int getNumber() {
		return number;
	}
	public void setNumber(int number) {
		this.number = number;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}

	/**
	 * 开户
	 */
	public Account openAccount(String passwd1, String passwd2, String name, 
			String personId, String type){
		//创建一个新账户
		Account account = null;
		//判断两次密码是否一致
		if(passwd1.equals(passwd2)){
			//若一致，再判断账户类型（根据type的值）
			if(type.equals("1")){
				//可令开始余额为10,信用额度为5000
				account = new CreditAccount(id, passwd1, name, personId, type, 10, 5000);
			}
			else
			{
				account = new SavingAccount(id, passwd1, name, personId, type, 10);
			}
			accountsList.add(account);
			JOptionPane.showMessageDialog(null, "开户成功！！！","信息提示",
		              JOptionPane.INFORMATION_MESSAGE);
			JOptionPane.showMessageDialog(null, "您的卡号为："+id+"\n"+
		              "您的密码为："+passwd1+"\n"+"您的户名为："+name+"\n"+
		              "您的身份证号为："+personId+"\n"+"您的账户类型为："+type+"\n","信息提示",
		              JOptionPane.INFORMATION_MESSAGE);	
			account.accountType = type;
			number++;
			id++;
			return account;//此时开户成功
		}
		else
		{
			JOptionPane.showMessageDialog(null, "对不起！您两次密码输入不匹配，开户失败！！！",
					"信息提示",JOptionPane.ERROR_MESSAGE);
			return null;//此时开户失败
		}
	}
	/**
	 * 保存数据
	 */
	public void saveAccountDate(){
		BufferedWriter bufWriter=null;
		try {
			Properties props=System.getProperties();
			String path=props.getProperty("user.dir");
			String s = null;
			bufWriter=new BufferedWriter(new FileWriter(new File(path,"account.txt")));
			for(Iterator iterator = accountsList.iterator();iterator.hasNext();)
			{	//若存在账户
				Account acc = (Account) iterator.next();
				//写入账户信息到account.txt
				bufWriter.write(acc.id+",");
				bufWriter.write(acc.getPassword()+",");
				bufWriter.write(acc.getName()+",");
				bufWriter.write(acc.getPersonId()+",");
				bufWriter.write(acc.getAccountType()+",");
				bufWriter.write(Double.toString(acc.getBalance()));
				bufWriter.newLine();
			}					
			bufWriter.flush();//清空缓存中的内容
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally{
			try {
				if(bufWriter!=null){
					bufWriter.close();
				}
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
	}
	/**
	 * 登录验证
	 */
	public Account verifyAccount(long id, String password){
		Account account = null;	
		Account acc = null;	
		for(Iterator iterator = accountsList.iterator(); iterator.hasNext();)
		{	//若存在账户
			acc = (Account) iterator.next();
			if (acc != null) {
				if (id == acc.getId() && password.equals(acc.getPassword())) {
					account = acc;
					break;
				}
			}
			else
			{
				break;
			}
		}
		return account;
	}
	/**
	 * 转账验证（方法的重载）
	 */
	public Account verifyAccount(long id){
		Account account = null;	
		Account acc = null;	
		for(Iterator iterator = accountsList.iterator(); iterator.hasNext();)
		{	//若存在账户
			acc = (Account) iterator.next();
			if (acc != null) {
				if (id == acc.getId()) {
					account = acc;
					break;
				}
			}
			else
			{
				break;
			}
		}
		return account;
	}
	/**
	 * 转账
	 */
	public void transferAccount(Account account1, Account account2, double money){
		account1.withdraw(money);
		account2.deposit(money);	
	}
	/**
	 * 存款
	 */
	public void deposit(Account account, double money){
		account.deposit(money);
	}
	/**
	 * 取款
	 */
	public void withdraw(Account account, double money){
		account.withdraw(money);
	}
	

}

