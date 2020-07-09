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
 * Bank��
 */
public class Bank {
	private List accountsList;
	private int number;//�˻���Ŀ
	private int id = 1001;//ȷ�������˺Ŵ�1001��ʼ���ɣ�����һ���˻����˺���1001

	//���캯��
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
	 * ����
	 */
	public Account openAccount(String passwd1, String passwd2, String name, 
			String personId, String type){
		//����һ�����˻�
		Account account = null;
		//�ж����������Ƿ�һ��
		if(passwd1.equals(passwd2)){
			//��һ�£����ж��˻����ͣ�����type��ֵ��
			if(type.equals("1")){
				//���ʼ���Ϊ10,���ö��Ϊ5000
				account = new CreditAccount(id, passwd1, name, personId, type, 10, 5000);
			}
			else
			{
				account = new SavingAccount(id, passwd1, name, personId, type, 10);
			}
			accountsList.add(account);
			JOptionPane.showMessageDialog(null, "�����ɹ�������","��Ϣ��ʾ",
		              JOptionPane.INFORMATION_MESSAGE);
			JOptionPane.showMessageDialog(null, "���Ŀ���Ϊ��"+id+"\n"+
		              "��������Ϊ��"+passwd1+"\n"+"���Ļ���Ϊ��"+name+"\n"+
		              "�������֤��Ϊ��"+personId+"\n"+"�����˻�����Ϊ��"+type+"\n","��Ϣ��ʾ",
		              JOptionPane.INFORMATION_MESSAGE);	
			account.accountType = type;
			number++;
			id++;
			return account;//��ʱ�����ɹ�
		}
		else
		{
			JOptionPane.showMessageDialog(null, "�Բ����������������벻ƥ�䣬����ʧ�ܣ�����",
					"��Ϣ��ʾ",JOptionPane.ERROR_MESSAGE);
			return null;//��ʱ����ʧ��
		}
	}
	/**
	 * ��������
	 */
	public void saveAccountDate(){
		BufferedWriter bufWriter=null;
		try {
			Properties props=System.getProperties();
			String path=props.getProperty("user.dir");
			String s = null;
			bufWriter=new BufferedWriter(new FileWriter(new File(path,"account.txt")));
			for(Iterator iterator = accountsList.iterator();iterator.hasNext();)
			{	//�������˻�
				Account acc = (Account) iterator.next();
				//д���˻���Ϣ��account.txt
				bufWriter.write(acc.id+",");
				bufWriter.write(acc.getPassword()+",");
				bufWriter.write(acc.getName()+",");
				bufWriter.write(acc.getPersonId()+",");
				bufWriter.write(acc.getAccountType()+",");
				bufWriter.write(Double.toString(acc.getBalance()));
				bufWriter.newLine();
			}					
			bufWriter.flush();//��ջ����е�����
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
	 * ��¼��֤
	 */
	public Account verifyAccount(long id, String password){
		Account account = null;	
		Account acc = null;	
		for(Iterator iterator = accountsList.iterator(); iterator.hasNext();)
		{	//�������˻�
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
	 * ת����֤�����������أ�
	 */
	public Account verifyAccount(long id){
		Account account = null;	
		Account acc = null;	
		for(Iterator iterator = accountsList.iterator(); iterator.hasNext();)
		{	//�������˻�
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
	 * ת��
	 */
	public void transferAccount(Account account1, Account account2, double money){
		account1.withdraw(money);
		account2.deposit(money);	
	}
	/**
	 * ���
	 */
	public void deposit(Account account, double money){
		account.deposit(money);
	}
	/**
	 * ȡ��
	 */
	public void withdraw(Account account, double money){
		account.withdraw(money);
	}
	

}

