package atm;
import javax.swing.JOptionPane;

/**
 * �˻���:���������˻�����1.�����˻� 2.�����˻�
 */
public abstract class Account {
	//����
	protected long id;
	protected String password;
	protected String name;
	protected String personId;
	protected String accountType;
	
	protected double balance;
	//���췽��
	public Account(){
		super();
	}
	public Account(long id, String password, String name, String personId,
			String type,double balance) {
		super();
		this.id = id;
		this.password = password;
		this.name = name;
		this.personId = personId;
		this.accountType = type;
		this.balance = balance;
	}
	//getXxx,setXxx����
	public long getId() {
		return id;
	}
	public void setId(long id) {
		this.id = id;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getPersonId() {
		return personId;
	}
	public void setPersonId(String personId) {
		this.personId = personId;
	}
	public String getAccountType() {
		return accountType;
	}
	public void setAccountType(String accountType) {
		this.accountType = accountType;
	}
	public double getBalance() {
		return balance;
	}
	public void setBalance(double balance) {
		this.balance = balance;
	}
	/**
	 * ���
	 */
	public void deposit(double money){
		balance += money;		
	}
	/**
	 * ȡ��
	 */
	public abstract void withdraw(double money);
	
}

